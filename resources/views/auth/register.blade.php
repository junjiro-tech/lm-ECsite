@extends('layouts.layout')

@section('title', '会員登録入力')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>会員情報登録</h4><p>以下のフォームの項目を入力し、よろしければ「確認画面に進む」ボタンをクリックしてください</p></div>
            　　
                <div class="card-body">
     　              <form name="form" method="post" action="{{ route('register_confirm') }}">
                    @csrf
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">お名前 <span class="required">必須</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" size="20" maxlength="20" placeholder="例) 山田　太郎" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @if($errors->has('name'))
                                           <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                </div>
                    </div>
                    <div class="form-group row">
                            <label for="kname" class="col-md-4 col-form-label text-md-right">お名前(フリガナ) <span class="required">必須</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('kname') is-invalid @enderror" name="kname" size="20" maxlength="20" placeholder="例) ヤマダ　タロウ" value="{{ old('kname') }}" required autocomplete="kname" autofocus>
                                        @if($errors->has('kname'))
                                           <p class="text-danger">{{ $errors->first('kname') }}</p>
                                        @endif
                                </div>
                    </div>
                    <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス <span class="required">必須</span></label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" size="20" maxlength="20" placeholder="例) info@example.com ※半角英数字" value="{{ old('email') }}"  required autocomplete="email">
                                        @if($errors->has('email'))
                                           <p class="text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                </div>
                    </div>
                    <div class="form-group row">
                            <label for="email_confirmation" class="col-md-4 col-form-label text-md-right">メールアドレス確認 <span class="required">必須</span></label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control @error('email_confirmation') is-invalid @enderror" name="email_confirmation" size="20" maxlength="20" placeholder="" value="{{ old('email_confirmation') }}"  required autocomplete="email_confirmation">
                                        @if($errors->has('email_confirmation'))
                                           <p class="text-danger">{{ $errors->first('email_confirmation') }}</p>
                                        @endif
                                </div>
                    </div>
                    <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード <span class="required">必須</span></label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" size="20" maxlength="20" placeholder="例)※8～16文字の半角英数字" value="{{ old('password') }}" required autocomplete="password" autofocus>
                                        @if($errors->has('password'))
                                           <p class="text-danger">{{ $errors->first('password') }}</p>
                                        @endif
                                </div>
                    </div>
                    <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">パスワード確認 <span class="required">必須</span></label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" size="20" maxlength="20" placeholder="" value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation" autofocus>
                                        @if($errors->has('password_confirmation'))
                                           <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                                        @endif
                                </div>
                    </div>
                    <div class="form-group row">
                            <label for="sexMale" class="col-md-4 col-form-label text-md-right">性別 <span class="required">必須</span></label>
                                <div class="col-sm-2">
                                    <input type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" value="男">
                                        <label for="sexMale">男</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" value="女">
                                        <label for="sexfeMale">女</label>
                                        @if($errors->has('gender'))
                                           <p class="text-danger">{{ $errors->first('gender') }}</p>
                                        @endif
                                </div>
                    </div>
                    <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">生年月日 <span class="required">必須</span></label>
                                <div class="col-sm-2">
                                    <input type="birthday1" class="form-control @error('birthday1') is-invalid @enderror" name="birthday1" pattern="[0-9]*" size="4" maxlength="4" placeholder="例) 1980" value="{{ old('birthday1') }}" required autocomplete="birthday1" autofocus>
                                        @if($errors->has('birthday1'))
                                           <p class="text-danger">{{ $errors->first('birthday1') }}</p>
                                        @endif
                                </div>
                                年
                                <div class="col-sm-2">
                                    <input type="birthday2" class="form-control @error('birthday2') is-invalid @enderror" name="birthday2" pattern="[0-9]*" size="2" maxlength="2" placeholder="01" value="{{ old('birthday2') }}" required autocomplete="birthday2" autofocus>
                                        @if($errors->has('birthday2'))
                                           <p class="text-danger">{{ $errors->first('birthday2') }}</p>
                                        @endif
                                </div>
                                月
                                <div class="col-sm-2">
                                    <input type="birthday3" class="form-control @error('birthday3') is-invalid @enderror" name="birthday3" pattern="[0-9]*" size="2" maxlength="2" placeholder="01" value="{{ old('birthday3') }}" required autocomplete="birthday3" autofocus>
                                        @if($errors->has('birthday3'))
                                           <p class="text-danger">{{ $errors->first('birthday3') }}</p>
                                        @endif
                                </div>
                                日
                    </div>
                    <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">電話番号 <span class="required">必須</span></label>
                                <div class="col-md-6">
                                    <input type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" size="20" maxlength="15" placeholder="例) 000-0000-0000" value="{{ old('tel') }}" required autocomplete="tel" autofocus>
                                        @if($errors->has('tel'))
                                           <p class="text-danger">{{ $errors->first('tel') }}</p>
                                        @endif
                                </div>
                    </div>
                    <div class="form-group row">
                            <label for="postal_code" class="col-md-4 col-form-label text-md-right">郵便番号 <span class="required">必須</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" size="10" maxlength="8" placeholder="例) 000-0000" value="{{ old('tel') }}" required autocomplete="postal_code" autofocus>
                                        @if($errors->has('postal_code'))
                                           <p class="text-danger">{{ $errors->first('postal_code') }}</p>
                                        @endif
                                </div>
                    </div>
                    <div class="form-group row">
                            <label for="prefectures_name" class="col-md-4 col-form-label text-md-right">都道府県 <span class="required">必須</span></label>
                                <div class="col-xs-2">
                                    <select name="prefectures_name" class="form-control" id="area">
                                            <option value>選択してください</option>
                                            <option value="北海道">北海道</option>
                                            <option value="青森県">青森県</option>
                                            <option value="岩手県">岩手県</option>
                                            <option value="宮城県">宮城県</option>
                                            <option value="秋田県">秋田県</option>
                                            <option value="山形県">山形県</option>
                                            <option value="福島県">福島県</option>
                                            <option value="茨城県">茨木県</option>
                                            <option value="栃木県">栃木県</option>
                                            <option value="群馬県">群馬県</option>
                                            <option value="埼玉県">埼玉県</option>
                                            <option value="千葉県">千葉県</option>
                                            <option value="東京都">東京都</option>
                                            <option value="神奈川県">神奈川県</option>
                                            <option value="新潟県">新潟県</option>
                                            <option value="富山県">富山県</option>
                                            <option value="石川県">石川県</option>
                                            <option value="福井県">福井県</option>
                                            <option value="山梨県">山梨県</option>
                                            <option value="長野県">長野県</option>
                                            <option value="岐阜県">岐阜県</option>
                                            <option value="静岡県">静岡県</option>
                                            <option value="愛知県">愛知県</option>
                                            <option value="三重県">三重県</option>
                                            <option value="滋賀県">滋賀県</option>
                                            <option value="京都府">京都府</option>
                                            <option value="大阪府">大阪府</option>
                                            <option value="兵庫県">兵庫県</option>
                                            <option value="奈良県">奈良県</option>
                                            <option value="和歌山県">和歌山県</option>
                                            <option value="鳥取県">鳥取県</option>
                                            <option value="島根県">島根県</option>
                                            <option value="岡山県">岡山県</option>
                                            <option value="広島県">広島県</option>
                                            <option value="山口県">山口県</option>
                                            <option value="徳島県">徳島県</option>
                                            <option value="香川県">香川県</option>
                                            <option value="愛媛県">愛媛県</option>
                                            <option value="高知県">高知県</option>
                                            <option value="福岡県">福岡県</option>
                                            <option value="佐賀県">佐賀県</option>
                                            <option value="長崎県">長崎県</option>
                                            <option value="熊本県">熊本県</option>
                                            <option value="大分県">大分県</option>
                                            <option value="宮崎県">宮崎県</option>
                                            <option value="鹿児島県">鹿児島県</option>
                                            <option value="沖縄県">沖縄県</option>
                                        </select>
                                        @if($errors->has('prefectures_name'))
                                           <p class="text-danger">{{ $errors->first('prefectures_name') }}</p>
                                        @endif
                                </div>
                    </div>
                    <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">市区町村 <span class="required">必須</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" size="20" maxlength="80" placeholder="例) 渋谷区" value="{{ old('city') }}" required autocomplete="city" autofocus>
                                        @if($errors->has('city'))
                                           <p class="text-danger">{{ $errors->first('city') }}</p>
                                        @endif
                                </div>
                    </div>
                    <div class="form-group row">
                            <label for="subsequent_address" class="col-md-4 col-form-label text-md-right">それ以降の住所 <span class="required">必須</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('subsequent_address') is-invalid @enderror" name="subsequent_address" size="30" maxlength="120" placeholder="例) 〇〇町1-1-1" value="{{ old('subsequent_address') }}" required autocomplete="subsequent_address" autofocus>
                                        @if($errors->has('subsequent_address'))
                                           <p class="text-danger">{{ $errors->first('subsequent_address') }}</p>
                                        @endif
                                </div>
                    </div>
                    
                    <div class="card-footer">
                        <h4>会員規約および個人情報の取り扱いについて</h4>
                            <div class="policyWrap">
                                <div class="privacyPolicyWrap">
                                    <iframe id="inline-frame" src ="iframe.html" scrolling="yes" width="530" height="200"></iframe>
                                </div>
                                <div class="agreeBox">
                                     <input type="checkbox" name="agree" class="agreeCheck" id="agree">
                                     <label for="agree">上記会員規約、個人情報の取り扱いについて同意する</label>
                                </div>
                            </div>
                            <div class="form-group row mb-0">　<!-- mb-0はmargin-bottomを0にするとういう設定 m=marginを設定 b=bottomを設定 -->
                              　　<div class="col-md-8 offset-md-4">
                                            <input type="submit" href="{{ route('register_confirm') }}" value="確認画面に進む">
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
