<?php

namespace App\Providers;

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
    
    public function publicData(){
        view()->composer('*',function (View $view){
            $data      = Category::get()->toArray();
            $recommendGoods= Goods::where('is_recommend', 1)->limit(4)->inRandomOrder()->get();
            $categories = Arr::channelLevel($data, 0, $html = "&nbsp;", 'id', 'pid');
            $view->with(compact('categories','recommendGoods'));
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
