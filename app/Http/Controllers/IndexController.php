<?php

namespace App\Http\Controllers;

use App;
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
    public function index(Request $request)
    {
        echo '<pre>';
        $locale = $request->session()->get('locale');
        var_dump($locale);
        return;
        
        $total = Redis::scard('cdt');
        return view('index.index', ['total'=>$total]);
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
        $cl->SetSortMode ( SPH_SORT_ATTR_DESC, "hits" );
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
        
        $tags = json_decode($torrent['tags']);
        
        $host = Config::get('database.torrent_files.host');
        $port = Config::get('database.torrent_files.port');        
        $content = trim(file_get_contents("http://$host:$port".get_files_path($torrent['infohash'])));
        foreach(explode("\n", $content) as $key => $value) {
            list($file, $lenth) = explode("###", $value);
            $files[] = ['file'=>$file, 'length'=>$lenth];
        }
        
        return view('index.show', ['torrent'=>$torrent, 'tags'=>$tags, 'files'=>$files]);
    }
    
    /**
     * 语言环境设置
     * @param type $locale
     * @return type
     */
    public function locale($locale)
    {
        App::setLocale($locale);
        return redirect()->back();
    }
    
    /**
     * 热门资源
     * @return type
     */
    public function hot()
    {   
        $total = 50;
        $time_start = microtime_float();
        
        $cl = new \SphinxClient ();
        $cl->SetServer ( Config::get('database.sphinx.host'), intval(Config::get('database.sphinx.port')));
        $cl->SetSortMode(SPH_SORT_ATTR_DESC,'hits');
        $cl->SetLimits(0, $total);
        $result = $cl->Query('');
 
        foreach ($result['matches'] as $key => $value)
        {
            $value['attrs']['id'] = $key;
            $torrents[] = $value['attrs'];
        }
            
        foreach($torrents as $torrent) {
            Redis::pipeline(function($pipe) use ($torrent) {
                $pipe->hset('torrents', $torrent['id'], json_encode($torrent));
            });
        }
        
        $time_end = microtime_float();
        $running_time = $time_end - $time_start;       
        return view('index.hot', ['torrents'=>$torrents, 'total'=>$total, 'running_time'=>$running_time]);
    }
}
