<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['user_id', 'guest_id', 'item_id', 'quantity'];
    
    
    
    // public function items()
    // {
    //     return $this->hasOne();
    // }
//     CartItemとItemを一対一で関連づけておくと
//   （mynewsのUserとProfileと同様に）
//     以下のような記述で、cartitemからitemのデータを参照できます
//     $cartitem->$item->item_name 

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
