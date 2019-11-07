<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name',
        'explanation',
        'image_path',
        'amount',
    ];
    
    public static $rules = array(
        'item_name' => 'required',
        'explanation' => 'required',
        'image_path' => 'required',
        'amount' => 'required'
    );
    
    
    public function images_histories()
    {
        return $this->hasMany('App\ImagesHistory');
    }
}
