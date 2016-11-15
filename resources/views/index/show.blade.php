<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/show.css') }}" >        
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>           
    </head>
    <body>
        @include('header')
        
        <div id="container">
            <div id="summary">
                <a class="title" href="{{ URL::route('show', ['id'=>Crypt::encrypt($torrent['id'])]) }}">
                    {{ $torrent['name'] }}
                </a><br/>
                       
                <a class="magnet" href="magnet:?xt=urn:btih:magnet:?xt=urn:btih:{{ $torrent['infohash']}}">
                    magnet:?xt=urn:btih:{{ $torrent['infohash']}}
                </a><br/>
                
                <ul>
                    <li class="copy"><a href='#'>复制链接</a></li>
                    <li class='download'><a href='#'>磁力下载</a></li>
                    <li class='play'><a href='#'>网盘播放</a></li>
                    <li class='share'><a href='#'>分享给好友</a></li>
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
                            <td class="left">最后访问:</td>
                            <td class="right">{{ $torrent['created_at'] }}</td>
                        </tr>   

                        <tr>
                            <td class="left">访问标签:</td>
                            <td class="right">
                                @foreach($tags as $tag)
                                <span class="tag"><a href='{{ URL::route('search', ['keyword'=>$tag->tag]) }}'>{{ $tag->tag }}</a></span>
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
            
            <div class="panel panel-danger">
                  <div class="panel-heading">
                    <h3 class="panel-title">本站声明</h3>
                  </div>
                  <div class="panel-body">
                        <span class="notice">本站仅提供交流分享BT下载/迅雷下载/电驴下载等有关.torrentBT种子文件的信息，其他实际文件均不在本站服务器，如果您认为有资源信息侵犯了您的权益，请告知本站，我们将尽快协助处理。</span>
                  </div>
            </div>     
        </div>
        
        @include('footer')
    </body>
</html>
        