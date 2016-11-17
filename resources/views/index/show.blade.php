<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/show.css') }}" >             
    </head>
    <body>
        @include('header')
        
        <div class="container bs-docs-container">
            <div class="row">
                <div class="col-md-9" role='main'>
                    <div class="bs-docs-section">
                        <h3 id="dropdowns" class="page-header">磁链</h3>
                        <p>
                            <a class="title" href="{{ URL::route('show', ['id'=>base64_encode($torrent['id'])]) }}">
                                {{ $torrent['name'] }}
                            </a>                            
                        </p>
                        <p>
                            <a class="magnet" href="magnet:?xt=urn:btih:{{ $torrent['infohash']}}">
                                magnet:?xt=urn:btih:{{ $torrent['infohash']}}&dn={{ $torrent['name']}}
                            </a>                            
                        </p>
                        
                        <button class="btn btn-success copy" type="button" style="margin-right: 10px;">
                            复制链接
                        </button>
                        
                        <button class="btn btn-danger" type="button" onclick="location.href='magnet:?xt=urn:btih:{{ $torrent["infohash"]}}'">
                            磁力下载
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="container bs-docs-container">
            <div class="row">
                <div class="col-md-9" role='main'>
                    <div class="bs-docs-section">
                        <h3 id="dropdowns" class="page-header">磁链详情</h3>

                        <dl class="dl-horizontal" style="margin: 0;">
                          <dt>Hash值</dt>
                          <dd>{{ $torrent['infohash'] }}</dd>
                          <dt>种子热度</dt>
                          <dd>{{ $torrent['hits'] }}</dd>
                          <dt>文件大小</dt>
                          <dd>{{ size_format($torrent['length']) }}</dd>
                          <dt>文件数量</dt>
                          <dd>{{ count($files) }}</dd>
                          <dt>创建日期</dt>
                          <dd>{{ date('Y-m-d H:i:s', $torrent['created_at']) }}</dd>
                          <dt>更新时间</dt>
                          <dd>{{ date('Y-m-d H:i:s', $torrent['created_at']) }}</dd>
                          <dt>关键词</dt>
                          <dd>
                            @foreach($tags as $tag)
                            <a href='{{ URL::route('search', ['keyword'=>$tag]) }}' class="tag">{{ $tag }}</a>
                            @endforeach                              
                          </dd>                          
                        </dl>

                    </div>
                </div>
            </div>
        </div>

        <div class="container bs-docs-container">
            <div class="row">
                <div class="col-md-9" role='main'>
                    <div class="bs-docs-section">
                        <h3 id="dropdowns" class="page-header">文件列表</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>文件</th>
                                <th>大小</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $key => $file)
                            <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $file['file'] }}</td>
                            <td>{{ size_format($file['length']) }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        
        <div id="container">
            <div id="summary">
                <a class="title" href="{{ URL::route('show', ['id'=>base64_encode($torrent['id'])]) }}">
                    {{ $torrent['name'] }}
                </a><br/>
                       
                <a class="magnet" href="magnet:?xt=urn:btih:{{ $torrent['infohash']}}">
                    magnet:?xt=urn:btih:{{ $torrent['infohash']}}
                </a><br/>
                
                <ul>
                    <li class="copy"><a href='#'>复制链接</a></li>
                    <li class='download'><a href='magnet:?xt=urn:btih:{{ $torrent['infohash']}}'>磁力下载</a></li>
                </ul>
            </div>
            
            <div class="panel panel-success">
                <div class="panel-heading">
                <h3 class="panel-title">磁链详情</h3>
                </div>
                <div class="panel-body">
                    <table class='torrent'>
                        <tr>
                            <td class="left">Hash值:</td>
                            <td class="right">{{ $torrent['infohash'] }}</td>
                        </tr>

                        <tr>
                            <td class="left">种子热度:</td>
                            <td class="right">{{ $torrent['hits'] }}</td>
                        </tr>

                        <tr>
                            <td class="left">文件大小:</td>
                            <td class="right">{{ size_format($torrent['length']) }}</td>
                        </tr>    

                        <tr>
                            <td class="left">文件数量:</td>
                            <td class="right">{{ count($files) }}</td>
                        </tr>   

                        <tr>
                            <td class="left">创建日期:</td>
                            <td class="right">{{ date('Y-m-d H:i:s', $torrent['created_at']) }}</td>
                        </tr>   

                        <tr>
                            <td class="left">更新时间:</td>
                            <td class="right">{{ date('Y-m-d H:i:s', $torrent['created_at']) }}</td>
                        </tr>   

                        <tr>
                            <td class="left">搜索关键词:</td>
                            <td class="right">
                                @foreach($tags as $tag)
                                <a href='{{ URL::route('search', ['keyword'=>$tag]) }}' class="tag">{{ $tag }}</a>
                                @endforeach
                            </td>
                        </tr>                       
                    </table>
                  </div>
            </div>
            
            <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 class="panel-title">文件列表</h3>
                  </div>
                  <div class="panel-body">
                        <table class='file'>
                            @foreach($files as $file)
                            <tr>
                                <td class="left">{{ $file['file'] }}</td>
                                <td class="right">{{ size_format($file['length']) }}</td>
                            </tr>
                            @endforeach
                        </table>
                  </div>
            </div> 
        </div>
        
        @include('footer')
 
        <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>   
        <script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?move=0&amp;btn=r1.gif" charset="utf-8"></script>
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
        