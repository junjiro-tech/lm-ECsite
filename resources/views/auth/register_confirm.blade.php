@extends('layouts.layout')

@section('title', '会員登録確認')

@section('content')
      <form method="post" action="{{ route('register_complete') }}">
          csrf
          
          <label>お名前</label>
          {{ $inputs2['name'] }}
          <input name="name" type="hidden" value="{{ $inputs2['name']}}">
          
          <label>お名前</label>
          {{ $inputs2['kname'] }}
          <input name="kname" type="hidden" value="{{ $inputs2(['kname']}}">
          
          <label>メール</label>
          {{ $inputs2['email'] }}
          <input name="email" type="hidden" value="{{ $inputs2['email']}}">
          
          <label>パスワード</label>
          {{ $inputs2['oldpasswd'] }}
          <input name="password" type="hidden" value="{{ $inputs2['password']}}">
          
          <label>性別</label>
          {{ $inputs2['gender'] }}
          <input name="gender" type="hidden" value="{{ $inputs2['gender']}}">
          
          <label>生年月日</label>
          {{ $inputs2['birthday1'] }}
          <input name="birthday1" type="hidden" value="{{ $inputs2['birthday1']}}">
          {{ $inputs2['birthday2'] }}
          <input name="birthday2" type="hidden" value="{{ $inputs2['birthday2']}}">
          {{ $inputs2['birthday3'] }}
          <input name="birthday3" type="hidden" value="{{ $inputs2['birthday3']}}">
          
          <label>電話番号</label>
          {{ $inputs2['phone_num1'] }}
          <input name="phone_num1" type="hidden" value="{{ $inputs2['phone_num1']}}">
          {{ $inputs2['phone_num2'] }}
          <input name="phone_num2" type="hidden" value="{{ $inputs2['phone_num2']}}">
          {{ $inputs2['phone_num3'] }}
          <input name="phone_num3" type="hidden" value="{{ $inputs2['phone_num3']}}">
          
          <label>郵便番号</label>
          {{ $inputs2['postal_code1'] }}
          <input name="postal_code1" type="hidden" value="{{ $inputs2['postal_code1']}}">
          {{ $inputs2['postal_code2'] }}
          <input name="postal_code2" type="hidden" value="{{ $inputs2['postal_code2']}}">
          
          <label>都道府県</label>
          {{ $inputs2['prefectures_name'] }}
          <input name="prefectures_name" type="hidden" value="{{ $inputs2['prefectures_name']}}">
          
          <label>市区町村</label>
          {{ $inputs2['city'] }}
          <input name="city" type="hidden" value="{{ $inputs2['city']}}">
          
          <label>それ以降の住所</label>
          {{ $inputs2['Subsequent_address'] }}
          <input name="Subsequent_address" type="hidden" value="{{ $inputs2['Subsequent_address']}}">
          
          
          <button type="submit" name="action" value="back">
              入力内容修正
          </button>
          <button type="submit" name="action" value="submit">
              この内容で問い合わせる
          </button>
      </form>
@endsection