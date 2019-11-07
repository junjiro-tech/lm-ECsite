{{-- layouts/layout.blade.phpを読み込む --}}
@extends('layouts.layout')

@section('content')
<div id="wrapper">
  <img id="mypic" src="image/top.png"  alt="トップページ写真" >
      
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-3.5 mb-2 mr-4 mb-5">
            <div class="card">
        <div class="flex-item">
          <img src="image/link.png" alt="item_1">
        </div>
        <div class="flex-item">
          <img src="image/link.png" alt="item_2">
        </div>
        <div class="flex-item">
          <img src="image/link.png" alt="item_3">
        </div>
        <div class="flex-item">
          <img src="image/link.png" alt="item_4">
        </div>
        <div class="flex-item">
          <img src="image/link.png" alt="item_5">
        </div>
        <div class="flex-item">
          <img src="image/link.png" alt="item_6">
        </div>
        <div class="flex-item">
          <img src="image/link.png" alt="item_7">
            </div>
        </div>
      </div>
    </div>
</div>
@endsection