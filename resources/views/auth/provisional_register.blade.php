@extends('layouts.layout')

@section('title', '登録確認')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>登録確認</h4>
                     <p>下記内容でよろしければ「この内容で登録する」ボタンを押してください<br>修正が必要な場合は、「入力内容修正」ボタンを押してください</p>
                </div>
                
                <div cclass="card-body">
                    <form method="post" action="{{ route('register_complete') }}">
                    @csrf
          
                    
          <label>お名前:</label>
          {{ $register_data['name'] }}
          <input name="name" type="hidden" value="{{ $register_data['name']}}">
          <br>
          
          <label>お名前(フリガナ):</label>
          {{ $register_data['kname'] }}
          <input name="kname" type="hidden" value="{{ $register_data['kname']}}">
          <br>
          
          <label>メールアドレス:</label>
          {{ $register_data['email'] }}
          <input name="email" type="hidden" value="{{ $register_data['email']}}">
          <br>
          
          <label>パスワード:</label>
           {{$register_data['password_mask'] }}
          <input name="password" type="hidden" value="{{ $register_data['password']}}">
          <br>
          
          <label>性別:</label>
          {{ $register_data['gender'] }}
          <input name="gender" type="hidden" value="{{ $register_data['gender']}}">
          <br>
          
          <label>生年月日:</label>
          {{ $register_data['birthday1'] }}年
          <input name="birthday1" type="hidden" value="{{ $register_data['birthday1']}}">
          {{ $register_data['birthday2'] }}月
          <input name="birthday2" type="hidden" value="{{ $register_data['birthday2']}}">
          {{ $register_data['birthday3'] }}日
          <input name="birthday3" type="hidden" value="{{ $register_data['birthday3']}}">
          <br>
          
          <label>電話番号:</label>
          {{ $register_data['tel'] }}
          <input name="tel" type="hidden" value="{{ $register_data['tel']}}">
          <br>
          
          <label>郵便番号:</label>
          {{ $register_data['postal_code'] }}
          <input name="postal_code" type="hidden" value="{{ $register_data['postal_code']}}">
          <br>
          
          <label>住所:</label>
          {{ $register_data['prefectures_name'] }}
          <input name="prefectures_name" type="hidden" value="{{ $register_data['prefectures_name']}}">
          
          <label></label>
          {{ $register_data['city'] }}
          <input name="city" type="hidden" value="{{ $register_data['city']}}">
          
          <label></label>
          {{ $register_data['subsequent_address'] }}
          <input name="subsequent_address" type="hidden" value="{{ $register_data['subsequent_address']}}">
          <br>
                   </div>
          
          <button type="submit" name="action" value="back">入力内容修正</button>
          <button type="submit" name="action" value="post">この内容で登録する</button>
      </form>
      
            </div>
        </div>
    </div>
</div>
@endsection