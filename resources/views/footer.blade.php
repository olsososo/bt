<nav class="navbar navbar-default {{ $nav or '' }}" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <p style="opacity: 0.75; line-height: 75px; height: 75px;">
                    <a href='{{ url('/') }}'>{{ $site_name }}</a> {{ trans('support.footer_disclaimer') }}
                </p>                                     
            </div>
        </div>   
    </div>
</nav>