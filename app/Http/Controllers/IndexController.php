<?php

namespace App\Http\Controllers;

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
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        
        $cl = new \SphinxClient ();
        $cl->SetServer ( '45.63.48.211', 9312);
        $cl->SetArrayResult ( true );
        $cl->SetLimits(0,20);
        $cl->SetMatchMode(SPH_MATCH_ANY);
        $res = $cl->Query($keyword, '*');
        var_dump($res);
    }
}
