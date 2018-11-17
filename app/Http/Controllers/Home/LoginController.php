<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest',[
            'except'=>['logout'],
        ]);
//        $this->middleware('auth')->only('logout');
    }
    
    public function index()
    {
        return view('login.login');
    }
    
    
    public function login(Request $request)
    {
        $request->validate([
           'email' =>'required|email',
           'password'=>'required|min:3',
        ]);
    
        $data=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        $status = \Auth::attempt($data);
        if ($status){
            return redirect('/')->with('success',"Welcome back! ".auth()->user()->name);
        }else{
            return back()->with('error','Incorrect user account or password.');
        }
    }
    
    public function logout()
    {
        \Auth::logout();
        return redirect()->route('login')->with('error','Go login or go home!');
    }
}
