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
                    <li><a href="#">Hawen</a></li>
                    <li><a href="#">Gmail</a></li>
                    <li><a href="#">图片</a></li>
                </ul>             
            </div>
        </div>
        
        <div id="logo">
            <img src="https://g.hancel.net/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png">
            <div id="logo-sub">简体中文</div>
        </div>
        
        <div id="fkbx">
            <form action="#" id="f" method="get">
                <input type="text" name="q" id="kw"/><br/>
                <input type="submit" value="搜索" id="jsb"/>
            </form>
        </div>
        
        <div id="footer">
            我是底部
        </div>
    </body>
</html>