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
        'inventory_control'
    ];
    
    public static $rules = array(
        'item_name' => 'required',
        'explanation' => 'required',
        'amount' => 'required',
        'inventory_control' => 'required'
    );
    
    
    public function images_histories()
    {
        return $this->hasMany('App\ImagesHistory');
    }
    
    public function cartitems()
    {
        return $this->hasMany('App\CartItem');
    }
    
    public function cart_presences()
    {
        return $this->hasMany('App\Presence');
    }
    
}

   

//hasMany
//belongsTo
