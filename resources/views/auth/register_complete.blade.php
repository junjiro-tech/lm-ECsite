@extends('layouts.layout')

@section('title', 'ハッシュ化メール認証送信')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">仮登録完了</div>

                <div class="card-body">
                    <p>この度は、ご登録いただき誠にありがとうございます。</p>
                    <p>ご本人様確認のため、ご登録いただいたメールアドレスに、本登録のご案内のメールが届きます。</p>
                    <p>そちらに記載されているURLにアクセスしましたら、アカウントの本登録が完了します。<br></p>
                </div>
                
                <div class="card-footer">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form method="get" action="{{ route('top_page')}}">
                                <button type="submit" name="action" value="ホーム画面に戻る">ホーム画面に戻る</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection