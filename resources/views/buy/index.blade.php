@extends('layouts.layout')

@section('title', '会員登録済み購入確認画面')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center" style="margin-bottom: 10px;">
            <div class="col-md-8">
                ご注文内容確認
                <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @foreach($cartitems as $cartitem)
                       <div class="card-header">
                           {{ $cartitem->item_name }}
                       </div>
                       <div class="card-body">
                           <div>
                               {{ $cartitem->amount }}円
                           </div>
                       </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    商品合計
                </div>
                <div class="card-body">
                    <div>
                        <br><br>
                        税抜き価格:¥{{ $subtotal }}円
                    </div>
                    <div>
                        税込み価格:¥{{ $subtotal_tax }}円
                    </div>
                    <div>
                        送料:¥{{ $postage }}円
                    </div>

                    <div>
                    `````````````````````````````````````````````````<br>
                　　    <p>合計金額:¥{{ $total }}円</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                お届け先および登録情報確認
            </div>
            <div cclass="card-body">
                    <form method="post" action="{{ route('register_complete') }}">
                    @csrf
          
                    
          <label>お名前:</label>
          {{ $user['name'] }}
          <input name="name" type="hidden" value="{{ $user['name']}}">
          <br>
          
          <label>お名前(フリガナ):</label>
          {{ $user['kname'] }}
          <input name="kname" type="hidden" value="{{ $user['kname']}}">
          <br>
          
          <label>メールアドレス:</label>
          {{ $user['email'] }}
          <input name="email" type="hidden" value="{{ $user['email']}}">
          <br>
          
          <label>性別:</label>
          {{ $user['gender'] }}
          <input name="gender" type="hidden" value="{{ $user['gender']}}">
          <br>
          
          <label>生年月日:</label>
          {{ $user['birthday1'] }}年
          <input name="birthday1" type="hidden" value="{{ $user['birthday1']}}">
          {{ $user['birthday2'] }}月
          <input name="birthday2" type="hidden" value="{{ $user['birthday2']}}">
          {{ $user['birthday3'] }}日
          <input name="birthday3" type="hidden" value="{{ $user['birthday3']}}">
          <br>
          
          <label>電話番号:</label>
          {{ $user['tel'] }}
          <input name="tel" type="hidden" value="{{ $user['tel']}}">
          <br>
          
          <label>郵便番号:</label>
          {{ $user['postal_code'] }}
          <input name="postal_code" type="hidden" value="{{ $user['postal_code']}}">
          <br>
          
          <label>住所:</label>
          {{ $user['prefectures_name'] }}
          <input name="prefectures_name" type="hidden" value="{{ $user['prefectures_name']}}">
          
          <label></label>
          {{ $user['city'] }}
          <input name="city" type="hidden" value="{{ $user['city']}}">
          
          <label></label>
          {{ $user['subsequent_address'] }}
          <input name="subsequent_address" type="hidden" value="{{ $user['subsequent_address']}}">
          <br>
                   </div>
            
            <div class="card-body">
                <form method="post" action="/buy">
                    @csrf
                    
                    <div class="form-row">
                        <div class="col-md-6">
                            @if(Request::has('confirm'))
                               <button type="submit" class="btn btn-primary" name="post">注文を確定する</button>
                               <button type="submit" class="btn btn-default" name="back">修正する</button>
                            @else
                               <button type="submit" class="btn btn-primary" name="confirm">入力内容を確認する</button>
                            @endif   
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        
    </div>
@endsection