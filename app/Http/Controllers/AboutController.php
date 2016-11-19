<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * 免责声明
     */
    public function disclaimer()
    {
        return view('about.disclaimer');
    }
    
    /**
     * 使用教程
     */
    public function tutorial()
    {
        return view('about.tutorial');
    }
}
