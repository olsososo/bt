<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ trans('support.title', ['site_name'=>$site_name]) }}</title>
        <meta name="description" content=""/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" > 
    </head>
    <body>
        <div id="header">
            <div id="menu">
                <ul>
                    <li><a href="{{ URL::route('disclaimer') }}">{{ trans('support.disclaimer') }}</a></li>
                    <li><a href="{{ URL::route('tutorial') }}">{{ trans('support.tutorial') }}</a></li>
                    <li><a href="{{ URL::route('hot', ['date'=>strtotime(date('Y-m-d'))]) }}">{{ trans('support.hot') }}</a></li>
                </ul>             
            </div>
        </div>
        
        <div id="logo">
            <div id="logo-sub">
                <img src="{{ URL::asset('images/logo.png') }}" >
            </div>
        </div>
        
        <div id="form">
<script type="text/javascript">
  ( function() {
    if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
    var unit = {"calltype":"async[2]","publisher":"442091317","width":728,"height":90,"sid":"Chitika Default"};
    var placement_id = window.CHITIKA.units.length;
    window.CHITIKA.units.push(unit);
    document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
}());
</script>
<script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>            
            <input type="hidden" id="action" value="{{ url('/search')}}" />
            <table style="height: 36px; margin: auto;" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td><input type="text" id="keyword" placeholder="{{ trans('support.search_hint') }}" /></td>
                    <td><input id="search" type="button" value="{{ trans('support.search') }}" /></td>
                </tr>
            </table>
            <p style="margin-top: 10px; opacity: 0.75;">{!! trans('support.total_torrents', ['total'=>'']) !!}</p>
        </div>
        
        @include('footer', ['nav' => 'navbar-fixed-bottom'])
        
        <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>  
        <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>  
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>       
    </body>
</html>