<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="{{ URL::route('index') }}">iBitTorrent</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left" role="search" method="get" action="{{ url('/search')}}">
                <div class="input-group">
                    <input type="text" class="form-control" id="keyword" name="q" value="{{ $keyword or '' }}" placeholder="{{ trans('support.search_hint') }}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" id="search">Search</button>
                    </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ URL::route('disclaimer') }}">{{ trans('support.disclaimer') }}</a></li>
                <li><a href="{{ URL::route('tutorial') }}">{{ trans('support.tutorial') }}</a></li>
                <li><a href="{{ URL::route('hot') }}">{{ trans('support.hot') }}</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>