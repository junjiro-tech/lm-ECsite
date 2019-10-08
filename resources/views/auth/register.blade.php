@extends('layouts.layout')

@section('content')
            <form name="form2" action="{{ route('register') }}" method="post">
                @csrf
                
                <div id="entry" class="wrap">
                    <section class="main">
                        <h1 class="pageTitle">会員情報登録</h1>
                        <p>以下のフォームに必要事項をご入力ください</p>
                        
                        <table class="formTable">
                            <tbody>
                                <tr>
                                    <th>
                                        お名前
                                       <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input type="text" name="name" size="15" maxlength="20">
                                        @if($errors->has('name'))
                                           <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                        <span class="notes">例) 山田太郎</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        お名前 (フリガナ)
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input type="text" name="kname" size="15" maxlength="20">
                                        @if($errors->has('kname'))
                                           <p class="text-danger">{{ $errors->first('kname') }}</p>
                                        @endif
                                        <span class="notes">例) ヤマダタロウ</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        メールアドレス
                                        <span class="required">必須</span>
                                    </th>
                                    <td>
                                        <input type="text" name="email" size="20" maxlength="255" style="ime-mode:disabled;"> <!-- ime-mode:disabled;=英数字入力モードで固定 -->
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
                                        <input type="text" name="email2" size="20" maxlength="255" style="ime-mode:disabled;">
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
                                        <input type="password" name="password1" size="10" maxlength="16" style="ime-mode:disabled;">
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
                                        <input type="password" name="password2" size="10" maxlength="16" style="ime-mode:disabled;">
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
                                        <input type="radio" name="gender" value="male">
                                        <label for="sexMale">男</label>
                                        <input type="radio" name="gender" value="female">
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
                                        <input type="text" name="birthday1" size="4" maxlength="4" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS">
                                        年
                                        @if($errors->has('birthday1'))
                                           <p class="text-danger">{{ $errors->first('birthday1') }}</p>
                                        @endif
                                        <input type="text" name="birthday2" size="2" maxlength="2" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS">
                                        月
                                        @if($errors->has('birthday2'))
                                           <p class="text-danger">{{ $errors->first('birthday2') }}</p>
                                        @endif
                                        <input type="text" name="birthday3" size="2" maxlength="2" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS">
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
                                        <input type="text" name="phone1" size="5" maxlength="5" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS">
                                        -
                                        @if($errors->has('phone1'))
                                           <p class="text-danger">{{ $errors->first('phone1') }}</p>
                                        @endif
                                        <input type="text" name="phone2" size="4" maxlength="4" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS">
                                        -
                                        @if($errors->has('phone2'))
                                           <p class="text-danger">{{ $errors->first('phone2') }}</p>
                                        @endif
                                        <input type="text" name="phone3" size="4" maxlength="4" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS">
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
                                        <input type="text" name="postal_code1" size="3" maxlength="3" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS" onkeyup="findZipcole('h');">
                                        -
                                        @if($errors->has('postal_code1'))
                                           <p class="text-danger">{{ $errors->first('postal_code1') }}</p>
                                        @endif
                                        <input type="text" name="postal_code2" size="4" maxlength="4" pattern="[0-9]*" style="ime-mode:disabled;" class="inputS" onkeyup="findZipcole('h');">
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
                                            <option value="1">北海道</option>
                                            <option value="2">青森県</option>
                                            <option value="3">岩手県</option>
                                            <option value="4">宮城県</option>
                                            <option value="5">秋田県</option>
                                            <option value="6">山形県</option>
                                            <option value="7">福島県</option>
                                            <option value="8">茨木県</option>
                                            <option value="9">栃木県</option>
                                            <option value="10">群馬県</option>
                                            <option value="11">埼玉県</option>
                                            <option value="12">千葉県</option>
                                            <option value="13">東京都(23区内)</option>
                                            <option value="14">東京都(23区外)</option>
                                            <option value="15">神奈川県</option>
                                            <option value="16">新潟県</option>
                                            <option value="17">富山県</option>
                                            <option value="18">石川県</option>
                                            <option value="19">福井県</option>
                                            <option value="20">山梨県</option>
                                            <option value="21">長野県</option>
                                            <option value="22">岐阜県</option>
                                            <option value="23">静岡県</option>
                                            <option value="24">愛知県</option>
                                            <option value="25">三重県</option>
                                            <option value="26">滋賀県</option>
                                            <option value="27">京都府</option>
                                            <option value="28">大阪府</option>
                                            <option value="29">兵庫県</option>
                                            <option value="30">奈良県</option>
                                            <option value="31">和歌山県</option>
                                            <option value="32">鳥取県</option>
                                            <option value="33">島根県</option>
                                            <option value="34">岡山県</option>
                                            <option value="35">広島県</option>
                                            <option value="36">山口県</option>
                                            <option value="37">徳島県</option>
                                            <option value="38">香川県</option>
                                            <option value="39">愛媛県</option>
                                            <option value="40">高知県</option>
                                            <option value="41">福岡県</option>
                                            <option value="42">佐賀県</option>
                                            <option value="43">長崎県</option>
                                            <option value="44">熊本県</option>
                                            <option value="45">大分県</option>
                                            <option value="46">宮崎県</option>
                                            <option value="47">鹿児島県</option>
                                            <option value="48">沖縄県</option>
                                            <option value="49">離島部</option>
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
                        <button type="button">この内容で会員登録する</button> 
                    </section>
                </div>
            </form>
@endsection
