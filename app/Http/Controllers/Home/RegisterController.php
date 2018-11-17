<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('login.register');
    }
    
    public function store(RegisterRequest $request)
    {
        $data = $request->all();
        $data['name'] = $request['fname'].' '.$request['lname'];
        $data['icon'] = asset('avatar.png');
        $data['email_verified_at'] = date('Y/m/d H:i:s');
        $data['password'] = bcrypt($request->password);
        
        User::create($data);
        
        return redirect()->route('login')->with('success','Congratulations! You are all set now!');
    }
    
}
