{{-- layouts/layout.blade.phpを読み込む --}}
@extends('layouts.layout')

@section('content')
    <div id="wrapper">
      <img id="mypic" src="image/top.png"  alt="トップページ写真" >
      
      <div class="flex-container">
        <div class="flex-item">
          <img src="image/36.png" alt="item_1">
          <p class="item-name">Coffee & British</p>
          <p class="price">2,700円</p>
        </div>
        <div class="flex-item">
          <img src="image/36.png" alt="item_2">
          <p class="item-name">Mail</p>
          <p class="price">1,800円</p>
        </div>
        <div class="flex-item">
          <img src="image/36.png" alt="item_3">
          <p class="item-name">Tiger</p>
          <p class="price">2,500円</p>
        </div>
        <div class="flex-item">
          <img src="image/36.png" alt="item_4">
          <p class="item-name">Dog</p>
          <p class="price">2,000円</p>
        </div>
        <div class="flex-item">
          <img src="image/36.png" alt="item_5">
          <p class="item-name">ワンピース・コラボ</p>
          <p class="price">3,000円</p>
        </div>
        <div class="flex-item">
          <img src="image/36.png" alt="item_6">
          <p class="item-name">girl & bag</p>
          <p class="price">3,000円</p>
        </div>
        <div class="flex-item">
          <img src="image/36.png" alt="item_7">
          <p class="item-name">ワンピース・コラボ</p>
          <p class="price">3,000円</p>
        </div>
    </div>
@endsection