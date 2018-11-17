<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $guarded =[];
    
    public function goods()
    {
        return $this->belongsTo(Goods::class,'goods_id','id');
    }
    
}
