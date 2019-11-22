<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- 他のモバイルで表示した時に自動でサイズ合わせてくれる -->
    <meta name="csrf-token" content="{{ csrf_token() }}">                
    <title>LM ECsite管理用</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>    
                                                                        
    <link rel="stylesheet" href="https://87c1ac065f9145e183015d2ea2786408.vfs.cloud9.us-east-2.amazonaws.com/css/layout.css">
    <!----------------------------------------------------------------------------------------------->
　　<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!----------------------------------------------------------------------------------------------->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!----------------------------------------------------------------------------------------------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!----------------------------------------------------------------------------------------------->
    <style>body{background-color: black;}</style> 
    
  </head>
  
  <body>
      <div class="container mt-5 pt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-8"> 
                <div class="card">　　　　　　　　　　　　　　　　
                    <div class="card-header"><h4>{{ __('ログイン') }}</h4></div> <!-- __( $string ) の意味  _2つの __ 関数は、Lang::get の別名、PHPの言語機能では無く、国際化対応のために作成された関数で -->
                    
                        <div class="card-body">
                           <form method="post" action="{{ route('item_list') }}" name="login"> 
                           @csrf   
                   
                              <div class="form-group row">   
                                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Eメールアドレス') }}</label>
                                  
                                  <div class="col-md-6">         
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                                                                           
                                      @error('email')
                                           <span class="invalid-feedback" roll="alert">
                                               <strong>{{ $message}}</strong>
                                           </span>
                                      @enderror
                                  </div>
                              </div>
                                      
                              <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>
                                  
                                  <div class="col-md-6">
                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                      
                                      @error('password')
                                          <span class="invalid-feedback" roll="alert">
                                              <strong>{{ $message}}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>
                              
                              <div class="form-group row mb-0">　
                              　　<div class="col-md-8 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('ログイン') }}
                                      </button>
                              　　</div>
                              </div>
                              
                            </form>
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
 </html>