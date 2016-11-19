<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" > 
    </head>
    <body>
        <div id="header">
            <div id="menu">
                <ul>
                    <li><a href="{{ URL::route('statement') }}" target="_blank">{{ trans('support.disclaimer') }}</a></li>
                    <li><a href="{{ URL::route('tutorial') }}" target="_blank">{{ trans('support.tutorial') }}</a></li>
                    <li><a href="{{ URL::route('hot') }}" target="_blank">{{ trans('support.hot') }}</a></li>
                </ul>             
            </div>
        </div>
        
        <div id="logo">
            <div id="logo-sub">
                <img src="https://g.hancel.net/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png">              
            </div>
        </div>
        
        <div id="form">
            <input type="hidden" id="action" value="{{ url('/search')}}" />
            <table style="height: 36px; margin: auto;" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td><input type="text" id="keyword"/></td>
                    <td><input id="search" type="button" value="搜索" /></td>
                </tr>
            </table>
            <p style="margin-top: 10px;" class="muted">{!! trans('support.total_torrents', ['total'=>$total]) !!}</p>
        </div>
        
        @include('footer', ['nav' => 'navbar-fixed-bottom'])
        
        <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>     
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>          
    </body>
</html>