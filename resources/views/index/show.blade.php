<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $torrent['name'] }} - {{ $site_name }}</title>
        <meta name="description" content="{{ $torrent['name'] }}"/>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/show.css') }}" >             
    </head>
    <body>
        @include('header')
        
        <div class="container">
            <div class="row">
                <div class="col-md-9" role='main'>
                    <h3 id="dropdowns" class="page-header">{{ trans('support.magnetic_link') }}</h3>
                    <p>
                        <a class="title" href="{{ URL::route('show', ['id'=>base64_encode($torrent['id'])]) }}">
                            {{ $torrent['name'] }}
                        </a>                            
                    </p>
                    <p>
                        <a class="magnet" href="magnet:?xt=urn:btih:{{ $torrent['infohash']}}&dn={{ $torrent['name']}}">
                            magnet:?xt=urn:btih:{{ $torrent['infohash']}}&dn={{ $torrent['name']}}
                        </a>                            
                    </p>

                    <button class="btn btn-success copy" type="button" style="margin-right: 10px;">
                        {{ trans('support.copy') }}
                    </button>

                    <button class="btn btn-danger" type="button" onclick="location.href='magnet:?xt=urn:btih:{{ $torrent["infohash"]}}'">
                        {{ trans('support.download') }}
                    </button>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-9" role='main'>
                    <h3 id="dropdowns" class="page-header">{{ trans('support.details') }}</h3>

                    <dl class="dl-horizontal" style="margin: 0;">
                      <dt>Hash</dt>
                      <dd>{{ $torrent['infohash'] }}</dd>
                      <dt>{{ trans('support.heat') }}</dt>
                      <dd>{{ $torrent['hits'] }}</dd>
                      <dt>{{ trans('support.file_size') }}</dt>
                      <dd>{{ size_format($torrent['length']) }}</dd>
                      <dt>{{ trans('support.number_of_files') }}</dt>
                      <dd>{{ count($files) }}</dd>
                      <dt>{{ trans('support.created_time') }}</dt>
                      <dd>{{ date('Y-m-d H:i:s', $torrent['created_at']) }}</dd>
                      <dt>{{ trans('support.update_time') }}</dt>
                      <dd>{{ date('Y-m-d H:i:s', $torrent['created_at']) }}</dd>
                      <dt>{{ trans('support.keyword') }}</dt>
                      <dd>
                        @if($tags)
                        @foreach($tags as $tag)
                        <a href='{{ URL::route('search', ['keyword'=>$tag]) }}' class="tag">{{ $tag }}</a>
                        @endforeach
                        @endif
                      </dd>                          
                    </dl>
                </div>
            </div>       
            
            <div class="row">
                <div class="col-md-9" role='main'>
                    <h3 id="dropdowns" class="page-header">{{ trans('support.file_list') }}</h3>
                    <table class="table">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>{{ trans('support.file') }}</th>
                            <th>{{ trans('support.size') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($files)
                        @foreach($files as $key => $file)
                        <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $file['file'] }}</td>
                        <td>{{ size_format($file['length']) }}</td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
        
        @include('footer')
 
        <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>   
        <script type="text/javascript" src="{{ URL::asset('js/jquery.zclip.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script> 
        <script type="text/javascript" src="{{ URL::asset('js/show.js') }}"></script>        
        <script>
        $(document).ready(function() {
            $('.copy').zclip({
                path: "{{ URL::asset('swf/ZeroClipboard.swf') }}",
                copy: function(){
                    return $('.magnet').attr('href');
                }
            });    
        });        
        </script>
    </body>
</html>
        