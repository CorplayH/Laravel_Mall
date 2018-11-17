<?php

// 首页路由
Route::get('/','Home\HomeController@index');
// 列表路由
Route::get('/lists/{category}','Home\HomeController@lists')->name('lists');
// 商品详情路由
Route::get('/product/{goods}','Home\HomeController@product')->name('product');
// 商品详情路由
Route::get('/getProduct/{attrs}/{goods}','Home\HomeController@getSelectedProduct')->name('selectedProduct');

// 注册登入
Route::get('/login','Home\LoginController@index')->name('login');
Route::post ('/login','Home\LoginController@login')->name('login');
Route::get ('/logout','Home\LoginController@logout')->name('logout');
Route::get('register','Home\RegisterController@index')->name('register');
Route::post('register','Home\RegisterController@store')->name('register');
Route::post('send','Util\CodeController@send')->name('CodeSend');

// 购物车路由
Route::group(['middleware'=>'auth', 'prefix' => 'cart','namespace'=>'Cart','as'=>'cart.'],function () {
    // 物品添加
    Route::get('addToCart/{goods_id}/{product_id}/{num}','CartController@addToCart')->name('addToCart');
    // 购物车货品列表
    Route::get('cartList','CartController@cartList')->name('cartList');
    // 购物车单个删除
    Route::get('productDelete/{cart}','CartController@productDelete')->name('productDelete');
    // vue 清空购物车
    Route::get('deleteAll','CartController@deleteAll')->name('deleteAll');
    // Vue axios 计算价格
    Route::get('calc/{id}/{num?}','CartController@calc')->name('calc');
});

//订单路由
Route::group(['middleware' => 'auth', 'prefix' => 'order', 'namespace' => 'Order', 'as'=> 'order.'],function (){
    Route::get('/','OrderController@index')->name('order');
    Route::get('review','OrderController@review')->name('review');
    Route::get('store','OrderController@storeOrder')->name('store');
    Route::get('pay/{order}','OrderController@pay')->name('pay');
    Route::post('checkStatus/{orderId}','OrderController@checkStatus')->name('checkStatus');
    Route::get('isPaid/{order}','OrderController@isPaid')->name('isPaid');
    Route::get('showOrder','OrderController@showOrder')->name('showOrder');
});
// 微信支付 返回
Route::any('/wechatPay/notify','Order\OrderController@notify');
// 个人中心
Route::group(['middleware'=>'auth', 'prefix' => 'user','namespace'=>'User','as'=>'user.'],function (){
    Route::get('userInfo','UserController@index')->name('userInfo');
    Route::post('updateProfile','UserController@updateProfile')->name('updateProfile');
    Route::post('updatePassword','UserController@updatePassword')->name('updatePassword');
    Route::resource('address','AddressController');
    Route::post('changeIcon','UserController@changeIcon')->name('changeIcon');
    // 加入收藏
    Route::get('makeWish/{goods}','WishlistController@makeWish')->name('makeWish');
    Route::get('wishList','WishlistController@wishList')->name('wishList');
});

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
    Route::any('upload','UploadController@upload')->name('upload');
});

