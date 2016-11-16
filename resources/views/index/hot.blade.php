<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/search.css') }}" >     
    </head>
    <body>
        @include('header')
        
        <div id="container">
            <div id="result_stats">
                找到约 {{ number_format($total) }} 条结果 （用时 {{ number_format($running_time, 2) }} 秒）
            </div>
            
            <div id="result">
                <ul>
                    @foreach($torrents as $torrent)
                    <li>
                        <p>
                            <span class="glyphicon glyphicon-fire" style="color: #FF0309; margin-right: 10px;"></span>
                            <a class="title" target="_blank" href="{{ URL::route('show', ['id'=>base64_encode($torrent['id'])]) }}">
                                {{ $torrent['name'] }}
                            </a>
                        </p>
                        <span class='st'>
                            文件大小: <span class="label label-success" style="margin-right: 10px;">{{ $torrent['length'] }}</span>
                            创建时间: <span class="label label-primary" style="margin-right: 10px;">{{ $torrent['created_at'] }}</span>
                            更新时间: <span class="label label-warning" style="margin-right: 10px;">{{ $torrent['created_at'] }}</span>
                            资源热度: <span class="label label-danger" style="margin-right: 10px;">{{ $torrent['hits'] }}</span>                                
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>          
        </div>
        
        @include('footer')
        
        <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>      
        <script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?move=0&amp;btn=r1.gif" charset="utf-8"></script>        
    </body>
</html>