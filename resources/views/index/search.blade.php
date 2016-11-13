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
                找到约 272,000,000 条结果 （用时 0.43 秒）
            </div>
            
{{ $total }}
            
            <div id="page">
                1 2 3 4 5
            </div>            
        </div>
        
        @include('footer')
    </body>
</html>
