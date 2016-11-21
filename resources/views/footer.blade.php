<nav class="navbar navbar-default {{ $nav or '' }}" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <a href='{{ url('/') }}'>{{ $site_name }}</a> {{ trans('support.footer_disclaimer') }}                                 
            </div>
        </div>   
    </div>
</nav>