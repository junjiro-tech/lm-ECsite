@extends('layouts.layout')

@section('title', '会員登録入力')

@section('content')
            <form name="form2" method="post" action="{{ route('register_confirm') }}">
                @csrf
                
                <div id="register" class="wrap2">
                    <section class="main">
                        <h1 class="pageTitle">会員情報登録</h1>
                        <p>以下のフォームの項目を入力し、よろしければ「確認画面に進む」ボタンをクリックしてください</p>
                        
                        <table class="formTable">
                            <tbody>
                                <tr>
                                    <th>
                                        お名前
                                       <span class="required">必須</span>
                                    </th>             <!-- nameはformに渡してあげる名前 -->
                                    <td>              <!-- value 属性には、確認画面から戻ってきた場合に入力した値がクリアされないよう old() 関数を使って直前の入力値をセットするようにしている -->
                                        <p id="name-error" class="errorMessage"></p>
                                        <input type="text" name="name" size="15" maxlength="20" value="{{ old('name') }}">
                                        @if($errors->has('name'))
                                           <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                        <span class="notes">例) 山田　太郎</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        お名前 (フリガナ)
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <p id="kname-error" class="errorMessage"></p>
                                        <input type="text" name="kname" size="15" maxlength="20" value="{{ old('kname') }}">
                                        @if($errors->has('kname'))
                                           <p class="text-danger">{{ $errors->first('kname') }}</p>
                                        @endif
                                        <span class="notes">例) ヤマダ　タロウ</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        メールアドレス
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <p id="email-error" class="errorMessage"></p>
                                        <input type="text" name="email" size="20" maxlength="255" style="ime-mode:disabled;" value="{{ old('email') }}"> <!-- ime-mode:disabled;=英数字入力モードで固定 -->
                                        @if($errors->has('email'))
                                           <p class="text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                        <span class="notes">例) info@example.com ※半角英数字</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        メールアドレス確認
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <p id="email2-error" class="errorMessage"></p>
                                        <input type="text" name="email2" size="20" maxlength="255" style="ime-mode:disabled;" value="{{ old('email') }}">
                                        @if($errors->has('email2'))
                                           <p class="text-danger">{{ $errors->first('email2') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        パスワード
                                        <span class="required">必須</span>
                                        <input type="hidden" name="password1">  <!-- 送信したいデータがブラウザに表示されない -->
                                    </th>
                                    <td>
                                        <p id="password1-error" class="errorMessage"></p>
                                        <input type="password" name="password1" size="10" maxlength="16" style="ime-mode:disabled;" value="{{ old('password1') }}">
                                        @if($errors->has('password1'))
                                           <p class="text-danger">{{ $errors->first('password1') }}</p>
                                        @endif
                                        <span class="notes">&nbsp;※4～16文字の半角英数字</span>             <!-- &nbsp=ここの空白では改行したくない -->
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        パスワード確認
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input type="password" name="password2" size="10" maxlength="16" style="ime-mode:disabled;" value="{{ old('password2') }}">
                                        @if($errors->has('password2'))
                                           <p class="text-danger">{{ $errors->first('password2') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        性別
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input type="radio" name="gender" value="男">
                                        <label for="sexMale">男</label>
                                        <input type="radio" name="gender" value="女">
                                        <label for="sexfeMale">女</label>
                                        @if($errors->has('gender'))
                                           <p class="text-danger">{{ $errors->first('gender') }}</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        生年月日
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input type="text" name="birthday1" size="4" maxlength="4" pattern="[0-9]*" style="ime-mode:disabled;" class="inputs">
                                        年
                                        @if($errors->has('birthday1'))
                                           <p class="text-danger">{{ $errors->first('birthday1') }}</p>
                                        @endif
                                        <input type="text" name="birthday2" size="2" maxlength="2" pattern="[0-9]*" style="ime-mode:disabled;" class="inputs">
                                        月
                                        @if($errors->has('birthday2'))
                                           <p class="text-danger">{{ $errors->first('birthday2') }}</p>
                                        @endif
                                        <input type="text" name="birthday3" size="2" maxlength="2" pattern="[0-9]*" style="ime-mode:disabled;" class="inputs">
                                        日
                                        @if($errors->has('birthday3'))
                                           <p class="text-danger">{{ $errors->first('birthday3') }}</p>
                                        @endif
                                        <span class="notes">例) 1970年01月01日&nbsp;※半角数字</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        電話番号
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input type="text" name="phone1" size="5" maxlength="5" pattern="[0-9]*" style="ime-mode:disabled;" class="inputs">
                                        -
                                        @if($errors->has('phone1'))
                                           <p class="text-danger">{{ $errors->first('phone1') }}</p>
                                        @endif
                                        <input type="text" name="phone2" size="4" maxlength="4" pattern="[0-9]*" style="ime-mode:disabled;" class="inputs">
                                        -
                                        @if($errors->has('phone2'))
                                           <p class="text-danger">{{ $errors->first('phone2') }}</p>
                                        @endif
                                        <input type="text" name="phone3" size="4" maxlength="4" pattern="[0-9]*" style="ime-mode:disabled;" class="inputs">
                                        @if($errors->has('phone3'))
                                           <p class="text-danger">{{ $errors->first('phone3') }}</p>
                                        @endif
                                        <span class="notes">例) 00-0000-0000&nbsp;※半角数字</span>
                                        <input name="hphone" type="hidden" value>
                                    </td>
                                </tr>
                                <tr>
                                     <th>
                                        郵便番号
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input type="text" name="postal_code1" size="3" maxlength="3" pattern="[0-9]*" style="ime-mode:disabled;" class="inputs">
                                        -
                                        @if($errors->has('postal_code1'))
                                           <p class="text-danger">{{ $errors->first('postal_code1') }}</p>
                                        @endif
                                        <input type="text" name="postal_code2" size="4" maxlength="4" pattern="[0-9]*" style="ime-mode:disabled;" class="inputs">
                                        @if($errors->has('postal_code2'))
                                           <p class="text-danger">{{ $errors->first('postal_code2') }}</p>
                                        @endif
                                        <span class="notes">例) 000-0000&nbsp;※半角数字</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        都道府県
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <select name="prefectures_name" id="area">
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
                                            <option value="日が他県">新潟県</option>
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
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        市区町村
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input type="text" name="city" size="20" maxlength="80">
                                        @if($errors->has('city'))
                                           <p class="text-danger">{{ $errors->first('city') }}</p>
                                        @endif
                                        <span class="notes">例) 渋谷区</span>
                                    </td>
                                </tr>
                                <tr>
                                　　<th>
                                        それ以降の住所
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input type="text" name="subsequent_address" size="30" maxlength="120">
                                        @if($errors->has('subsequent_address'))
                                           <p class="text-danger">{{ $errors->first('subsequent_address') }}</p>
                                        @endif
                                        <span class="notes">例) 〇〇町1-1-1</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="policyWrap">
                            <h2 class="policyTitle">会員規約および個人情報の取り扱いについて</h2>
                            <div class="privacyPolicyWrap">
                                <iframe id="inline-frame" src ="iframe.html" scrolling="yes" width="530" height="200"></iframe>
                            </div>
                            <div class="agreeBox">
                                <input type="checkbox" name="agree" class="agreeCheck" id="agree">
                                <label for="agree">上記会員規約、個人情報の取り扱いについて同意する</label>
                            </div>
                        </div>
                    </section>
                </div>
                　　<input type="submit" value="確認画面に進む">
            </form>
@endsection
