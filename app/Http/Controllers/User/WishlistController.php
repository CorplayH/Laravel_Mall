<?php

namespace App\Http\Controllers\User;

use App\Models\Goods;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function makeWish(Goods $goods)
    {
        $data = Wishlist::where('goods_id',$goods->id)->where('user_id',auth()->user()->id)->first();
        if ($data){
            $data->delete();
            return ['code'=>0, 'message' => 'deleted'];
        }else{
            Wishlist::create([
                'user_id'=> auth()->id(),
                'goods_id'=> $goods->id,
            ]);
            return ['code'=>1, 'message' => 'added'];
        }
    }
    
    public function wishList()
    {
        $wishes = Wishlist::where('user_id', auth()->id())->get();
        return view('home.wishlist.wishlist',compact('wishes'));
    }
}
