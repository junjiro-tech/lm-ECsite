<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">                
    <title>LM ECsite</title>
    <!-- Scripts -->
        <script src="{{ secure_asset('js/app.js') }}" defer></script>    
    <!--------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="https://87c1ac065f9145e183015d2ea2786408.vfs.cloud9.us-east-2.amazonaws.com/css/layout.css">
    <!--------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--------------------------------------------------------------------------------------------->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--------------------------------------------------------------------------------------------->
  </head>

    <body>
        <header class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <span class="navbar-brand">LM管理画面</span>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('item_list') }}">
                                画像一覧
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="container py-md-3">
            @yield('content')
        </div>
    </body>
</html>