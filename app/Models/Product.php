<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded =[];
    protected $casts =[
      'attrs' => 'array'
    ];
    
    /**
     * 将货品的属性组合转成中文方法
     */
    public function getAttrs($productAttrs){
        // 定义一个新数组,用来接收中文属性名称
        $newArr = [];
        // 循环获取到的商品的属性组合数组,用每个属性id找到对应属性的中文
        foreach ($productAttrs as $attr){
            $newArr[] = GoodsAttribute::where('id',$attr)->value('aname');
        }
        // 将新组合的中文属性数据返回,注意,要返回json数据,并且不要转码
        return json_encode($newArr,JSON_UNESCAPED_UNICODE);
    }
    
    
    public function getProductAttr()
    {
        // 获取当前货品数据的属性组合
        $attrs = $this->attrs;
        $newArr = [];
        // 将attrs的数字id转成名字
        foreach ($attrs as $k => $attr){
            $sonAttr = GoodsAttribute::find($attr);
            $fatherAttr = GoodsAttribute::find($sonAttr['pid']);
            $newArr['father'][] = $fatherAttr;
            $newArr['son'][] = $sonAttr;
        }
        return $newArr;
    }
}
