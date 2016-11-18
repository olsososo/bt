<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <p class='copyright'>
                    Copyright © 2016 - 2018 {{ $site_name }}
                </p> 

                <p class="copyright" style="margin-top: 10px;">
                    声明：{{ $site_name }}（{{ url('/') }}）仅实时展示DHT网络动态，不提供任何BT种子和资源文件下载！
                </p>                   
            </div>
            <div class="col-md-2">
                <div class="btn-group dropup" style="position: absolute; right: 0; bottom: 0; margin-right: 30px;">
                    <button type="button" class="btn btn-default">English</button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                      <span class="sr-only">English</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="{{ URL::route('locale', ['locale'=>'en']) }}">English</a></li>
                      <li><a href="{{ URL::route('locale', ['locale'=>'fr']) }}">Français</a></li>
                      <li><a href="{{ URL::route('locale', ['locale'=>'es']) }}">Español</a></li>
                      <li><a href="{{ URL::route('locale', ['locale'=>'py']) }}">русский</a></li>
                      <li><a href="{{ URL::route('locale', ['locale'=>'zh-cn']) }}">简体中文</a></li>
                      <li><a href="{{ URL::route('locale', ['locale'=>'de']) }}">Deutsch</a></li>
                      <li><a href="{{ URL::route('locale', ['locale'=>'jp']) }}">日本語</a></li>
                    </ul>
                </div>                
            </div>
        </div>   
    </div>
</nav>
<!--

<div id="footer">
            <div id="footer-sub">
                <div>
                    <p class='copyright'>
                        Copyright © 2016 - 2018 {{ $site_name }}
                    </p> 
                    
                    <p class="copyright" style="margin-top: 10px;">
                        声明：{{ $site_name }}（{{ url('/') }}）仅实时展示DHT网络动态，不提供任何BT种子和资源文件下载！
                    </p>                     
                </div>
               
                <div class="btn-group dropup" style="position: absolute; right: 0; bottom: 0; margin-right: 30px;">
                    <button type="button" class="btn btn-default">English</button>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                      <span class="sr-only">English</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="{{ URL::route('locale', ['locale'=>'en']) }}">English</a></li>
                      <li><a href="{{ URL::route('locale', ['locale'=>'fr']) }}">Français</a></li>
                      <li><a href="{{ URL::route('locale', ['locale'=>'es']) }}">Español</a></li>
                      <li><a href="{{ URL::route('locale', ['locale'=>'py']) }}">русский</a></li>
                      <li><a href="{{ URL::route('locale', ['locale'=>'zh-cn']) }}">简体中文</a></li>
                      <li><a href="{{ URL::route('locale', ['locale'=>'de']) }}">Deutsch</a></li>
                      <li><a href="{{ URL::route('locale', ['locale'=>'jp']) }}">日本語</a></li>
                    </ul>
                </div>
            </div>
        </div>-->