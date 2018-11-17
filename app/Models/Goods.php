<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    
    protected $guarded = ['attrs', 'file', 'editormd-html-code'];
    
    protected $casts = [
            'images'      => 'array',
            'category_id' => 'array',
        ];
    
    public function cart()
    {
        return $this->belongsTo(Cart::class ,'id','goods_id');
    }
    public function getCategory($goods)
    {
        $newArr = '';
        foreach ($goods as $good) {
            $newArr .= Category::where('id', $good)->value('cname').' => ';
        }
        $arr = rtrim($newArr, '=> ');
        return $arr;
    }
    public function thirdName()
    {
        return $this->belongsTo(Category::class,'thirdCategory','id');
    }
    
    public function wish()
    {
        return $this->hasMany(Wishlist::class,'goods_id','id');
    }
    
    public function hasWish(Goods $goods)
    {
        if (auth()->user()){
            return $this->wish()->where('user_id',auth()->user()->id)->where('goods_id',$goods->id)->first();
            
        }
    }
    
    public function goodsAttr()
    {
        return $this->hasMany(GoodsAttrs::class,'goods_id','id');
    }
    
}
