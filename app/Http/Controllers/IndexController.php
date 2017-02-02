<?php

namespace App\Http\Controllers;

use App;
use Config;
use Session;
use Aws\S3\S3Client;
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
        return view('index.index');
    }
    
    public function test(Request $request)
    {
        return view('index.test');
    }
    
    /**
     * 搜索
     */
    public function search()
    {   
        if (empty($_GET['q'])) return redirect()->route('index');
        
        $keyword = $_GET['q'];
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
        $debug = isset($_GET['debug']) ? $_GET['debug'] : false;
        return view('index.search', ['keyword'=>$keyword, 'total'=>$total, 'running_time'=>$running_time,
            'torrents'=>$torrents, 'pagintor'=>$pagintor, 'debug'=>$debug]);
    }
    
    /**
     * 显示页面
     * @param type $id
     * @return type
     */
    public function show($id)
    {
        if ($id == 'ODkzOTg=') return;
        $id = base64_decode($id);
        if (Redis::hexists('torrents', $id)) {
            $torrent = json_decode(Redis::hget('torrents', $id), true);
        } else {
            $torrent = Torrent::where('id', $id)->first()->toArray();
            Redis::hset('torrents', $torrent['id'], json_encode($torrent));
        }
        
        $tags = json_decode($torrent['tags']);
        
        // Use the us-west-2 region and latest version of each client.
        $client = new S3Client([
            'version'     => 'latest',
            'region'      => 'us-west-1',
        ]);
        
        $result = $client->getObject([
            'Bucket' => 'ibittorrent',
            'Key'    => get_files_path($torrent['infohash'])
        ])->toArray();
        
        $host = Config::get('database.storage.host');
        $port = Config::get('database.storage.port');        
        $content = trim((string)$result['Body']);
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
        Session::set('locale', $locale);
        return redirect()->back();
    }
    
    /**
     * 热门资源
     * @return type
     */
    public function hot()
    {
        $total = 256;
        $torrents = [];
        $date = strtotime(date('Y-m-d'));
        $time_start = microtime_float();
        
        if (Redis::hexists('hot', $date)) {
            $data = Redis::hget('hot', $date);
            $torrents = json_decode($data, true);
        } else {
            $cl = new \SphinxClient ();
            $cl->SetServer ( Config::get('database.sphinx.host'), intval(Config::get('database.sphinx.port')));
            $cl->SetSortMode(SPH_SORT_ATTR_DESC,'hits');
            $cl->SetFilterRange('updated_at', $date-86400, $date+86400);
            $cl->SetLimits(0, $total);
            $result = $cl->Query('');

            if (isset($result['matches'])) {
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
                
                Redis::hset('hot', $date, json_encode ($torrents));
            } 
        }
        
        $time_end = microtime_float();
        $running_time = $time_end - $time_start;       
        return view('index.hot', ['torrents'=>$torrents, 'total'=>count($torrents), 'running_time'=>$running_time]);
    }
    
    public function torrents()
    {
        $total = Redis::Connection('storage')->scard('cdt');
        return response()->json(['total' => number_format($total, 0)]);
    }
}
