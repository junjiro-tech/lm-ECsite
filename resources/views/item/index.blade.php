@extends('layouts.layout')

@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        @foreach($items as $item) <!-- コントローラーで受け取ったitemsから商品情報を1つずつ取り出して表示する事ができる -->
        <div class="col-md-3.5 mb-2 mr-4 mb-5">
            <div class="card">
                <div class="card-picture">
                    <a href="/items/{{ $item->id }}"><img src="{{ asset('storage/image/' . $item->image_path) }}" alt=""></a>
                </div>              
                <div class="card-header">
                    {{ $item->item_name }} 
                </div>
                <div class="card-body">
                    ¥{{ $item->amount }}円
                </div>
                    <form method="post" action="/cartitem/add" class="form-inline m-1">
                        @csrf     <!-- postメソッドは@csrf必須　-->
                        <select name="quantity" class="form-control col-md-4 mr-1">
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <button type="submit" class="btn btn-primary col-md-7">カートに入れる</button>
                    </form>
                
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        {{ $items->appends(['keywords' => Request::get('keyword')])->links() }}
    </div>
</div>
@endsection