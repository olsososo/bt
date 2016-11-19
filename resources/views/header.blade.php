        <div id="header">
           <div id="left_menu">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td id="logo">
                            <a href="{{ URL::route('index') }}"><img src="http://7xtf51.com2.z0.glb.clouddn.com/engiy/logo.png" /></a>
                        </td>
                        <td>
                            <input type="hidden" id="action" value="{{ url('/search')}}" />
                            <input type="text" id="keyword" placeholder="{{ trans('support.search_hint') }}" value="{{ $keyword or '' }}"/>
                        </td>
                        <td>
                            <span id="search_spn">
                                <input id="search" type="button" value="{{ trans('support.search') }}" />
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div id="menu">
                <ul>
                    <li><a href="{{ URL::route('disclaimer') }}" target="_blank">{{ trans('support.disclaimer') }}</a></li>
                    <li><a href="{{ URL::route('tutorial') }}" target="_blank">{{ trans('support.tutorial') }}</a></li>
                    <li><a href="{{ URL::route('hot') }}" target="_blank">{{ trans('support.hot') }}</a></li>
                </ul>             
            </div>
        </div>