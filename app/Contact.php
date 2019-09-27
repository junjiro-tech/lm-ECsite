<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [           /*fillable=充填可能*/
        'name',
        'email',
        'body'
        ];
}
