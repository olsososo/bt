<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" target='_blank' href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
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
                        {!! trans('support.tutorial_content', ['site_name'=>$site_name, 'site_url'=>URL::route('/')]) !!}
                    </div>
                </div>
            </div>
        </div>
        
        @include('footer', ['nav' => 'navbar-fixed-bottom'])
        <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>   
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script> 
    </body>
</html>