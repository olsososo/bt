<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="{{ URL::route('index') }}">iBitTorrent</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" id="keyword" placeholder="{{ trans('support.search_hint') }}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" id="search">Search</button>
                    </span>
                </div>
                <input type="hidden" id="action" value="{{ url('/search')}}" />
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ URL::route('disclaimer') }}">{{ trans('support.disclaimer') }}</a></li>
                <li><a href="{{ URL::route('tutorial') }}">{{ trans('support.tutorial') }}</a></li>
                <li><a href="{{ URL::route('hot') }}">{{ trans('support.hot') }}</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>