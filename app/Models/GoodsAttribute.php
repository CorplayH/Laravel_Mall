<?php

namespace App\Models;

use houdunwang\arr\Arr;
use Illuminate\Database\Eloquent\Model;

class GoodsAttribute extends Model
{
    
    protected $guarded = [];
    
    public function attribute()
    {
        return $this->belongsTo(GoodsAttribute::class, 'pid', 'id');
    }
    
    public function getSon()
    {
        return $this->hasMany(GoodsAttribute::class,'pid','id');
    }
    
    
    public function getGoodsAttributeTree()
    {
        //取得所有分类, 转为数组格式
        $data = $this->get()->toArray();
        
        //获得数组树状图
        return Arr::tree($data, 'aname', 'id', 'pid');
    }
    
    public function getGoodsAttributeByLevel($level)
    {
        $attributes = $this->getGoodsAttributeTree();
        foreach ($attributes as $attribute) {
            if ($attribute['_level'] == $level) {
                $leveled_attributes[] = $attribute;
            }
        }
        return $leveled_attributes;
    }
}
