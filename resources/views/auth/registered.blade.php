@extends('layouts.layout')

@section('title', '会員登録完了')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">本会員登録完了</div>

                    @isset($message) <!--isset関数とは、変数がセットされていること、そしてnullではないことを検査する-->
                        <div class="card-body">
                            {{$message}}
                        </div>
                    @endisset
                        <a href="{{url('/')}}" class="sg-btn">トップページへ戻る</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection