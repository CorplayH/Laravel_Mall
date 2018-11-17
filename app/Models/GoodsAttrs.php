<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsAttrs extends Model
{
    protected $guarded =[];
    
    public function attrName()
    {
        return $this->hasOne(GoodsAttribute::class,'id','goodsAttribute_id');
    }
}
