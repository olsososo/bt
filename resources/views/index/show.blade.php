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
                            <td class="right">{{ $torrent['length'] }}</td>
                        </tr>    

                        <tr>
                            <td class="left">文件数量:</td>
                            <td class="right">{{ count($files) }}</td>
                        </tr>   

                        <tr>
                            <td class="left">创建日期:</td>
                            <td class="right">{{ $torrent['created_at'] }}</td>
                        </tr>   

                        <tr>
                            <td class="left">更新时间:</td>
                            <td class="right">{{ $torrent['created_at'] }}</td>
                        </tr>   

                        <tr>
                            <td class="left">搜索关键词:</td>
                            <td class="right">
                                @foreach($tags as $tag)
                                <a href='{{ URL::route('search', ['keyword'=>$tag->tag]) }}' class="tag">{{ $tag->tag }}</a>
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
                                <td class="left">{{ $file->file}}</td>
                                <td class="right">{{ $file->length }}</td>
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
        