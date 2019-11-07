@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-2.8">
            <div class="card">
                <div class="card-picture">
                    <img src="{{ asset('storage/image/' . $item->image_path) }}" alt="">
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
            </div>
        </div>
    </div>
</div>
@endsection