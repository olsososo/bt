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

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-53246231-3', 'auto');
            ga('send', 'pageview');
        </script>

        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58355dd47c068b12"></script>