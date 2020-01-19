<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPhoto extends Model
{
    
    protected $fillable = ['item_id', 'image_path'];
    
    public static $rules = array(
        'image_path' => 'required',
    );
    
    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
