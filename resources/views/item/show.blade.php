@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <a herf="/item/{{ $item->id }}">{{ $item->name}}</a>
                </div>
                <div class="card-body">
                    {{ $item->amount }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection