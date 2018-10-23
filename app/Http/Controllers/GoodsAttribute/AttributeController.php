<?php

namespace App\Http\Controllers\GoodsAttribute;

use App\Models\GoodsAttribute;
use houdunwang\arr\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = GoodsAttribute::orderBy('updated_at','desc')->paginate(10);
        return view('goodsAttribute.index',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = GoodsAttribute::where('pid',0)->get();
        return view('goodsAttribute.create',compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GoodsAttribute::create($request->all());
        return redirect()->route('goodsAttribute.goodsAttribute.index')->with('success','New Attribute added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GoodsAttribute  $goodsAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(GoodsAttribute $goodsAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GoodsAttribute  $goodsAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(GoodsAttribute $goodsAttribute)
    {
        $goodsAttributes = GoodsAttribute::where('pid',0)->get();
        return view('goodsAttribute.edit',compact('goodsAttribute','goodsAttributes'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GoodsAttribute  $goodsAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GoodsAttribute $goodsAttribute)
    {
        $goodsAttribute->update($request->all());
        return redirect()->route('goodsAttribute.goodsAttribute.index')->with('success','Updated');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GoodsAttribute  $goodsAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,GoodsAttribute $goodsAttribute)
    {
//        dd($goodsAttribute);
        $goodsAttribute->where('pid',$goodsAttribute->id)->delete();
        $goodsAttribute->delete();
        return back()->with('success','Mission completed!');
    }
}
