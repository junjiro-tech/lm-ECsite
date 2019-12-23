{{-- layouts/layout.blade.phpを読み込む --}}
@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <img id="mypic" src="image/top.png"  alt="トップページ写真" >
    </div>
</div>

<div class="container">
  <div class="row align-items-start">
    <div class="col mb-1">
        <img src="image/top_mini.png" alt="item_1">
    </div>
    <div class="col">
        <img src="image/top_mini.png" alt="item_2">
    </div>
</div>
@endsection