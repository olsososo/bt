<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        @include('verification')
        <title>{{ trans('support.title', ['site_name'=>$site_name]) }}</title>
        <meta name="description" content=""/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/test.css') }}" > 
    </head>
    <body>
        <header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
          <div class="container-fluid">
            <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ URL::route('disclaimer') }}" onclick="_hmt.push(['_trackEvent', 'docv3-navbar', 'click', 'doc-home-navbar-job'])" target="_blank">{{ trans('support.disclaimer') }}</a></li>
                <li><a href="{{ URL::route('tutorial') }}" onclick="_hmt.push(['_trackEvent', 'docv3-navbar', 'click', 'doc-home-navbar-expo'])" target="_blank">{{ trans('support.tutorial') }}</a></li>
                <li><a href="{{ URL::route('hot', ['date'=>strtotime(date('Y-m-d'))]) }}" onclick="_hmt.push(['_trackEvent', 'docv3-navbar', 'click', 'doc-home-navbar-blog'])" target="_blank">{{ trans('support.hot') }}</a></li>
              </ul>
            </nav>
          </div>
        </header>
        
        <div id="logo" class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <img src="{{ URL::asset('images/logo.png') }}" >
                </div>
            </div>
        </div>
        
        <div id="form">        
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
        
        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>  
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>   
    </body>
</html>