@extends('layouts.layout')

@section('content')
<h1 class="title">LM</h1>
<div id="form">
               <p class="form-title">ログイン</p>
               <form action="post">
                   <p>メールアドレス</p>
                   <p class="mail">
                       <input type="email" name="mail">
                   </p>
                   <p>パスワード</p>
                   <p class="pass"><input type="password" name="pass" /></p>
                   <p class="check"><input type="checkbox" name="checkbox" />パスワードを保存</p>
                   <p class="submit"><input type="submit" value="Login" /></p>
               </form>
@endsection