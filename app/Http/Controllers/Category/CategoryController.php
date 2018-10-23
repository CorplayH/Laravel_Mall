<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use App\Models\CategoryGoodsAttribute;
use App\Models\GoodsAttribute;
use houdunwang\arr\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        
        return view('category.index', compact('categories'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category, GoodsAttribute $goodsAttribute)
    {
        $categories = $category->getSelectCategory();
        //取得 level 为 1 (pid=0) 的属性值
        $attributes = $goodsAttribute->where('pid', 0)->get();
        
        return view('category.create', compact('categories', 'attributes'));
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
        $data = $request->all();
        // 创建好的数据是可以返回的!
        // 创建好的数据是可以返回的!
        $category = Category::create($data);
        if (isset ($data['attr'])) {
            $attribute = $data['attr'];
            foreach ($attribute as $v) {
                CategoryGoodsAttribute::create(
                    [
                        'category_id'  => $category['id'],
                        'attribute_id' => $v,
                    ]
                );
            }
        }
        
        return redirect()->route('category.category.index')->with('success', "{$data['cname']}"." Category is added");
    }
    
    public function show(Category $category)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //获取所有 父级分类
        $parentCategories = $category->getParentCategory($category);
        //        dd($parentCategories);
        //取得 level 为 1 (pid=0) 的属性值
        $attributes = GoodsAttribute::where('pid', 0)->get();
        //在中间表取得 当前分类可用的id 值
        $availableAttr = CategoryGoodsAttribute::where('category_id', $category['id'])->pluck('attribute_id');
        
        return view('category.edit', compact('category', 'parentCategories', 'availableAttr', 'attributes'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Category     $category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        if (isset($request->attrs)) {
            CategoryGoodsAttribute::where('category_id', $category['id'])->delete();
            foreach ($request->attrs as $k => $v) {
                CategoryGoodsAttribute::create(
                    [
                        'category_id'  => $category['id'],
                        'attribute_id' => $v,
                    ]
                );
            }
        } else {
            CategoryGoodsAttribute::where('category_id', $category['id'])->delete();
        }
        
        return redirect()->route('category.category.index')->with('success', 'Edited successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->hasChild($category)) {
            return back()->with('error', 'Please delete Sub category first');
        }
        CategoryGoodsAttribute::where('category_id', $category['id'])->delete();
        $category->delete();
        
        return back()->with('success', 'The category has been deleted');
    }
    
    
    public function getChildren(Category $category)
    {
        $children = $category->where('pid', $category['id'])->get();
        
        return $children;
    }
    
    public function getAttr(Category $category)
    {
        $attrId = CategoryGoodsAttribute::where('category_id',$category['id'])->pluck('attribute_id');
        $attrs = GoodsAttribute::whereIn('id',$attrId)->get();
        return $attrs;
    }
}
