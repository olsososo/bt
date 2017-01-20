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
        <div class="container-fluid">
            <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ URL::route('disclaimer') }}" onclick="_hmt.push(['_trackEvent', 'docv3-navbar', 'click', 'doc-home-navbar-job'])" target="_blank">{{ trans('support.disclaimer') }}</a></li>
                    <li><a href="{{ URL::route('tutorial') }}" onclick="_hmt.push(['_trackEvent', 'docv3-navbar', 'click', 'doc-home-navbar-expo'])" target="_blank">{{ trans('support.tutorial') }}</a></li>
                    <li><a href="{{ URL::route('hot', ['date'=>strtotime(date('Y-m-d'))]) }}" onclick="_hmt.push(['_trackEvent', 'docv3-navbar', 'click', 'doc-home-navbar-blog'])" target="_blank">{{ trans('support.hot') }}</a></li>
                </ul>
            </nav>
        </div>
        
        <div id="logo" class="container-fluid">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4 col-md-4 col-md-offset-4">
                    <img src="{{ URL::asset('images/logo.png') }}" >
                </div>
            </div>
        </div>
        
        <div class="container-fluid" id="form">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="keyword" placeholder="{{ trans('support.search_hint') }}">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="search">Search</button>
                        </span>
                    </div>
                    <input type="hidden" id="action" value="{{ url('/search')}}" />
                    
                    <p>{!! trans('support.total_torrents', ['total'=>'']) !!}</p>
                </div>
            </div>
        </div>
         
        <div style="width: 728px; margin: 20px auto;">
            @if ($env == 'production')
<script type="text/javascript"> 
clicksor_enable_adhere = false; 

clicksor_default_url = '';
clicksor_banner_border = '#99CC33'; 
clicksor_banner_ad_bg = '#FFFFFF';
clicksor_banner_link_color = '#000000'; 
clicksor_banner_text_color = '#666666';
clicksor_layer_border_color = '';
clicksor_layer_ad_bg = ''; 
clicksor_layer_ad_link_color = '';
clicksor_layer_ad_text_color = ''; 
clicksor_text_link_bg = '';
clicksor_text_link_color = ''; 
clicksor_enable_text_link = false;

clicksor_banner_text_banner = false;
clicksor_banner_image_banner = true; 
clicksor_enable_layer_pop = false;
clicksor_enable_pop = false;
</script>
<script type="text/javascript" src="http://b.clicksor.net/show.php?nid=1&amp;pid=380563&amp;adtype=1&amp;sid=639195"></script>
            @endif
        </div>
        
        @include('footer', ['nav' => 'navbar-fixed-bottom'])
        
        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/index.js') }}"></script>  
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>   
    </body>
</html>