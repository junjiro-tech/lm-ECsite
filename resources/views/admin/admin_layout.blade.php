<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="csrf-token" content="{{ csrf_token() }}">                
    <title>Perlero ECsite 管理者用</title>

        <script src="{{ secure_asset('js/app.js') }}" defer></script>    
    <!--------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="https://87c1ac065f9145e183015d2ea2786408.vfs.cloud9.us-east-2.amazonaws.com/css/layout.css">
    <!--------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--------------------------------------------------------------------------------------------->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--------------------------------------------------------------------------------------------->
    <style>body{background-color: white;}</style> 
  </head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">

                        <div class="card-header">Perlero管理者画面</div>
                        <a href="/admin/images/list">登録商品一覧</a>

                </div>
            </div>
        </div>
        <div class="container py-md-3">
            @yield('content')
        </div>
    </body>
</html>