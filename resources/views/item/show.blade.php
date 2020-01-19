@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-2.8">
            <div class="card">
                
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <!-- スライドさせる画像の設定 -->
                    <div class="carousel-inner">
                        
                    </div><!-- /.carousel-inner -->
                        <div class="card-picture">
                            <img src="{{ asset('storage/image/' . $item->image_path) }}" alt="">
                        </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">前へ</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">次へ</span>
                    </a>
                </div>
                
                <div class="card-header">
                    <a herf="/items/{{ $item->id }}">{{ $item->name }}</a>
                </div>
                <div class="card-body">
                    {{ $item->amount }}円
                </div>
                <div class="card-body">
                    {{ $item->explanation }}
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
    </div>
</div>
@endsection