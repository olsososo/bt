<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BT</title>
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" >
        <link rel="stylesheet" href="{{ URL::asset('css/search.css') }}" >
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>        
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
                        <p><a class="title" target="_blank" href="{{ URL::route('show', ['id'=>Crypt::encrypt($torrent->id)]) }}">
                            {{ $torrent->name }}</a>
                        </p>
                        <span class='st'>
                            文件大小: <span class="label label-success">{{ $torrent->length }}</span>
                            创建时间: <span class="label label-primary">{{ $torrent->created_at }}</span>
                            热度: <span class="label label-danger">{{ $torrent->hits }}</span>                                
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
        
        @include('footer')
    </body>
</html>
