<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
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
        'email_verified_at',
        'password',
        'gender',
        'birthday1',
        'birthday2',
        'birthday3',
        'tel',
        'postal_code',
        'prefectures_name',
        'city',
        'subsequent_address',
        'email_verify_token'
        
    ];
    
    protected $attributes = [
        // 定数を設定
        'name' => '',
        'kname' => '',
        'email' => '',
        'password' => '',
        'gender' => '',
        'birthday1' => '',
        'birthday2' => '',
        'birthday3' => '',
        'tel' => '',
        'postal_code' => '',
        'prefectures_name' => '',
        'city' => '',
        'subsequent_address' => '',
        'email_verify_token' => '',
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
     * $castsで選択したカラムの型を変換する
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    
    
    
}
