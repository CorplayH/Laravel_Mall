<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    protected $guarded =[];
    
    public function goods()
    {
        return $this->belongsTo(Goods::class,'goods_id','id');
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
