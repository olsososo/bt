 
<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
  <div class="container">
    ...
  </div>
</nav>

<footer class="bs-docs-footer" role="contentinfo">
  <div class="container">
    

    <p>Designed and built with all the love in the world by <a href="https://twitter.com/mdo" target="_blank">@mdo</a> and <a href="https://twitter.com/fat" target="_blank">@fat</a>.</p>
    <p>Maintained by the <a href="https://github.com/orgs/twbs/people">core team</a> with the help of <a href="https://github.com/twbs/bootstrap/graphs/contributors">our contributors</a>.</p>
    <p>本项目源码受 <a href="https://github.com/twbs/bootstrap/blob/master/LICENSE" target="_blank">MIT</a> 开源协议保护，文档受 <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a> 开源协议保护。</p>
    <ul class="bs-docs-footer-links muted">
      <li>当前版本： v3.3.0</li>
      <li>·</li>
      <li><a href="https://github.com/twbs/bootstrap">GitHub 仓库</a></li>
      <li>·</li>
      <li><a href="../getting-started/#examples">实例精选</a></li>
      <li>·</li>
      <li><a href="http://v2.bootcss.com/">v2.3.2 中文文档</a></li>
      <li>·</li>
      <li><a href="../about/">关于</a></li>
      <li>·</li>
      <li><a href="http://expo.bootcss.com">优站精选</a></li>
      <li>·</li>
      <li><a href="http://blog.getbootstrap.com">官方博客</a></li>
      <li>·</li>
      <li><a href="https://github.com/twbs/bootstrap/issues">Issues</a></li>
      <li>·</li>
      <li><a href="https://github.com/twbs/bootstrap/releases">历史版本</a></li>
    </ul>
  </div>
</footer>

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
                
<!--                <select id="language">
                    <option>简体中文</option>
                    <option>繁体中文</option>
                    <option>English</option>
                </select>-->
            </div>
        </div>