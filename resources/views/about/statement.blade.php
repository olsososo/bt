<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" >        
        <link rel="stylesheet" href="{{ URL::asset('css/statement.css') }}" >  
    </head>
    <body>
        @include('header')
        
        <div class="container bs-docs-container">
            <div class="row">
                <div class="col-md-9" role='main'>
                    <div class="bs-docs-section">
                        <h1 id="dropdowns" class="page-header">Dropdowns <small>dropdown.js</small></h1>
                        <h2 id="dropdowns-usage">Usage</h2>
                        <p>Via data attributes or JavaScript, the dropdown plugin toggles hidden content (dropdown menus) by toggling the <code>.open</code> class on the parent list item.</p>
                        <p>On mobile devices, opening a dropdown adds a <code>.dropdown-backdrop</code> as a tap area for closing dropdown menus when tapping outside the menu, a requirement for proper iOS support. <strong class="text-danger">This means that switching from an open dropdown menu to a different dropdown menu requires an extra tap on mobile.</strong></p>
                        <p>Note: The <code>data-toggle="dropdown"</code> attribute is relied on for closing dropdown menus at an application level, so it's a good idea to always use it.</p>
                    </div>
                </div>
            </div>
        </div>
        
        @include('footer')
        <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>   
        <script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?move=0&amp;btn=r1.gif" charset="utf-8"></script>
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script> 
    </body>
</html>