@extends('admin.admin_layout')

@section('title', '商品登録、画像アップロード')

@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
<div clas="container">
    <div class="row">
        <div class="col-md-8 mx-auto mt-5">
            <h2>商品登録</h2>
                <form method="post" action="{{ route('item_regi') }}" enctype="multipart/form-data"> <!--ファイルをアップロードする時はmultipart/form-data使う-->
                
                       @if (count($errors) > 0)
                           <ul>
                               @foreach($errors->all() as $e)
                                   <li>{{ $e }}</li>
                               @endforeach
                           </ul>
                       @endif
                           <div class="form-group row mt-5">
                               <label class="col-md-2">画像</label>
                                   <div class="col-md-10">
                                       <input class="form-control-file" type="file" name="image_path">
                                   </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-md-2">商品名</label>
                                   <div class="col-md-10">
                                       <input type="text" class="form-control" name="item_name" value="{{ old('item_name') }}">
                                   </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-md-2">値段</label>
                                   <div class="col-md-10">
                                       <input id="text" type="form-control" name="amount" value="{{ old('amount') }}">
                                   </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-md-2">在庫</label>
                                   <div class="col-md-10">
                                       <input id="text" type="form-control" name="inventory_control" value="{{ old('inventory_control') }}">
                                   </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-md-2">説明</label>
                                   <div class="col-md-10">
                                       <textarea class="form-control" name="explanation" rows="3">{{ old('explanation') }}</textarea>
                                   </div>
                           </div>
                           
                           {{ csrf_field() }}
                     <input type="submit" class="btn btn-primary mt-3" value="商品登録">
                </form>
        </div>
    </div>
</div>
@endsection