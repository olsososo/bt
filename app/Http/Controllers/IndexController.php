<?php

namespace App\Http\Controllers;

use App\Http\Models\Torrent;
use Illuminate\Http\Request;

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
        $page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
        if ($page <= 0) $page = 1;
        $pagesize = 20;
        
        $cl = new \SphinxClient ();
        $cl->SetServer ( '45.63.48.211', 9312);
        $cl->SetLimits(($pagesize - 1) * $pagesize, $pagesize);
        $cl->SetMatchMode(SPH_MATCH_ANY);
        $result = $cl->Query($keyword, '*');
        
        if(empty($result) || $result['total_found'] == 0) {
            $total = 0;
            $ids = array();
        } else {
            $total = $result['total_found'];
            $ids = array_keys($result['matches']);
        }
        
        //Torrent::whereIn('id', [83392, 83788])->getQuery()->toSql();
        $torrents = Torrent::whereIn('id', array_values($ids))->get();
        
        var_dump($torrents->values());
        var_dump($torrents->toArray());
//        foreach ($torrents as $torrent) {
//            var_dump($torrent->name);
//        }
//        var_dump($torrents);
//        var_dump($ids);
        //return view('index.search', ['total'=>$total]);
    }
}
