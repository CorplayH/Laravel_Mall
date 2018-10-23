<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth.adminIn')->only('logout');
    }
    /**
     * 加载登入页面
     */
    public function index()
    {
        return view('admin.login');
    }
    
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email','password');
        $status = \Auth::guard('admin')->attempt($credentials);
        if (!$status){
            return back()->with('error','Something goes wrong!');
        };
        return redirect() ->route('admin.dashBoard')->with('success',"Welcome to Man's Cave" );
    }
    
    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect() ->route('admin.login')->with('success','Logout Successfully!');
    }
}
