<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/show.css') }}" >
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
            <div id="summary">
                <p><a class="title" href="{{ URL::route('show', ['id'=>Crypt::encrypt($torrent['id'])]) }}">
                    {{ $torrent['name'] }}</a>
                </p>        
                
                <p><a class="magnet" href="magnet:?xt=urn:btih:905E0CD376E8DE2AB6E757F17F68F27EC3DAC45C">
                    magnet:?xt=urn:btih:905E0CD376E8DE2AB6E757F17F68F27EC3DAC45C</a>
                </p>
                
                <ul>
                    <li class="copy"><a href='#'>复制链接</a></li>
                    <li class='download'><a href='#'>磁力下载</a></li>
                    <li class='play'><a href='#'>网盘播放</a></li>
                    <li class='share'><a href='#'>分享给好友</a></li>
                </ul>
            </div>
            
            <div id="detail">
                
            </div>
            
            <div id="files">
                
            </div>
        </div>
        
        <div id="footer">
            <div id="footer-sub">
                <span id="copyright">
                    本站仅供测试和学习交流, 内容均收集于互联网，如果有侵权内容、不妥之处，请联系我们删除。敬请谅解！
                </span> 

                <select id="language">
                    <option>简体中文</option>
                    <option>繁体中文</option>
                    <option>English</option>
                </select>
            </div>
        </div>
    </body>
</html>
        