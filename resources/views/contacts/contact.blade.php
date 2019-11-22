@extends('layouts.layout')

@section('title', 'お問い合わせ')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header"><h4>お問い合わせ</h4><p>以下のフォームの項目を入力し、よろしければ「確認画面に進む」ボタンをクリックしてください</p></div>
     
                <div class="card-body">
                    <form class="form" method="post" action="{{ route('contact_confirm') }}">
                    @csrf
                    
                    <div class="form-group row">
                            <label for="name" class="col-md-2">お名前 <span class="required">必須</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" size="20" maxlength="20" placeholder="例) 山田　太郎" value="{{ old('name') }}" equired autocomplete="name" autofocus>
                                        @if($errors->has('name'))
                                           <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                </div>
                        </div>
                    <div class="form-group row">
                            <label for="email" class="col-md-2">メールアドレス <span class="required">必須</span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" size="20" maxlength="20" placeholder="例) info@example.com ※半角英数字" value="{{ old('email') }}"  required autocomplete="email">
                                        @if($errors->has('email'))
                                           <p class="text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                </div>
                    </div>
                    <div class="form-group row">
                             <label class="col-md-2">お問い合わせ内容</label>
                                 <div class="col-md-10">
                                     <textarea class="form-control" name="body" maxlength="1000" rows="15" placeholder="※全角1000文字まで" qreuired> {{ old('body') }}</textarea>
                                     @if($errors->has('body'))
                                    <p class="text-danger">{{ $errors->first('body')}}</p>
                                     @endif
                                 </div>
                    </div>
                    <div class="card-footer">
                           <button type="submit" class="btn btn-primary col-md-3">確認画面に進む</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection