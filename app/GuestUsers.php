<?php

namespace App;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

class GuestUsers extends Model
{
    protected $fillable = [
        'name', 
        'email',
        'email_verified_at',
        'tel',
        'postal_code',
        'prefectures_name',
        'city',
        'subsequent_address',
        'email_verify_token'
    ];
    
    
    public static $rules = array(
        'name' => 'required',
        'email' => 'required',
        'email_verified_at' => 'required',
        'tel' => 'required',
        'postal_code' => 'required',
        'prefectures_name' => 'required',
        'city' => 'required',
        'subsequent_address' => 'required',
        'email_verify_token' => 'required',
    );
}