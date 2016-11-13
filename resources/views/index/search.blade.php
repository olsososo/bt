<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/search.css') }}" >
    </head>
    <body>
        <div id="header">
           <div id="logo">
                <a href="#"><img src="http://7xtf51.com2.z0.glb.clouddn.com/engiy/logo.png" /></a>
                <input type="text" id="keyword"/>
            </div>
            
            <div id="menu">
                <ul>
                    <li><a href="#">工具</a></li>
                    <li><a href="#">教程</a></li>
                    <li><a href="#">加入收藏</a></li>
                </ul>             
            </div>
        </div>
        
        <div id="container">
            <div id="result_stats">
                找到约 {{ number_format($total) }} 条结果 （用时 {{ number_format($running_time, 2) }} 秒）
            </div>
            
            <div id="result">
                <ul>
                    @foreach($torrents as $torrent)
                    <li>
                        <p><a class="title" href="#">{{ $torrent->name }}</a></p>
                        <span class='st'>
                            文件大小: <span class="value">{{ $torrent->length }}</span>
                            创建时间: <span class="value">{{ $torrent->created_at }}</span>
                            热度: <span class="value">{{ $torrent->hits }}</span>                                
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            
            <div id="page">
                {!! $torrents->render() !!}
            </div>            
        </div>
        
        @include('footer')
    </body>
</html>
