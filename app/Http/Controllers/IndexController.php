<?php

namespace App\Http\Controllers;

use Config;
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
        $cl->SetServer ( Config::get('database.sphinx.host'), intval(Config::get('database.sphinx.port')));
        $cl->SetLimits(($page - 1) * $pagesize, $pagesize);
        $cl->SetMatchMode(SPH_MATCH_ANY);
        $result = $cl->Query($keyword, '*');
        
        if(empty($result) || $result['total_found'] == 0) {
            $total = 0;
            $torrents = array();
        } else {
            $total = $result['total_found'];
            foreach ($result['matches'] as $key => $value)
            {
                $value['attrs']['id'] = $key;
                $torrents[] = $value['attrs'];
            }
        }
        
        $pagintor = new LengthAwarePaginator($torrents, $total, 20);
        $pagintor->setPath(route('search', ['keyword'=>$keyword]));
        
        foreach($torrents as $torrent) {
            Redis::pipeline(function($pipe) use ($torrent) {
                $pipe->hset('torrents', $torrent['id'], json_encode($torrent));
            });
        }
        
        $time_end = microtime_float();
        $running_time = $time_end - $time_start;        
        return view('index.search', ['keyword'=>$keyword, 'total'=>$total, 'running_time'=>$running_time,
            'torrents'=>$torrents, 'pagintor'=>$pagintor]);
    }
    
    /**
     * 显示页面
     * @param type $id
     * @return type
     */
    public function show($id)
    {
        $id = base64_decode($id);
        $torrent = json_decode(Redis::hget('torrents', $id), true);
        
        $torrent['infohash'] = '8d0ed8a1a9ae5ede4c6dc31f462cba886d44dc73';
        $host = Config::get('database.torrent_files.host');
        $port = Config::get('database.torrent_files.port');
        $files = file_get_contents("http://$host:$port".get_files_path($torrent['infohash']));
        
        var_dump($files);
        var_dump(explode("\n", $files));
        return;
        return view('index.show', ['torrent'=>$torrent, 'files'=>$files]);
    }
    
    /**
     * 语言环境设置
     * @param type $locale
     * @return type
     */
    public function locale($locale)
    {
        app()->setLocale($locale);
        return redirect()->back();
    }
    
    /**
     * 热门资源
     * @return type
     */
    public function hot()
    {   
        $time_start = microtime_float();
        
        $total = 50;
        $torrents = Redis::get('hots');
        if (!empty($hots)) {
            $torrents = json_decode($torrents, true);
        } else {
            $torrents = Torrent::orderBy('hits', 'desc')->take($total)->get();            
            //Redis::set('hots', json_encode($torrents->toArray()), 'EX', 3600*24);
            
            $ids = [];
            foreach ($torrents as $torrent) {
                $ids[] = $torrent->id;
            }
            
            $files = [];
            $result = File::whereIn('torrent_id', array_values($ids))->get();
            foreach ($result as $key => $value) {
                $files[$value['torrent_id']][] = $value['id'];
            }
 
            $tags = [];
            $result = Tag::whereIn('torrent_id', array_values($ids))->get();
            foreach ($result as $key => $value) {
                $tags[$value['torrent_id']][] = $value['id'];
            }
            
            foreach($torrents as $torrent) {
                Redis::pipeline(function($pipe) use ($torrent, $files, $tags) {
                    $pipe->hset('torrents', $torrent->id, json_encode($torrent->toArray()));
                    $pipe->hset('files', $torrent->id, json_encode(isset($files[$torrent->id]) ? $files[$torrent->id] : []));
                    $pipe->hset('tags', $torrent->id, json_encode(isset($tags[$torrent->id]) ? $tags[$torrent->id] : []));
                });
            }            
        }
        
        $time_end = microtime_float();
        $running_time = $time_end - $time_start;       
        return view('index.hot', ['torrents'=>$torrents, 'total'=>$total, 'running_time'=>$running_time]);
    }
}
