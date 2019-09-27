@extends('layouts.loged_layout')

@section('content')
<!-- sidber開始 -->
      
      <!-- wrap開始 -->
      <div id="wrap">
          <img src="image/top_page.png"  alt="トップページ写真" >
      </div>
      <!-- container 開始　-->
      <h2>商品一覧</h2>
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
        <div class="flex-item">
          <img src="image/36.png" alt="item_8">
          <p class="item-name">ワンピース・コラボ</p>
          <p class="price">3,000円</p>
        </div>
        <div class="flex-item">
          <img src="image/36.png" alt="item_9">
          <p class="item-name">ワンピース・コラボ</p>
          <p class="price">3,000円</p>
        </div>
        <div class="flex-item">
          <img src="image/36.png" alt="item_10">
          <p class="item-name">ワンピース・コラボ</p>
          <p class="price">3,000円</p>
        </div>
      </div>
      
      <!-- 前のページ、次のページlink -->
    　　　　　<nav class="cp_navi">
	<div class="cp_pagination">
		<a class="cp_pagenum prev" href="#">prev</a>
		<span aria-current="page" class="cp_pagenum current">1</span>
		<a class="cp_pagenum" href="#">2</a>
		<a class="cp_pagenum" href="#">3</a>
		<a class="cp_pagenum" href="#">4</a>
		<a class="cp_pagenum" href="#">5</a>
		<a class="cp_pagenum" href="#">6</a>
		<a class="cp_pagenum" href="#">7</a>
		<a class="cp_pagenum" href="#">8</a>
		<a class="cp_pagenum" href="#">9</a>
		<a class="cp_pagenum" href="#">10</a>
		<a class="cp_pagenum next" href="#">next</a>
	</div>
</nav>
      
      <h2>instagram</h2>
      <div class="flex-container">
         <div class="flex-item">
           <img src="image/36.png" alt="insta-pic">
           <p class="insta-pic">...............</p>
         </div>
         <div class="flex-item">
           <img src="image/36.png" alt="insta-pic">
           <p class="insta-pic">...............</p>
         </div>
         <div class="flex-item">
           <img src="image/36.png" alt="insta-pic">
           <p class="insta-pic">...............</p>
         </div>
         <div class="flex-item">
           <img src="image/36.png" alt="insta-pic">
           <p class="insta-pic">...............</p>
         </div>
         <div class="flex-item">
           <img src="image/36.png" alt="insta-pic">
           <p class="insta-pic">...............</p>
         </div>
         <div class="flex-item">
           <img src="image/36.png" alt="insta-pic">
           <p class="insta-pic">...............</p>
         </div>
         <div class="flex-item">
           <img src="image/36.png" alt="insta-pic">
           <p class="insta-pic">...............</p>
         </div>
         <div class="flex-item">
           <img src="image/36.png" alt="insta-pic">
           <p class="insta-pic">...............</p>
         </div>
         <div class="flex-item">
           <img src="image/36.png" alt="insta-pic">
           <p class="insta-pic">...............</p>
         </div>
         <div class="flex-item">
           <img src="image/36.png" alt="insta-pic">
           <p class="insta-pic">...............</p>
         </div>
      </div>
@endsection