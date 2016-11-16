        <div id="header">
           <div id="left_menu">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td id="logo">
                            <a href="{{ URL::route('index') }}"><img src="http://7xtf51.com2.z0.glb.clouddn.com/engiy/logo.png" /></a>
                        </td>
                        <td>
                            <input type="hidden" id="action" value="{{ url('/search')}}" />
                            <input type="text" id="keyword" placeholder="{{ $keyword or '立即搜索磁力资源'}}"/>
                        </td>
                        <td>
                            <span id="search_spn">
                                <input id="search" type="button" value="搜索" />
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div id="menu">
                <ul>
                    <li><a href="#">免责声明</a></li>
                    <li><a href="#">使用教程</a></li>
                    <li><a href="{{ URL::route('hot') }}">最热资源</a></li>
                </ul>             
            </div>
        </div>