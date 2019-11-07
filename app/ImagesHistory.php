<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesHistory extends Model
{
    protected $guarded = array('id');
    
    public static $rules = [
        'item_id' => 'required',
        'edited_at' => 'required'
        ];
}
