<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- 他のモバイルで表示した時に自動でサイズ合わせてくれる -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">                <!-- csrf-tokenはuser情報取られないようにする -->
    <title>LM ECsite</title>
    <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>    <!-- Laravel標準で用意されているJavascriptを読み込み -->
                                                                         <!-- asset('ファイルパス')はpublicディレクトリのhttpパスを返す関数 -->
                                                                         <!-- secure_assetはpublic下httpsパスを返す関数-->
    <!----------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="https://87c1ac065f9145e183015d2ea2786408.vfs.cloud9.us-east-2.amazonaws.com/css/layout.css">
    <!----------------------------------------------------------------------------------------------->
　　<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!----------------------------------------------------------------------------------------------->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!----------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!----------------------------------------------------------------------------------------------->
  </head>
  
  <body>
    <hr class="top-line">
    <div class="container">
        <header>
            <h1>
               <a class="logo-pic" href="{{ route('top_page') }}">
                  <img src="{{ asset('image/logo2.png') }}" alt="サイトタイトル">
               </a>
            </h1>
            <div id="snsicon">
                <a href="{{ route('cartitem_view') }}">
                    <i class="fas fa-shopping-cart fa-1x fa-fw fa-border fa-pull-right"></i>
                </a>
                <a href="https://www.instagram.com/lmselect5484" target="_blank">
                    <i class="fab fa-instagram fa-1x fa-fw fa-border fa-pull-right"></i>
                </a>
            </div>
            <nav>
                <ul class="top-nav">
                          <li><a  class="global-nav" href="#">新着商品</a></li>
                          <li><a  class="global-nav" href="{{ route('product_list') }}">商品一覧</a></li>
                          <li>
                              <form method="get" action="{{ route('product_list') }}">
                                  <input type="text" name="keyword" placeholder="商品名">
                                  <input type="submit" value="商品検索">
                              </form>
                          </li>
                          {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a></li>
                          {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else     <!-- dropdown=ボタン押した時下に選択しを表示させる, caretは点滅する｜縦線, popupはリンク上にカーソル当てると移動先のURL表示されてたりする事 -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                          <li><a  class="global-nav" href="{{ route('register') }}">{{ _('会員登録') }}</a></li>
                          <li><a  class="global-nav" href="{{ route('contact') }}">{{ _('お問い合わせ') }}</a></li>
                </ul>
            </nav>
        </header>
    </div>
      @yield('content')
  
  
  <!-- footer開始 -->
    <div class="container">
        <div class="row justify-content-center">
            <footer>
                <ul class="under-nav ">
                   <li><a class="global-nav" href="{{ route('top_page') }}">{{ _('ホーム') }}</a></li>
                   <li><a class="global-nav" href="{{ route('hyouki')}}">{{ _('特定商取引法に基づく表記') }}</a></li>
                   <li><a class="global-nav" href="{{ route('privacy') }}">{{ _('プライバシーポリシー') }}</a></li>
                   <li><a class="global-nav" href="{{ route('contact') }}">{{ _('お問い合わせ') }}</a></li>
                </ul>
                   <small>(C) 2020 LM by polyvalent.CoLtd</small>
            </footer>
        </div>
    </div>
    <hr class="bottom-line">
  </body>
  
</html>