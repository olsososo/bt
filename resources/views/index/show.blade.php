<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/show.css') }}" >
    </head>
    <body>
        <div id="header">
           <div id="logo">
                <a href="#"><img src="http://7xtf51.com2.z0.glb.clouddn.com/engiy/logo.png" /></a>
                <input type="text" id="keyword"/>
            </div>
            
            <div id="menu">
                <ul>
                    <li><a href="#">工具</a></li>
                    <li><a href="#">教程</a></li>
                    <li><a href="#">加入收藏</a></li>
                </ul>             
            </div>
        </div>
        
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
            
            <div class="detail">
                <div class='detail_sub'>
                    <span>磁链详情</span>
                </div>
                
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
                            <span class="tag"><a href='#'>{{ $tag->tag }}</a></span>
                            @endforeach
                        </td>
                    </tr>                       
                </table>
            </div>
            
            <div class="detail">
                <div class='detail_sub'>
                    <span>文件列表</span>
                </div>
                
                <table class='file'>
                    @foreach($files as $file)
                    <tr>
                        <td>{{ $file->file}}    {{ $file->length }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        
        <div id="footer">
            <div id="footer-sub">
                <span id="copyright">
                    本站仅供测试和学习交流, 内容均收集于互联网，如果有侵权内容、不妥之处，请联系我们删除。敬请谅解！
                </span> 

                <select id="language">
                    <option>简体中文</option>
                    <option>繁体中文</option>
                    <option>English</option>
                </select>
            </div>
        </div>
    </body>
</html>
        