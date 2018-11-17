<?php

namespace App\Http\Controllers\Cart;

use App\Models\Cart;
use App\Models\GoodsAttribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    
    public function addToCart($goods_id, $product_id, $num)
    {
        $hasProduct = Cart::where('user_id', auth()->user()->id)->where('product_id', $product_id)->first();
        if ($hasProduct) {
            $hasProduct->update(['num' => $hasProduct['num'] + $num]);
        } else {
            Cart::create([
                'goods_id'   => $goods_id,
                'product_id' => $product_id,
                'num'        => $num,
                'user_id'    => auth()->user()->id,
            ]);
        }
        return redirect()->route('cart.cartList');
    }
    
    
    public function cartList()
    {
        $cartList = Cart::where('user_id', auth()->user()->id)->with('goods', 'product')->get();
        //        $cartList = $cartList->toArray();
        // 设置属性数组
        //        $attrs =[];
        foreach ($cartList as $v) {
            //            开始循环 货品的 属性
            foreach ($v['product']['attrs'] as $attr) {
                //                找到货品的属性名字  作为数组的值
                $attrName = GoodsAttribute::where('id', $attr)->value('aname');
                //                找到货品属性的顶级属性
                $pid     = GoodsAttribute::where('id', $attr)->value('pid');
                $topAttr = GoodsAttribute::where('id', $pid)->value('aname');
                //                组合数组
                //                $attrs [] =[$topAttr=>$attrName];
                $attrs['topAttr'][]  = $topAttr;
                $attrs['attrName'][] = $attrName;
            }
            // 把循环出来的属性插入大数组
            $v['attrs'] = $attrs;
            //            清空上一次 循环出来的属性, 保证下次循环是属性是空的
            $attrs = [];
        }
        //前台用Vue 处理数据 , 所有要转下json 数据格式
        $cartList = json_encode($cartList);
        
        return view('home.cart.cart', compact('cartList'));
    }
    
    public function productDelete(Cart $cart)
    {
        $cart->delete();
        $num = Cart::where('user_id',auth()->user()->id)->count();
        return ['code' => 1, 'num'=>$num ,'message' => 'Deleted Successfully'];
    }
    
    public function deleteAll()
    {
        Cart::where('user_id', auth()->user()->id)->delete();
        
        return ['code' => 1, 'message' => 'Deleted Successfully'];
    }
    
    public function calc($id, $num = 1)
    {
        if (!$num == 1){
            Cart::where('id',$id)->update(['num'=>$num]);
            return ['code' =>2, 'message' => 'number changed' ];
        }else{
            Cart::where('id',$id)->update(['num'=>$num]);
            return ['code' =>1, 'message' => 'number to 1' ];
        }
        
    }
}
