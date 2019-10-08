@extends('layouts.layout')

@section('title', 'お問い合わせ確認')

@section('content')
      <form  class="con-form" method="POST" action="{{ route('contact_complete') }}">
          @csrf
          
          <label>お名前</label>
          {{ $inputs3['name'] }}
          <input name="name" type="hidden" value="{{ $inputs3['name']}}">
          
          <label>メール</label>
          {{ $inputs3['email'] }}
          <input name="email" type="hidden" value="{{ $inputs3['email']}}">
          
          <label>お問い合わせ内容</label>
          {{ $inputs3['body'] }}
          <input name="body" type="hidden" value="{{ $inputs3['body']}}">
          
          <button type="submit" name="action" value="post" class="btn btn-primary">入力内容修正</button>
          <button type="submit" name="action" value="back" class="btn btn-default">この内容で問い合わせる</button>
      </form>
@endsection