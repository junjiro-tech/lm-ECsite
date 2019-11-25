@extends('layouts.layout')

@section('content')
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center" style="margin-bottom: 10px;">
            <div class="col-md-8">
                ご注文内容確認
                <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @foreach($cartitems as $cartitem)
                       <div class="card-header">
                           {{ $cartitem->name }}
                       </div>
                       <div class="card-body">
                           <div>
                               {{ $cartitem->amount }}円
                           </div>
                       </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        
                <div class="card">
                    <div class="card-header">
                        お届け先入力
                    </div>
                    <div class="card-body">
                        <form method="post" action="/buy">
                            @csrf
                            
                            <div class="form-row">
                                <div class="col-md-6">
                                    @if(Request::has('confirm'))
                                       <button type="submit" class="btn btn-primary" name="post">注文を確定する</button>
                                       <button type="submit" class="btn btn-default" name="back">修正する</button>
                                    @else
                                       <button type="submit" class="btn btn-primary" name="confirm">入力内容を確認する</button>
                                    @endif   
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection