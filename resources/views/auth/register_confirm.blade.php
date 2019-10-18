@extends('layouts.layout')

@section('title', '会員登録確認')

@section('content')
<form method="post" action="{{ route('contact_confirm') }}">
    @csrf
<input type="submit" name="action" value="back">
              入力内容修正
</form>
      <form method="post" action="{{ action('Auth\RegisterController@complete') }}">
          @csrf
          
          <label>お名前</label>
          {{ $inputs2['name'] }}
          <input name="name" type="hidden" value="{{ $inputs2['name']}}">
          
          <label>お名前(フリガナ)</label>
          {{ $inputs2['kname'] }}
          <input name="kname" type="hidden" value="{{ $inputs2['kname']}}">
          
          <label>メールアドレス</label>
          {{ $inputs2['email'] }}
          <input name="email" type="hidden" value="{{ $inputs2['email']}}">
          
          <label>パスワード</label>
          {{ $inputs2['password1'] }}
          <input name="password1" type="hidden" value="{{ $inputs2['password1']}}">
          
          <label>性別</label>
          {{ $inputs2['gender'] }}
          <input name="gender" type="hidden" value="{{ $inputs2['gender']}}">
          
          <label>生年月日</label>
          {{ $inputs2['birthday1'] }}年
          <input name="birthday1" type="hidden" value="{{ $inputs2['birthday1']}}">
          {{ $inputs2['birthday2'] }}月
          <input name="birthday2" type="hidden" value="{{ $inputs2['birthday2']}}">
          {{ $inputs2['birthday3'] }}日
          <input name="birthday3" type="hidden" value="{{ $inputs2['birthday3']}}">
          
          <label>電話番号</label>
          {{ $inputs2['phone1'] }}-
          <input name="phone1" type="hidden" value="{{ $inputs2['phone1']}}">
          {{ $inputs2['phone2'] }}-
          <input name="phone2" type="hidden" value="{{ $inputs2['phone2']}}">
          {{ $inputs2['phone3'] }}
          <input name="phone3" type="hidden" value="{{ $inputs2['phone3']}}">
          
          <label>郵便番号</label>
          {{ $inputs2['postal_code1'] }}-
          <input name="postal_code1" type="hidden" value="{{ $inputs2['postal_code1']}}">
          {{ $inputs2['postal_code2'] }}
          <input name="postal_code2" type="hidden" value="{{ $inputs2['postal_code2']}}">
          
          <label>住所</label>
          {{ $inputs2['prefectures_name'] }}
          <input name="prefectures_name" type="hidden" value="{{ $inputs2['prefectures_name']}}">
          
          <label></label>
          {{ $inputs2['city'] }}
          <input name="city" type="hidden" value="{{ $inputs2['city']}}">
          
          <label></label>
          {{ $inputs2['subsequent_address'] }}
          <input name="Subsequent_address" type="hidden" value="{{ $inputs2['subsequent_address']}}">
          
          
          <input type="submit" name="action" value="back">
              入力内容修正
          <input type="submit" name="action" value="submit">
              この内容で問い合わせる
      </form>
@endsection