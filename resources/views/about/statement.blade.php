<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" >        
        <link rel="stylesheet" href="{{ URL::asset('css/statement.css') }}" >  
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
                        <h1 id="dropdowns" class="page-header">免责声明</h1>
                        <p>{{ $site_name }}是一个<a href='http://zh.wikipedia.org/zh/%E7%A3%81%E5%8A%9B%E9%93%BE%E6%8E%A5' target="_blank">磁力链接</a>搜索引擎，是学术研究的副产品，用于解决资源过度分散的问题</p>
                        <p>它通过<a href="http://zh.wikipedia.org/zh/BitTorrent_(%E5%8D%8F%E8%AE%AE)">BitTorrent协议</a>加入DHT网络，实时的自动采集数据，仅存储文件的标题、大小、文件列表、文件标识符（磁力链接）等基础信息</p>
                        <p>{{ $site_name }}不下载任何真实资源，无法判断资源的合法性及真实性，使用{{ $site_name }}服务的用户需自行鉴别内容的真伪</p>
                        <p>{{ $site_name }}不上传任何资源，不提供<a href="http://zh.wikipedia.org/zh/BitTorrent_tracker">Tracker服务</a>，不提供<a href="http://zh.wikipedia.org/wiki/%E7%A7%8D%E5%AD%90%E6%96%87%E4%BB%B6">种子文件</a>的下载，这意味着{{ $site_name }}是一个完全合法的系统</p>
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