<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;  //Notifiable 訳)通知可能//

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * DB への登録を許可するためにはホワイトリスト $fillable に項目を追加する必要がある*/
     
    protected $fillable = [
        'name', 
        'kname',
        'email',
        'email2',
        'password1',
        'password2',
        'gender',
        'birthday1',
        'birthday2',
        'birthday3',
        'phone1',
        'phone2',
        'phone3',
        'postal_code1',
        'postal_code2',
        'area',
        'prefectures_name',
        'city',
        'subsequent_address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     * $sastsで選択したカラムの型を変換する
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
