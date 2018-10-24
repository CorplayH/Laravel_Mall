<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Goods;
use App\Models\GoodsAttribute;
use App\Models\GoodsAttrs;
use App\Models\Product;
use function Couchbase\defaultDecoder;
use houdunwang\arr\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    //
    public function index()
    {
        
        return view('home.index');
    }
    
    
    public function lists(Category $category)
    {
        $data = $category->gitListCategory();
        return view('home.lists',compact('category','data'));
    }
    
    public function product(Goods $goods)
    {
        //用商品id 找它下面的所有货品的属性  比如(白色, 黑色)等具体的属性ID
        $productAttrIds = Product::where('goods_id',$goods['id'])->pluck('attrs');
        // 定义一个空数组用来接收合并后的当前商品的所有货品的所有子属性
        $sonAttrIds = [];
        foreach ($productAttrIds as $productAttrId) {
            $sonAttrIds = array_merge($sonAttrIds,$productAttrId);
        }
        //用商品id 找它下面的所有商品的属性  比如(颜色[color], 内存)等具体的分类的属性ID
        $goodsAttrIds = GoodsAttrs::where('goods_id',$goods['id'])->pluck('goodsAttribute_id');
//        dd($goodsAttrIds->toArray());
        // 用productID 找product的Attrs
//        $productAttrs = GoodsAttribute::whereIn('id',$productAttrIds)->get();
//        dd($productAttrs->toArray());
        // 用goodsID
        $goodsAttrs = GoodsAttribute::whereIn('id',$goodsAttrIds)->get();
//        dd($productAttrs->toArray());
//        $db = [];
        foreach ($goodsAttrs as $k => $topAttr){
            // 用当前商品的每个可用顶级属性,去找到顶级属性的子属性,但是子属性只能是在上面的$sonAttrIds数组中的
            $goodsAttrs[$k]['son'] = GoodsAttribute::where('pid',$topAttr['id'])->whereIn('id',$sonAttrIds)->get()->toArray();
        }
//        dump($goodsAttrs->toArray());
        
        $product = Product::where('goods_id', $goods['id'])->first();
    
        return view('home.product',compact('goods','goodsAttrs','product'));
    }
    
    
    public function getSelectedProduct($attrs, Goods $goods)
    {
        // 切割字符串成数组成
        $attr = explode(',',$attrs);
        //转成json 数组用来匹配, 因为数据库里存的是 json 形式的 数组
        $json = json_encode($attr);
        $product = Product::where('attrs',$json)->where('goods_id' , $goods['id'])->first();
        $product['price'] = number_format($product['addPrice'] + $goods['price'],'2');
        return $product;
        
    }
    
    
}
