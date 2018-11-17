<?php

namespace App\Http\Controllers\Goods;

use App\Models\Category;
use App\Models\CategoryGoodsAttribute;
use App\Models\Goods;
use App\Models\GoodsAttribute;
use App\Models\GoodsAttrs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Goods::orderBy('created_at','desc')->paginate(10);
        return view('goods.index',compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('pid',0)->get();
        return view('goods.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['thirdCategory'] = $request['category_id'][2];
        $goods = Goods::create($request->all());
            foreach ($request->attrs as $attr){
                GoodsAttrs::create([
                    'goods_id' => $goods['id'],
                    'goodsAttribute_id' =>$attr,
                ]);
            }
        return redirect()->route('goods.goods.index')->with('success', '商品添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function show(Goods $goods)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function edit(Goods $good)
    {
    
//        $category = $good->getCategory($good['category_id']);
        // 获取所有顶级属性, 给前台页面匹配
        $topCategory = Category::where('pid',0)->get()->toArray();
        
        $secondCategory = Category::where('pid',$good['category_id'][0])->get();
        $thirdCategory = Category::where('pid',$good['category_id'][1])->get();
        //获取所有 这个三级分类  可用用的 属性 (数字)
        $attrIds = CategoryGoodsAttribute::where('category_id', $good['category_id'][2])->pluck('attribute_id');
        // 在  属性表 里获取 所属 的属性 (用属性数字 找字符串)
        $attrs = GoodsAttribute::whereIn('id',$attrIds)->get();
        // 取到的
        $availableAttr = GoodsAttrs::where('goods_id',$good['id'])->pluck('goodsAttribute_id')->toArray();
        return view('goods.edit',compact('good','topCategory','secondCategory','thirdCategory','attrIds','attrs','availableAttr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goods $good)
    {
        if (isset($request['is_recommend'])){
            // 将选择的三级分类拿出来,另外存一个字段
            $request['thirdCategory'] = $request['category_id'][2];
            $good->update($request->all());
        }else{
            $request['is_recommend'] = 0;
            $request['thirdCategory'] = $request['category_id'][2];
            $good->update($request->all());
        }
        GoodsAttrs::where('goods_id',$good['id'])->delete();
        foreach ($request->attrs as $attr){
            GoodsAttrs::create([
                'goods_id' => $good['id'],
                'goodsAttribute_id' =>$attr,
            ]);
        }
        return redirect()->route('goods.goods.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goods $good)
    {
        
        GoodsAttrs::where('goods_id', $good['id'])->delete();
        $good->delete();
        return redirect()->route('goods.goods.index')->with('success', 'Delete successfully!');
    }
}
