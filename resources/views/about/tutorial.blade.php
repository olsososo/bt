<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="google-site-verification" content="m3cWN2rKcHueHcvAtVK1EUzWU9t1NIdY6Odzj24f7T4" />
        <title>{{ trans('support.tutorial') }} - {{ $site_name }}</title>
        <meta name="description" content=""/>
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" >
        <link rel="stylesheet" target='_blank' href="{{ URL::asset('css/global.css') }}" >        
        <link rel="stylesheet" target='_blank' href="{{ URL::asset('css/statement.css') }}" >  
    </head>
    <body>
        @include('header')
        
        <div class="container bs-docs-container">
            <div class="row">
                <div class="col-md-9" role='main'>
                    <div class="bs-docs-section">
                        <h3 id="dropdowns" class="page-header">{{ trans('support.tutorial') }}</h3>
                        {!! trans('support.tutorial_content', ['site_name'=>$site_name, 'site_url'=>url('/')]) !!}
                    </div>
                </div>
            </div>
        </div>
        
        @include('footer', ['nav' => 'navbar-fixed-bottom'])
        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>   
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script> 
    </body>
</html>