<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Goods;
use houdunwang\arr\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 调用获取公共数据方法,分配到模板
        $this->publicData();
    }
    
    /**
     * 给模版分配公共变量
     */
    public function publicData()
    {
        view()->composer('*', function (View $view) {
            $data           = Category::get()->toArray();
            $recommendGoods = Goods::where('is_recommend', 1)->limit(4)->inRandomOrder()->get();
            $categoriesHome = Arr::channelLevel($data, 0, $html = "&nbsp;", 'id', 'pid');
            if (auth()->user()) {
                $smallCart       = Cart::where('user_id', auth()->user()->id)->with('goods', 'product')->get();
                $smallTotalPrice = 0;
                if ($smallCart) {
                    foreach ($smallCart as $v) {
                        $goods   = $v['goods']['price'];
                        $product = $v['product']['addPrice'];
                        //自定义一个单价属性
                        $v['unitPrice']  = $goods + $product;
                        $v['unitPrice']  = number_format((float)$v['unitPrice'], 2, '.', ',');
                        $v['unitTotal']  = round(($goods + $product) * $v['num']);
                        $smallTotalPrice += $v['unitTotal'];
                        $v['unitTotal']  = number_format((float)$v['unitTotal'], 2, '.', ',');
                    }
                    $smallTotalPrice = number_format((float)$smallTotalPrice, 2, '.', ',');
                }
            }
            //user join time
            if (auth()->user()){
                $joinTime = getTimeR(auth()->user()->created_at);
            }
            $view->with(compact('categoriesHome', 'recommendGoods', 'smallCart', 'smallTotalPrice','joinTime'));
        });
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
