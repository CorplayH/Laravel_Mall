<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('home.userprofile.index',compact('time'));
    }
    
    
    public function changeIcon(Request $request)
    {
        User::where('id',auth()->user()->id)->update(['icon'=>$request->icon]);
        return back();
    }
    
    public function updateProfile(Request $request)
    {
        $this->validate($request,[
           'fname' => 'required|max:30',
           'lname' => 'required|max:30',
           'phone' => 'numeric'
        ]);
        $request['name'] =$request['fname'].' '.$request['lname'];
        auth()->user()->update($request->all());
        return back()->with('success','Your profile is updated');
    }
    
    public function updatePassword(Request $request)
    {
        // 更改密码, 表单验证
        $this->validate($request,[
           'oldPassword' =>'required',
           'password' =>'required|min:6|confirmed',
        ],[
            'oldPassword.required' => 'Show me the code!',
            'password.required' => 'Password can not be empty',
            'password.min' => 'Password can not be less then 6 digit',
            'password.confirmed' => 'The new password is not matche d',
        ]);
        // 判断旧密码是否正确
        if (password_verify($request->oldPassword,auth()->user()->password)){
            // 判断新密码是否与新密码相同, 如果相同, 提示返回
            if(password_verify($request->password,auth()->user()->password)){
                return back()->with('error','New password can not be the same as old password');
            }
            // 如果可以到这, 说明前面都已经通过, 更改密码
            auth()->user()->update(['password' => bcrypt($request->password)]);
            auth()->logout();
            return redirect()->route('login')->with('success','Password changed, please re-login');
    
        }else{
            return back()->with('error','old password is incorrect!');
        }
        
        
        
    }
}
