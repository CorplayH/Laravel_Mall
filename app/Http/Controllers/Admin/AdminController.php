<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth.adminIn');
    }
    
    public function index()
    {
//        dump(auth('admin')->user());
        return view('admin.index');
    }

}
