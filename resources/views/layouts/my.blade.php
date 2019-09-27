<!DOCTYPE heml>
<html lang="{{ app()->getLacale() }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">              {{-- windowsの基本ブラウザであるedgeに対応するという記載 気にしなくてOK --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">{{-- 画面幅を小さくしたとき、例えばスマートフォンで見たときなどに文字や画像の大きさを調整してくれるタグ --}}
        <meta name="csrf-token" contents="{{ csrf_token() }}">             {{-- 指定のフォームを利用して投稿しているかどうか確認する 別のサイトに書かれているURLをクリックして投稿したりするのを防ぐため --}}
        <title>@yield('title')</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">   {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet"> {{-- 後半で作成するCSSを読み込みます --}}
    </head>
    
    <body>
        <div id="app">
            
                
            </nav>
        </div>
    </body>
</html>