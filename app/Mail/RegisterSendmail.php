<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterSendmail extends Mailable
{
    use Queueable, SerializesModels;
    
    private $name;
    private $kname;
    private $email;
    private $gender;
    private $birthday1;
    private $birthday2;
    private $birthday3;
    private $tel;
    private $postal_code;
    private $prefectures_name;
    private $city;
    private $subsequent_address;
    
    public function __construct($inputs2)
    {
        $this->name = $inputs2['name'];
        $this->kname = $inputs2['kname'];
        $this->email = $inputs2['email'];
        $this->gender = $inputs2['gender'];
        $this->birthday1 = $inputs2['birthday1'];
        $this->birthday2 = $inputs2['birthday2'];
        $this->birthday3 = $inputs2['birthday3'];
        $this->tel = $inputs2['tel'];
        $this->postal_code = $inputs2['postal_code'];
        $this->prefectures_name = $inputs2['prefectures_name'];
        $this->city = $inputs2['city'];
        $this->subsequent_address = $inputs2['subsequent_address'];
    }
    
    public function build()
    {
        return $this
        ->from('junjiro.tech@gmail.com')
        ->subject('自動送信メール')    //subject=件名
        ->view('auth/register_mail')
        ->with([
            'name' => $this->name,
            'kname' => $this->kname,
            'email' => $this->email,
            'gender' => $this->gender,
            'birthday1' => $this->birthday1,
            'birthday2' => $this->birthday2,
            'birthday3' => $this->birthday3,
            'tel' => $this->tel,
            'postal_code' => $this->postal_code,
            'prefectures_name' => $this->prefectures_name,
            'city' => $this->city,
            'subsequent_address' => $this->subsequent_address,
            ]);
    }
}