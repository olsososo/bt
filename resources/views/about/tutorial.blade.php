<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" target='_blank' href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" target='_blank' href="{{ URL::asset('css/global.css') }}" >        
        <link rel="stylesheet" target='_blank' href="{{ URL::asset('css/statement.css') }}" >  
        <style>
            #footer {
                position: fixed;
                bottom: 0;
            }
        </style>
    </head>
    <body>
        @include('header')
        
        <div class="container bs-docs-container">
            <div class="row">
                <div class="col-md-9" role='main'>
                    <div class="bs-docs-section">
                        <h1 id="dropdowns" class="page-header">使用教程</h1>
                        <p>{{ $site_name }}返回的结果是磁力链接，这并不意味着您能通过{{ $site_name }}直接下载资源，您需要通过下载工具才能实现下载</p>
                        <p>目前主流的下载工具有：<a target='_blank' href="http://xunlei.com/">迅雷</a>、<a target='_blank' href="http://xf.qq.com/">QQ旋风</a>、<a target='_blank' href='http://www.utorrent.com/'>μTorrent</a>、<a target='_blank' href="http://www.bitcomet.com/">BitComet</a>等</p>
                        <p>在线看电影请复制磁力链接，使用<a target='_blank' href='http://115.com/'>115离线下载</a>，<a target='_blank' href='http://pan.baidu.com/'>百度网盘离线下载</a>或<a target='_blank' href="http://xunlei.com/">迅雷边下边看</a>。</p>
                    </div>
                </div>
            </div>
        </div>
        
        @include('footer')
        <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>   
        <script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?move=0&amp;btn=r1.gif" charset="utf-8"></script>
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script> 
    </body>
</html>