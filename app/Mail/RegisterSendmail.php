<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterSendmail extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $user;
    
    
    public function __construct($user) //他のページでRegisterSendmailクラスを使った新しいインスタンスを作成する際に最初に実行される関数が__construct()
    {                                
        $this->user = $user;//その中身が
    }
    //こうすることで、build()にて$this->user->email_verify_tokenと参照することができます。（ユーザーごとのtokenを判別できます）
    
    
    public function build()
    {
        return $this //このクラスに
        ->from('junjiro.tech@gmail.com')
        ->subject('LM仮登録が完了しました。')    //subject=件名 メールの件名は->subject(件名)
        ->view('auth.email.pre_register')        //どのviewを使うか view/auth/email/pre_registerのviewを使う
        ->with(['token' => $this->user->email_verify_token,]); //連想配列keyは'token' valueはemail_verify_token
    }
}