<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerification extends Mailable
{
    
    protected $user;
    
    
    public function __construct($user) //constructor()で引数に$userを設定し、クラス変数にセットする
    {
        $this->user = $user;
    }
    
                  //buildは実行時に呼ばれる関数
    public function build() //補足：こうすることで、build()にて$this->user->email_verify_tokenと参照することができる
                            //（ユーザーごとのtokenを判別できます）
    {
        return $this
            ->subject('[LM] 仮登録が完了しました')
            ->view('auth.email.pre_register')
            ->with(['token' => $this->user->email_verify_token,]); //これでviewと一緒にtokenを渡す事ができている
    }
    
}
