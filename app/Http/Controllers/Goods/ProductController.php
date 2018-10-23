<?php

namespace App\Http\Controllers\Goods;

use App\Models\Goods;
use App\Models\GoodsAttribute;
use App\Models\GoodsAttrs;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取对应商品id
        $id = $request->query('goods');
        
        // 获取对应商品id的商品
        $goods = Goods::find($id);
        
        // 获取到点击的某个商品的货品数据
        $products = Product::where('goods_id', $id)->get();
        
        return view('product.index', compact('goods', 'products'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // 获取对应商品id
        $id = $request->query('goods');
        // 获取对应商品id的当个商品分类 goods->product
        $goods = Goods::find($id);
        
        // 从商品属性中间表中获取当前商品可用的顶级属性id
        $topIds = GoodsAttrs::where('goods_id', $id)->pluck('goodsAttribute_id');
        // 通过上面找到的属性id数组,找到对应的可用顶级属性数据,以及它们的子属性
        $topAttr = GoodsAttribute::whereIn('id', $topIds)->get();
        
        return view('product.create', compact('id', 'topAttr', 'goods'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        dd($request->toArray());
        Product::create($request->all());
        
        return redirect()->route('goods.product.index', ['goods' => $request->goods_id])->with('success', 'Product is added');
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        // 获取对应商品id
        $id = $request->query('goods');
        // 获取对应商品id的当个商品分类 goods->product
        $goods = Goods::find($id);
        // 从商品属性中间表中获取当前商品可用的顶级属性id
        $topIds = GoodsAttrs::where('goods_id', $id)->pluck('goodsAttribute_id');
        // 通过上面找到的属性id数组,找到对应的可用顶级属性数据,以及它们的子属性
        $topAttr = GoodsAttribute::whereIn('id', $topIds)->get();
        
        return view('product.edit', compact('id', 'topAttr', 'goods','product'));
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Product      $product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('goods.product.index', ['goods' => $request->goods_id])->with('success', 'the product is successfully edited');
    
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Product $product)
    {
        $product->delete();
        return redirect()->route('goods.product.index',['goods' => $request->goods_id])->with('success', 'the product is deleted');
    
    }
}
