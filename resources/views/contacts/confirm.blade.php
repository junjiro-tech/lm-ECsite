@extends('layouts.layout')

@section('title', 'お問い合わせ確認')

@section('content')
<div class="container mt-5 pt-5">
     <div class="row justify-content-center">
          <div class="col-md-8">
               <div class="card">
                    <div class="card-header"><h4>お問い合わせ内容確認</h4>
                         <p>以下の内容でよろしければ、この内容で問い合わせるボタンを押してください<br>
                            入力内容に誤りがありましたら、入力内容修正ボタンを押してください</p></div>

                    <div class="card-body">
                         <form  class="con-form" method="POST" action="{{ route('contact_complete') }}">
                         @csrf
          
                         <div class="form-group-row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">お名前</label>
                                  <div class="col-md-6">
                                       {{ $contact_data['name'] }}
                                       <input name="name" type="hidden" value="{{ $contact_data['name']}}">
                                  </div>
                         </div>
          <label>お名前</label>
           {{ $contact_data['name'] }} 
          <input name="name" type="hidden" value="{{ $contact_data['name']}}">
          
          <label>メール</label>
           {{ $contact_data['email'] }}
          <input name="email" type="hidden" value="{{ $contact_data['email']}}">
          
          <label>お問い合わせ内容</label>
           {{ $contact_data['body'] }}
          <input name="body" type="hidden" value="{{ $contact_data['body']}}">
                     </div>
          
          <button type="submit" name="action" value="back" class="btn btn-primary">入力内容修正</button>
          <button type="submit" name="action" value="post" class="btn btn-default">この内容で問い合わせる</button>
      </form>
              </div>
          </div>
     </div>
</div>
@endsection