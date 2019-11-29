@extends('layouts.layout')

@section('content')
<!-- フラッシュメッセージを表示 -->
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    @foreach ($cartitems as $cartitem)
                        <div class="card-picture">
                            <a href="/cartitems/{{ $cartitem->id }}"><img src="{{ asset('storage/image/' . $cartitem->image_path) }}" alt=""></a>
                            <input type="hidden" name="id" value="{{ $cartitem->item_name }}">
                        </div>
                        <div class="card-header">
                            <a href="/item/{{ $cartitem->id }}">{{ $cartitem->item_name }}</a>
                        </div>
                        <div class="card-body">
                            <div>
                                ¥{{ $cartitem->amount }}円
                            </div>
                            <div class="form-inline">
                                <!-- 数量を更新するフォーム -->
                                <form method="post" action="{{ action('CartItemController@update') }}"><!-- ｶｰﾄﾃﾞｰﾀのIDをﾊﾟｽに付与している、こうすることでｺﾝﾄﾛｰﾗｰ側でidに対応したｶｰﾄ情報のﾓﾃﾞﾙが受け取れるようになる-->
                                    @method('PUT')<!-- 数量の更新はHTTPのPUTメソッドで送信するので、べき等でリソースに変更がない場合はPUT,delete,getなど使える-->
                                    @csrf        <!--↑formﾀｸﾞではGETかPOSTしか指定できないためPUTにしている -->
                                    <input type="text" class="form-control" name="quantity" value="{{ $cartitem->quantity }}">
                                    個           <!-- 数量を入力するフォームは、既存のデータの数量をあらかじめ表示しておくようにvalue属性に{{ $cartitem->quantity }}指定-->
                                    <input type="hidden" name="id" value="{{ $cartitem->id }}">
                                    <!--<input type="submit" value="更新">-->
                                    <button type="submit" class="btn btn-primary">更新</button>
                                </form>
                                <!-- 削除フォーム -->
                                <form method="post" action="{{ action('CartItemController@destroy') }}">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $cartitem->id }}">
                                    <!--<input type="submit" value="カートから削除する">-->
                                    <button type="submit" class="btn btn-primary ml-1">カートから削除する</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="col-md-3">
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
                        `````````````````````````````````````````````````<br>
                    　　    <p>合計金額:¥{{ $total }}円</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        会員登録済みでログイン
                    </div>
                        <div>
                            <a class="btn btn-primary" href="/login" role="button" width="auto">
                                ログインしてレジに進む
                            </a>
                        </div>
                        
                    <div class="card-header">
                        ログイン済みの方
                    </div>
                        <div>
                            <a class="btn btn-primary" href="/buy/index" role="button" width="auto">
                                レジに進む
                            </a>
                        </div>
                        
                    <div class="card-header">
                        非会員購入される方
                    </div>
                        <div>
                            <a class="btn btn-primary" href="/buy/guest/index" role="button">
                                レジに進む
                            </a>
                        </div>
                        
                </div>
            </div>
            

        </div>
    </div>
@endsection    