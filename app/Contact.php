<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{             /*fillable=充填可能　 DB への登録を許可するためにはホワイトリスト $fillable に項目を追加する必要がある*/
    protected $fillable = [
        'name',
        'email', 
        'body'
        ];
        
        /*validationのルール*/
        public static $rules = [
        'name' => 'required',
        'email' => 'require',
        'body' => 'required',
        ];
}
