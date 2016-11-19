<nav class="navbar navbar-default {{ $nav or '' }}" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="text-align: center;">
                <p>
                    Copyright © 2016 - 2018 {{ $site_name }}
                </p> 

                <p>
                    {{ $site_name }}（{{ url('/') }}）{{ trans('support.footer_disclaimer') }}
                </p>                                     
            </div>
            <div class="col-md-2">
                <div class="btn-group dropup pull-right" style="margin-top: 15px;">
                    <button type="button" class="btn btn-default">
                        @if (app()->make('config')->get('app.locale') == 'en')
                            English
                        @elseif (app()->make('config')->get('app.locale') == 'fr')
                            Français
                        @elseif (app()->make('config')->get('app.locale') == 'es')
                            Español
                        @elseif (app()->make('config')->get('app.locale') == 'ru')
                            русский
                        @elseif (app()->make('config')->get('app.locale') == 'zh-CN')
                            简体中文
                        @elseif (app()->make('config')->get('app.locale') == 'de')
                            Deutsch     
                        @elseif (app()->make('config')->get('app.locale') == 'ja')
                            日本語 
                        @else
                            English
                        @endif                          
                    </button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::route('locale', ['locale'=>'en']) }}">English</a></li>
                        <li><a href="{{ URL::route('locale', ['locale'=>'fr']) }}">Français</a></li>
                        <li><a href="{{ URL::route('locale', ['locale'=>'es']) }}">Español</a></li>
                        <li><a href="{{ URL::route('locale', ['locale'=>'ru']) }}">русский</a></li>
                        <li><a href="{{ URL::route('locale', ['locale'=>'zh-CN']) }}">简体中文</a></li>
                        <li><a href="{{ URL::route('locale', ['locale'=>'de']) }}">Deutsch</a></li>
                        <li><a href="{{ URL::route('locale', ['locale'=>'ja']) }}">日本語</a></li>
                    </ul>
                </div>                
            </div>
        </div>   
    </div>
</nav>