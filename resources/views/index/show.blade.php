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
                        <h3 id="dropdowns" class="page-header">免责声明</h3>
                        <p>{{ $site_name }}是一个<a href='http://zh.wikipedia.org/zh/%E7%A3%81%E5%8A%9B%E9%93%BE%E6%8E%A5' target="_blank">磁力链接</a>搜索引擎，是学术研究的副产品，用于解决资源过度分散的问题</p>
                        <p>它通过<a href="http://zh.wikipedia.org/zh/BitTorrent_(%E5%8D%8F%E8%AE%AE)">BitTorrent协议</a>加入DHT网络，实时的自动采集数据，仅存储文件的标题、大小、文件列表、文件标识符（磁力链接）等基础信息</p>
                        <p>{{ $site_name }}不下载任何真实资源，无法判断资源的合法性及真实性，使用{{ $site_name }}服务的用户需自行鉴别内容的真伪</p>
                        <p>{{ $site_name }}不上传任何资源，不提供<a href="http://zh.wikipedia.org/zh/BitTorrent_tracker">Tracker服务</a>，不提供<a href="http://zh.wikipedia.org/wiki/%E7%A7%8D%E5%AD%90%E6%96%87%E4%BB%B6">种子文件</a>的下载，这意味着{{ $site_name }}是一个完全合法的系统</p>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="container bs-docs-container">
            <div class="row">
                <div class="col-md-9" role='main'>
                    <div class="bs-docs-section">
                        <h3 id="dropdowns" class="page-header">免责声明</h3>
<table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container bs-docs-container">
            <div class="row">
                <div class="col-md-9" role='main'>
                    <div class="bs-docs-section">
                        <h3 id="dropdowns" class="page-header">免责声明</h3>
<table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
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
        