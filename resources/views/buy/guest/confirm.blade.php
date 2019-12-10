@extends('layouts.layout')

@section('title', 'ゲスト購入確認画面')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>購入確認および発送先確認</h4>
                     <p>下記内容でよろしければ「この内容で登録する」ボタンを押してください<br>修正が必要な場合は、「入力内容修正」ボタンを押してください</p>
                </div>
                
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
                
                <div cclass="card-body">
                    <form method="post" action="{{ route('guest_complete') }}">
                    @csrf
                    
          <label>お名前:</label>
          {{ $guestData['name'] }}
          <input name="name" type="hidden" value="{{ $guestData['name']}}">
          <br>
          
          <label>メールアドレス:</label>
          {{ $guestData['email'] }}
          <input name="email" type="hidden" value="{{ $guestData['email']}}">
          <br>

          <label>電話番号:</label>
          {{ $guestData['tel'] }}
          <input name="tel" type="hidden" value="{{ $guestData['tel']}}">
          <br>
          
          <label>郵便番号:</label>
          {{ $guestData['postal_code'] }}
          <input name="postal_code" type="hidden" value="{{ $guestData['postal_code']}}">
          <br>
          
          <label>住所:</label>
          {{ $guestData['prefectures_name'] }}
          <input name="prefectures_name" type="hidden" value="{{ $guestData['prefectures_name']}}">
          
          <label></label>
          {{ $guestData['city'] }}
          <input name="city" type="hidden" value="{{ $guestData['city']}}">
          
          <label></label>
          {{ $guestData['subsequent_address'] }}
          <input name="subsequent_address" type="hidden" value="{{ $guestData['subsequent_address']}}">
          <br>
                   </div>
          
          <button type="submit" name="action" value="back">入力内容修正</button>
          <button type="submit" name="action" value="post">この内容で購入する</button>
      </form>
      
            </div>
        </div>
    </div>
</div>
@endsection