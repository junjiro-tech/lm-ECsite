{{-- layouts/layout.blade.phpを読み込む --}}
@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <!-- インジケータの設定 -->
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
            </ol>
            
            <!-- スライドさせる画像の設定 -->
            <div class="carousel-inner">
                <div class="carousel-item active" src="image/top1.png">
                  <img id="mypic" src="image/top1.png"  alt="トップページ写真" >
                </div><!-- /.carousel-item -->
                <div class="carousel-item">
                  <img id="mypic" src="image/top2.png"  alt="トップページ写真" >
                </div><!-- /.carousel-item -->
                <div class="carousel-item">
                  <img id="mypic" src="image/top3.png"  alt="トップページ写真" >
                </div><!-- /.carousel-item -->
                <div class="carousel-item">
                  <img id="mypic" src="image/top4.png"  alt="トップページ写真" >
                </div><!-- /.carousel-item -->
                <div class="carousel-item">
                  <img id="mypic" src="image/top5.png"  alt="トップページ写真" >
                </div><!-- /.carousel-item -->
                <div class="carousel-item">
                  <img id="mypic" src="image/top6.png"  alt="トップページ写真" >
                </div><!-- /.carousel-item -->
                <div class="carousel-item">
                  <img id="mypic" src="image/top7.png"  alt="トップページ写真" >
                </div><!-- /.carousel-item -->
                <div class="carousel-item">
                  <img id="mypic" src="image/top8.png"  alt="トップページ写真" >
                </div><!-- /.carousel-item -->
            </div><!-- /.carousel-inner -->
            
            <!-- スライドコントロールの設定 -->
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">前へ</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">次へ</span>
            </a>
        </div><!-- /.carousel -->
            

    </div>
</div>

<div class="container">
  <div class="row align-items-start">
    <div class="col mb-1">
        <img src="image/top_mini.png" alt="item_1">
    </div>
    <div>
        <h2>会社概要</h2><br>
        <p>すべての商品が職人によるハンドメイドで１つ１つ丁寧に仕上げられています。</p>
        <p>皮のなめし</p>
        <p>ミシン縫い</p>
        <p>コーティング</p>
    </div>
    <div class="col">
        <img src="image/top_mini.png" alt="item_2">
    </div>
</div>
@endsection