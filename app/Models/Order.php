<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    
    public function orderList()
    {
        return $this->hasMany(OrderList::class,'order_id','id');
    }
    
    
}
