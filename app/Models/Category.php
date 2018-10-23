<?php

namespace App\Models;

use houdunwang\arr\Arr;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $guarded = ['attr', 'attrs','file'];
    protected $casts = [
        'images'=> 'array',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'pid', 'id');
    }
    
    public function getCategoryTree()
    {
        //取得所有分类, 转为数组格式
        $data = Category::get()->toArray();
        
        //获得数组树状图
        return Arr::tree($data, 'cname', 'id', 'pid');
    }
    
    /**
     * @param $level integer 1,2,3
     *
     * @return array
     */
    public function getCategoryByLevel($level)
    {
        $categories = $this->getCategoryTree();
        foreach ($categories as $category) {
            if ($category['_level'] == $level) {
                $leveled_category[] = $category;
            }
        }
        return $leveled_category;
    }
    
    public function getParentCategory($category)
    {
        $categories = $this->getCategoryTree();
        foreach ($categories as $k => $v) {
            // 找id 相同的
            if ($v['id'] == $category['id']) {
                //替换传进来的 $category
                $category = $v;
            }
        }
        foreach ($categories as $k => $v) {
            if ($v['_level'] >= $category['_level']) {
                //把整体树状数组里 子集和同级数据 删除
                unset($categories[$k]);
            }
        }
        
        return $categories;
    }
    
    public function getSelectCategory()
    {
        // 获取所有树状结构处理后的分类数据
        $categories = $this->getCategoryTree();
        // 循环所有分类数据,将级别等于3的去掉
        foreach ($categories as $k => $category) {
            if ($category['_level'] == 3){
                unset($categories[$k]);
            }
        }
        //返回除了等级三的所有分类
        return $categories;
    }
    
    public function hasChild($category)
    {
        // 获取树状结构分类数据
        $data = $this->getCategoryTree();
        // 调用arr组件的判断是否有子集方法,如果有,返回真,如果没有,返回假
        return Arr::hasChild($data, $category['id'], 'pid');
    }
    
    public function gitListCategory()
    {
        // 用页面上传过来 带id 的参数 来找 子集
        $notLevelThree = Category::where('pid',$this->id)->first();
//        dd($notLevelThree->toArray());
        //如果有孩子  , 在试着去找它的子集 说明是一级 或者 二级属性
        // 可以再往下找
        if ($notLevelThree){
            // 用 whereIn 找上面pluck的数组 说明传过来的参数是 顶级分类
            $notLevelTwo = Category::where('pid',$notLevelThree->id)->first();
//            dd($notLevelTwo);
            if ($notLevelTwo){
                //如果可以运行到这里, 说明是顶级分类
                // 先找到它的二级分类
                $levelTwo = Category::where('pid',$this->id)->pluck('id');
                //取到所有二级后, 取属于这些二级的所有三级分类
                $levelThree =[];
                // 循环所有二级ID 去得它的所有三级ID的id
                foreach ($levelTwo as $value) {
                    $res = Category::where('pid',$value)->pluck('id')->toArray();
                    $levelThree = array_merge($levelThree,$res);
                }
                // 取到三级id后   取 三级ID 里的货品
                $goods = Goods::whereIn('thirdCategory',$levelThree)->get();
                // 取到所有商品的属性ID
                $attrIds = CategoryGoodsAttribute::whereIn('category_id',$levelThree)->pluck('attribute_id');
                // 用取到的 属性ID 去属性表匹配商品属性
                $attrs = GoodsAttribute::whereIn('id',$attrIds)->get();
    
            }else{
                //如果到这块, 说明是二级分类
                //用他二级的ID 找到它的三级分类的数据
                $thirdLevel = Category::where('pid',$this->id)->pluck('id');
                $goods = Goods::whereIn('thirdCategory',$thirdLevel)->get();
                $attrIds = CategoryGoodsAttribute::whereIn('category_id',$thirdLevel)->pluck('attribute_id');
                $attrs = GoodsAttribute::whereIn('id',$attrIds)->get();
    
            }
        }else{
            //如果一个判断都没进, 是为三级分类直接取数据
            // 获取商品数据
            $goods = Goods::where('thirdCategory',$this->id)->get();
//            获取商品属性ID
            $attrIds = CategoryGoodsAttribute::where('category_id',$this->id)->pluck('attribute_id');
//            获取商品属性
            $attrs = GoodsAttribute::whereIn('id',$attrIds)->get();
        }
        return [
            'goods' =>$goods,
            'attrs' => $attrs,
        ];
    }
}
