<?php

namespace App\Http\Controllers;

use Crypt;

use App\Http\Models\Torrent;
use App\Http\Models\File;
use App\Http\Models\Tag;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    /**
     * 首页
     */
    public function index()
    {
        return view('index.index');
    }
    
    /**
     * 搜索
     */
    public function search($keyword)
    {   
        $time_start = microtime_float();
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page <= 0) $page = 1;
        $pagesize = 20;
        
        $cl = new \SphinxClient ();
        $cl->SetServer ( '45.63.48.211', 9312);
        $cl->SetLimits(($page - 1) * $pagesize, $pagesize);
        $cl->SetMatchMode(SPH_MATCH_ANY);
        $result = $cl->Query($keyword, '*');
        
        if(empty($result) || $result['total_found'] == 0) {
            $total = 0;
            $ids = array();
        } else {
            $total = $result['total_found'];
            foreach ($result['matches'] as $key => $value)
            {
                $ids[] = $key;
                $files[$key] = $value['attrs']['files'];
                $tags[$key] = $value['attrs']['tags'];
            }
        }
        
        $torrents = Torrent::whereIn('id', array_values($ids))->get();
        $torrents = new LengthAwarePaginator($torrents, $total, 20);
        $torrents->setPath(route('search', ['keyword'=>$keyword]));
        
        foreach($torrents as $torrent) {
            Redis::pipeline(function($pipe) use ($torrent, $files, $tags) {
                $pipe->hset('torrents', $torrent->id, json_encode($torrent->toArray()));
                $pipe->hset('files', $torrent->id, json_encode($files[$torrent->id]));
                $pipe->hset('tags', $torrent->id, json_encode($tags[$torrent->id]));
            });
        }
        
        $time_end = microtime_float();
        $running_time = $time_end - $time_start;
        
        return view('index.search', ['keyword'=>$keyword, 'total'=>$total, 'running_time'=>$running_time,
            'torrents'=>$torrents]);
    }
    
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $torrent = Redis::hget('torrents', $id);
        $file_ids = json_decode(Redis::hget('files', $id));
        $tag_ids = json_decode(Redis::hget('tags', $id));
        
        $files = File::whereIn('id', $file_ids)->get();
        $tags = Tag::whereIn('id', $tag_ids)->get();
        
        return view('index.show', ['torrent'=>$torrent, 'tags'=>$tags, 'files'=>$files]);
    }
}
