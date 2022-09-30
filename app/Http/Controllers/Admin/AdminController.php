<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login()
    {
        return view('admins.admins.login',[
            'title'=>'Đăng nhập',
        ]);
    }
    public function store(Request $request)
    {
        if (Auth::guard('admin')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            return redirect()->route('admin');
        }

        Session::flash('error', 'Email hoặc mật khẩu không chính xác!!!');
        return redirect()->back();
    }
    public function logout(){
        Auth('admin')->logout();
        return redirect()->route('admin');
    }
}
