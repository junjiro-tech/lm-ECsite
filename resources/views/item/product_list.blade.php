@extends('layouts.layout')

@section('content')

@if(session::has('flash_message'))  <!-- ←でflash_messageが存在した時だけ、セッションの内容を表示するようにしています -->
    <div class="alert alert-success">
       {{ session('flash_message') }}
    </div>
@endif
<div class="container-p">
    <div class="row justify-content-left">
        @foreach($items as $item) <!-- コントローラーで受け取ったitemsから商品情報を1つずつ取り出して表示する事ができる -->
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header">
                    <a href="/item/{{ $item->id }}">{{ $item->name }}</a> <!-- {{ $item->id }}はitemsテーブルのid、つまり商品を識別するIDです。 -->
                </div>
                <div class="card-body">
                    {{ $item->amount }}円
                </div>
                @auth   <!-- @auth〜@endauthで囲った部分は、ユーザーがログインしている時だけ表示されます -->
                    <form method="POST" action="cartitem" class="form-inline m-1">
                        @csrf　　　　<!-- postメソッドは@csrfは必須　-->
                        <select name="quantity" class="form-control col-md-2 mr-1">
                            <opiiton selected>1</opiiton>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-primary col-md-6">カートに入れる</button>
                    </form>
                @endauth
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        {{ $items->appends(['keywords' => Request::get('keyword')])->links() }}
    </div>
</div>
@endsection