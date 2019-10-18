@extends('layouts.layout')

@section('content')
<!-- フラッシュメッセージを表示 -->
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($cartitems as $cartitem)
                        <div class="card-header">
                            <a href="/item/{{ $cartitem->id }}">{{ $cartitem->name }}</a>
                        </div>
                        <div class="card-body">
                            <div>
                                {{ $cartitem->amount }}円
                            </div>
                            <div class="form-inline">
                                <!-- 数量を更新するフォーム -->
                                <form method="post" action="/cartitem/{{ $cartitem->id }}"><!-- ｶｰﾄﾃﾞｰﾀのIDをﾊﾟｽに付与している、こうすることでｺﾝﾄﾛｰﾗｰ側でidに対応したｶｰﾄ情報のﾓﾃﾞﾙが受け取れるようになる-->
                                    @method('PUT')<!-- 数量の更新はHTTPのPUTメソッドで送信するので、べき等でリソースに変更がない場合はPUT,delete,getなど使える-->
                                    @csrf        <!--↑formﾀｸﾞではGETかPOSTしか指定できないためPUTにしている -->
                                    <input type="text" class="form-control" name="quantity" value="{{ $cartitem->quantity }}">
                                    個           <!-- 数量を入力するフォームは、既存のデータの数量をあらかじめ表示しておくようにvalue属性に{{ $cartitem->quantity }}指定-->
                                    <button type="submit" class="btn btn-primary">更新</button>
                                </form>
                                <!-- 削除フォーム -->
                                <form method="post" action="/cartitem/{{ $cartitem->id }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-primary ml-1">カートから削除する</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        小計
                    </div>
                    <div class="card-body">
                        <div>
                        {{ $subtotal }}
                        </div>
                        <div>
                            <a class="btn btn-primary" href="/buy" role="button">
                                レジに進む
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection    