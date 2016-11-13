<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" >
    </head>
    <body>
        <div id="header">
            <div id="menu">
                <ul>
                    <li><a href="#">工具</a></li>
                    <li><a href="#">教程</a></li>
                    <li><a href="#">加入收藏</a></li>
                </ul>             
            </div>
        </div>
        
        <div id="logo">
            <div id="logo-sub">
                <img src="https://g.hancel.net/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png">
                <div id="logo-title">简体中文</div>                
            </div>
        </div>
        
        <div id="form">
            <form action="/search" id="f" method="get">
                <input type="text" name="q" id="keyword"/><br/>
                <input type="submit" value="Google 搜索" id="search"/>
            </form>
        </div>
        
        <div id="footer">
            <div id="footer-sub">
                <span id="copyright">
                    本站仅供测试和学习交流, 内容均收集于互联网，如果有侵权内容、不妥之处，请联系我们删除。敬请谅解！
                </span> 

                <select id="language">
                    <option>English</option>
                    <option>简体中文</option>
                    <option>繁体中文</option>
                </select>
            </div>
        </div>
    </body>
</html>