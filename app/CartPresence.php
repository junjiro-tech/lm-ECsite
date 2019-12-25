<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartPresence extends Model
{
    protected $fillable = ['user_id', 'guest_id', 'item_id', 'quantity'];
    
    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
