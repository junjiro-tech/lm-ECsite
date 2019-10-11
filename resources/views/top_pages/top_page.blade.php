{{-- layouts/layout.blade.phpを読み込む --}}
@extends('layouts.layout')

@section('content')
    <div id="wrapper">
      <img id="mypic" src="image/top.png"  alt="トップページ写真" >
      
      <div class="flex-container">
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
@endsection