<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        @include('verification')
        <title>{{ $keyword }} - {{ $site_name }}</title>
        <meta name="description" content=""/>
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/search.css') }}" >     
    </head>
    <body>
        @include('header')
        
        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <div class="col-md-9" role='main'>
                    <p>
                        {{ trans('support.took', ['total'=>number_format($total), 'second'=>number_format($running_time, 2) ]) }}
                    </p>

                    <div id="result">
                        <ul>
                            @foreach($torrents as $torrent)<li>
                                <p>
                                    <a class="title" target="_blank" href="{{ URL::route('show', ['id'=>base64_encode($torrent['id'])]) }}">
                                        {!! preg_replace("/$keyword/i", "<span style='color: #dd4b39;'>$keyword</span>", $torrent['name']) !!}
                                    </a>
                                </p>
                                <span class='st'>
                                    {{ trans('support.file_size') }}: <span class="label label-success" style="margin-right: 10px;">{{ size_format($torrent['length']) }}</span>
                                    {{ trans('support.created_time') }}: <span class="label label-primary" style="margin-right: 10px;">{{ date('Y-m-d', $torrent['created_at']) }}</span>
                                    {{ trans('support.update_time') }}: <span class="label label-warning" style="margin-right: 10px;">{{ date('Y-m-d', $torrent['updated_at']) }}</span>
                                    {{ trans('support.resource_heat') }}: <span class="label label-danger" style="margin-right: 10px;">{{ $torrent['hits'] }}</span>                                
                                </span>
                            </li>
                            @endforeach</ul>
                    </div>
                    
                    <div id="page">
                        <table style="height: 100px; width: 100%;">
                            <tr>
                                <td>
                                    {!! $pagintor->render() !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                          
                </div>
            </div>
        </div>
        
        @include('footer')
        
        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>        
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>      
    </body>
</html>
