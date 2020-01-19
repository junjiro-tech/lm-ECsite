<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- 他のモバイルで表示した時に自動でサイズ合わせてくれる -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">                <!-- csrf-tokenはuser情報取られないようにする -->
    <title>Perlero ECsite</title>
    <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>    <!-- Laravel標準で用意されているJavascriptを読み込み -->
                                                                         <!-- asset('ファイルパス')はpublicディレクトリのパスを返す関数 -->
    <!----------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="css/style.css">                                                      
    <!----------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="css/normalize.css">
    <!----------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="css/top_page.css">
    <!----------------------------------------------------------------------------------------------->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!----------------------------------------------------------------------------------------------->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!----------------------------------------------------------------------------------------------->
　　<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!----------------------------------------------------------------------------------------------->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!----------------------------------------------------------------------------------------------->
    
  </head>
  <body>
      <!-- header始まり -->
      <header>
    　  <!-- Header desktop -->
		<div class="wrap-menu-header gradient1 trans-0-4">
			<div class="container h-full">
				<div class="wrap_header trans-0-3">
        
              <!-- ナビゲーション始まり -->
                  <nav>
                      <ul class="top-nav">
                          <!-- header-logo写真 -->   <!--  --> <!-- altは画像の説明 -->
                          <li><a class="logo-pic" href="{{ route('top_page') }}"><img src="image/LM_logo.png" alt="サイトタイトル"></a></li>
                          <!--<li><a class="logo-pic" href="#"></a></li>-->
                          <li><a  class="global-nav" href="#">新着商品</a></li>
                          <li><a  class="global-nav" href="#">おすすめ</a></li>
                          <li><a  class="global-nav" href="{{ route('search')}}">{{ _('商品検索') }}</a></li>
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
                          <li><a  class="global-nav" href="{{ route('contact') }}">{{ _('お問い合わせ') }}</a></li>
                          <i class="fas fa-shopping-cart fa-1x fa-fw fa-border fa-pull-right"></i>
                          <i class="fab fa-instagram fa-1x fa-fw fa-border fa-pull-right"></i>
                      </ul>
                  </nav>
        </div>   
      </div>
    </div>
      </header>
      @yield('content')
  </body>
  
  <!-- footer開始 -->
  <footer>
    <ul class="under-nav">
      <li><a class="global-nav" href="{{ route('top_page') }}">{{ _('ホーム') }}</a></li>
      <li><a class="global-nav" href="{{ route('hyouki')}}">{{ _('特定商取引法に基づく表記') }}</a></li>
      <li><a class="global-nav" href="{{ route('privacy') }}">{{ _('プライバシーポリシー') }}</a></li>
      <li><a class="global-nav" href="{{ route('contact') }}">{{ _('お問い合わせ') }}</a></li>
    </ul>
      <small>(C) 2020 LM.CoLtd</small>
  </footer>
</html>