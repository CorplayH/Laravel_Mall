<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Goods;
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
}
