<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" >
        <script type="text/javascript" src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>     
    </head>
    <body>
        <div id="header">
            <div id="menu">
                <ul>
                    <li><a href="{{ URL::route('statement') }}" target="_blank">免责声明</a></li>
                    <li><a href="{{ URL::route('tutorial') }}" target="_blank">使用教程</a></li>
                    <li><a href="{{ URL::route('hot') }}" target="_blank">最热资源</a></li>
                </ul>             
            </div>
        </div>
        
        <div id="logo">
            <div id="logo-sub">
                <img src="https://g.hancel.net/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png">
                <div id="logo-title">{{ trans('messages.locale') }}</div>                
            </div>
        </div>
        
        <div id="form">
            <input type="hidden" id="action" value="{{ url('/search')}}" />
            <input type="text" id="keyword"/>
            
            <span id="search_spn">
                <input id="search" type="button" value="搜索" />
            </span>            
        </div>
        
        @include('footer')
    </body>
</html>