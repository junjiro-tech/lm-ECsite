@extends('admin.admin_layout')

@section('title', '画像一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>画像一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('item_regi') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('item_list') }}" method="get">

                    <div class="form-group row">
                        <label class="col-md-2">商品名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-item col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="15%">商品名</th>
                                <th width="15%">値段</th>
                                <th width="50%">説明</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <th>{{ $item->id }}</th>
                                    <td>{{ Str::limit($item->item_name, 10) }}</td>
                                    <td>{{ Str::limit($item->amount, 5) }}円</td>
                                    <td>{{ Str::limit($item->explanation, 200) }}</td>
                                    <td><a href="{{ action('ImagesController@edit', ['id' => $item->id ]) }}">編集</a></td>
                                    <td><a href="{{ action('ImagesController@delete', ['id' => $item->id ]) }}">削除</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
        {{ $items->links() }}
        </div>
    </div>
@endsection 