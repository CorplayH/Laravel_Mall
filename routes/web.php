<?php

// 首页路由
Route::get('/','Home\HomeController@index');
// 列表路由
Route::get('/lists/{category}','Home\HomeController@lists')->name('lists');
// 商品详情路由
Route::get('/content','Home\HomeController@content');










// 商品与货品
Route::group(['middleware'=>'auth.adminIn', 'prefix' => 'goods','namespace'=>'Goods','as'=>'goods.'],function (){
    //商品路由
    Route::resource('goods','GoodsController');
    //货品路由
    Route::resource('product','ProductController');
});

//商品属性 的路由
Route::group(['middleware'=>'auth.adminIn', 'prefix' => 'dash','namespace'=>'GoodsAttribute','as'=>'goodsAttribute.'],function (){
    Route::resource('goodsAttribute','AttributeController');
});
// 商品分类路由
Route::group(['middleware' => 'auth.adminIn','prefix'=>'dash','namespace'=>'Category','as'=>'category.'],function (){
    Route::resource('category','CategoryController');
    // ajax 获取子分类的路由
    Route::get('getChildren/{category}','CategoryController@getChildren')->name('getChildren');
    // ajax 获取 可用属性 的路由
    Route::get('getAttr/{category}','CategoryController@getAttr')->name('getAttr');
    
});
//后台路由
Route::group(['prefix' =>'admin', 'namespace' => 'Admin', 'as' => 'admin.'],function (){
    //加载后台控制台页面
    Route::get('/','AdminController@index')->name('dashBoard');
    //加载后台登入页面
    Route::get('login','LoginController@index')->name('loginIndex');
    //后台登入路由
    Route::post('login','LoginController@login')->name('login');
    //后台退出路由
    Route::get('logout','LoginController@logout')->name('logout');
});
//工具类路由
Route::group(['prefix' => 'util','namespace'=>'Util','as'=>'util.'],function (){
    Route::any('upload','UplaodController@upload')->name('upload');
});

