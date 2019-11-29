@extends('admin.admin_layout')

@section('title', '管理者ログイン')

@section('content')
  <body>
      <div class="container mt-5 pt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-8"> 
                <div class="card">　　　　　　　　　　　　　　　　
                    <div class="card-header"><h4>{{ __('ログイン') }}</h4></div> 
                    
                        <div class="card-body">
                           <form method="post" action="{{ route('admin.login') }}" name="login"> 
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
@endsection