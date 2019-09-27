@extends('layouts.layout')

@section('content')
     <form class="form3" name="fome3" method="post">
         @csrf
         
         <div id="contact" class="wrap3">
        　　<section class="main">
        　　      <div class="section2">
                  <h1 class="pageTitle">お問い合わせ</h1>
                  <p>以下のフォームの項目を入力し、よろしければ「この内容で問い合わせる」ボタンをクリックしてください</p>
                     　
                    <table class="formTable">
                        <tbody>
                             <tr>
                                 <th>
                                     お名前
                                     <span class="required">必須</span>
                                 </th>
                                 <td>
                                     <p id="name-error" class="errorMessage"></p>
                                     <input type="text" name="name" size="25" maxlength="20" value="{{ old('name') }}">
                                     @if(@errors->has('name'))
                                           <p class="text-danger">{{ $errors->first('name') }}</p>
                                     @endif
                                     <span class="notes">例) 山田太郎</span>
                                 </td>
                             </tr>
                             <tr>
                                 <th>
                                     メールアドレス
                                     <span class="required">必須</span>
                                 </th>
                                 <td>               <!-- value 属性には、確認画面から戻ってきた場合に入力した値がクリアされないよう old() 関数を使って直前の入力値をセットするようにしている -->
                                     <p id="email-error" class="errorMessage"></p> 
                                     <input type="text" name="email" size="50" maxlength="50" value="{{ old('email') }}">
                                     @if($errors->has('email'))  <!-- バリデーションでエラーが発生した場合 $errors->has() の部分でエラーメッセージを表示するようにしてい -->
                                            <p class="text-danger">{{ $errors->first('email')}}</p>
                                     @endif
                                     <span class="notes">例) info@example.com ※半角英数字</span>
                                 </td>
                             </tr>
                             <tr>
                                 <th class="contact-us">
                                     お問い合わせ内容
                                     <span class="required">必須</span>
                                 </th>
                                 <td>
                                     <p id="content-error" class="errorMessage"></p>
                                     <textarea name="content" wrap="off" rows="15" cols="60" maxlength="2000">
                                         {{ old('content') }}
                                     </textarea>
                                     @if($errors->has('message'))
                                            <p class="text-danger">{{ $errors->first('message')}}</p>
                                     @endif
                                     <span class="notes">※全角2000文字まで</span>
                                 </td>
                             </tr>
                        </tbody>
                    </table>
                </div>
            </section>
         </div>
     </form>
@endsection