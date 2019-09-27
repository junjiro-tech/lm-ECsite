@extends('layouts.layout')

@section('content')
    <div id="container">
        <div class="row justify-content-center"> <!--セルのセンター合わせ-->
            <div class="col-md-8"> <!--col=最大幅 col-*=auto col-sm=540px col-md=720px col-lg=960px col-xl=1140px    カラムは全部で12(md-8は8/12ということ)-->
                <div class="card">　　　　　　　　　　　　　　　　
                    <div class="card-header">{{ __('ログイン') }}</div> <!-- __( $string ) の意味  _2つの __ 関数は、Lang::get の別名、PHPの言語機能では無く、国際化対応のために作成された関数で -->
               
                        <div class="card-body">        <!-- {{ route('login') }}は定数 -->
                           <form method="post" action="{{ route('login') }}"> <!-- action属性=フォームで入力したdataの送信先URIを指定する、、 method属性=指定requiedはない-->
                           @csrf   <!-- ＠はlaravelで標準装備されているcsrfを読み込んでくれている。laravelがバージョンアップすると自動でそのセキュリティが入る -->
                           
                              <div class="form-group row"> <!-- form-group-row=横並び --> 
                                  <label for="name" class="col-md-4 col-form-label text-md-right">ご希望のユーザーID</label>
                                  
                                  <div class="col-md-6"> <!-- type=の属性で見た目が変わる -->       <!-- invalid=無効 -->   <!-- name属性でinputを管理 --> <!-- ここのvalueに挿入している要素は自動記憶 -->
                                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                      
                                      @error('name')  <!--@の所はメソッドを読み込んでいる -->
                                           <span class="invalid-feedback" roll="alert"> <!-- spanタグはインライン要素　幅、位置、余白が指定できない 主に文章の途中に文字色変えたりする時使う,roll=役割、意味を与える-->
                                               <strong>{{ $message}}</strong> <!-- stong要素は「強い重要性(警告)」のある場合や緊急性のある場合使用する --> <!-- $messageは変数,controllerの中にある -->
                                           </span>
                                      @enderror
                                  </div>
                              </div>      
                   
                              <div class="form-group row">   
                                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Eメールアドレス') }}</label>
                                  
                                  <div class="col-md-6">         
                                  <!-- text系はlabelと一緒にform-groupで囲う、text系はclass="form-control"の定義が必須   autocomplete機能が有効になっている場合は、過去に入力した内容が入力候補として表示されるようになる-->
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

                              <div class="form-group row">
                                  <div class="col-md-6 offset-md-4"> <!-- offsetは1つカラムを飛ばしたいときや余白を空けたい、中央に配置したいときにカラムのオフセット -->
                                      <div class="form-check">  <!-- input要素のtypeがcheckboxやradioの場合は、form-controlの代わりにform-check-inputを利用する -->
                                          <input id="remember" type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                          
                                          <label for="remember" class="form-check-label">
                                              {{ __('パスワードを保存') }}
                                          </label>
                                      </div>
                                  </div>
                              </div>
                              
                              <div class="form-group row mb-0">　<!-- mb-0はmargin-bottomを0にするとういう設定 m=marginを設定 b=bottomを設定 -->
                              　　<div class="col-md-8 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('ログイン') }}
                                      </button>
                                      
                                      @if(Route::has('password.request'))
                                          <a class="btn btn-link" href="{{ route('password.request') }}">
                                              {{ _('パスワードをお忘れですか?') }}
                                          </a>
                                      @endif
                              　　</div>
                              </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
