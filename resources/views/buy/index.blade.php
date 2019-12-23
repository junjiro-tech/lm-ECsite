@extends('layouts.layout')

@section('title', '会員登録済み購入確認画面')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>購入確認および発送先確認</h4>
                     <p>下記内容でよろしければ「この内容で登録する」ボタンを押してください<br>修正が必要な場合は、「入力内容修正」ボタンを押してください</p>
                </div>
            </div>
        </div>
    </div>
                
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                ご注文内容確認
                </div>
                
                @foreach($cartitems as $cartitem)
                    <div class="card-body">
                        <div class="card-picture">
                            <a href="/cartitems/{{ $cartitem->item_id }}"><img src="{{ asset('/image/resize_image/' . $cartitem->image_path) }}" alt=""></a>
                            <input type="hidden" name="id" value="{{ $cartitem->item_name }}">
                        </div>
                        <div class="container">
                              <div class="row">
                                    <div class="col-">
                                         {{ $cartitem->item_name }}
                                    </div>
                                    &nbsp;
                                    <div class="col-">
                                         {{ $cartitem->amount }}円
                                    </div>
                                    &nbsp;&nbsp;
                                    <div class="col-">
                                         {{ $cartitem->quantity}}個
                                    </div>
                              </div>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
                 
    <div class="row justify-content-center">
        <div class="col-md-8">
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
    </div>
                
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    お届け先
                </div>
                    <div cclass="card-body">
                        <form method="post" action="{{ route('guest_complete') }}">
                        @csrf
                        
                            <label>お名前:</label>
                            {{ $user['name'] }}
                            <input name="name" type="hidden" value="{{ $user['name']}}">
                            <br>
                          
                            <label>メールアドレス:</label>
                            {{ $user['email'] }}
                            <input name="email" type="hidden" value="{{ $user['email']}}">
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
                          
                          <button type="submit" name="action" value="back">入力内容修正</button>
                          <button type="submit" name="action" value="post">この内容で購入する</button>
                      </form>
                    </div>
            </div>
        </div>
    </div>
      
</div>
@endsection
        
        