@extends('admin.admin_layout')

@section('title', '商品登録、画像アップロード')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>商品編集</h2>
            <form method="post" action="{{ action('ImagesController@update') }}" enctype="multipart/form-data">
                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endif
                
                <div class="form-group row">
                    <label class="col-md-2" for="item_name">商品名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="item_name" value="{{ $item_form->item_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="amount">値段</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="amount" value="{{ $item_form->amount}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="explanation">説明</label>
                    <div class="col-md10">
                        <textarea class="form-control" name="explanation" rows="3">{{ $item_form->explanation }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="image_path">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image_path">
                        <div class="form-text text-info">
                            設定中の画像: {{ $item_form->image_path}}
                        </div>
                        <div class="form-check">
                            <label class="formo-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10">
                        <input type="hidden" name="id" value="{{ $item_form->id}}">
                        
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="更新">
                    </div>
                </div>
            </form>
            <div class="row mt-5"> <!-- mt-5=上側のマージンを3rem-->
                <div class="col-md-4 mx-auto">
                    <h2>編集履歴</h2>
                    <ul class="list-group">
                       @if ($item_form->images_histories != NULL)
                          @foreach ($item_form->images_histories as $images_history)
                             <li class="list-group-item">{{ $images_history->edited_at }}</li>
                          @endforeach
                       @endif     
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection