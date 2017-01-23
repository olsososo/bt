        <div id="header">
           <div id="left_menu">
               <form role="search" method="get" action="{{ url('/search')}}">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <td id="logo">
                                <a href="{{ URL::route('index') }}"><img src="{{ URL::asset('images/logo.png') }}" /></a>
                            </td>
                            <td>
                                <input type="text" id="keyword" name="q" placeholder="{{ trans('support.search_hint') }}" value="{{ $keyword or '' }}"/>
                            </td>
                            <td>
                                <span id="search_spn">
                                    <input id="search" type="submit" value="{{ trans('support.search') }}" />
                                </span>
                            </td>
                        </tr>
                    </table>
               </form>
            </div>
            
            <div id="menu">
                <ul>
                    <li><a href="{{ URL::route('disclaimer') }}">{{ trans('support.disclaimer') }}</a></li>
                    <li><a href="{{ URL::route('tutorial') }}">{{ trans('support.tutorial') }}</a></li>
                    <li><a href="{{ URL::route('hot') }}">{{ trans('support.hot') }}</a></li>
                </ul>             
            </div>
        </div>