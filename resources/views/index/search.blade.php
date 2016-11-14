<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/search.css') }}" >
    </head>
    <body>
        @include('header')
        
        <div id="container">
            <div id="result_stats">
                找到约 {{ number_format($total) }} 条结果 （用时 {{ number_format($running_time, 2) }} 秒）
            </div>
            
            <div id="result">
                <ul>
                    @foreach($torrents as $torrent)
                    <li>
                        <p><a class="title" href="{{ URL::route('show', ['id'=>Crypt::encrypt($torrent->id)]) }}">
                            {{ $torrent->name }}</a>
                        </p>
                        <span class='st'>
                            文件大小: <span class="value">{{ $torrent->length }}</span>
                            创建时间: <span class="value">{{ $torrent->created_at }}</span>
                            热度: <span class="value">{{ $torrent->hits }}</span>                                
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
            
            <div id="page">
                <table style="height: 80px; width: 100%;">
                    <tr>
                        <td>{!! $torrents->render() !!}</td>
                    </tr>
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
