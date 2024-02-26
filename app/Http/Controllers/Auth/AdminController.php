<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLoginForm(){
        return view('admin.login');
    }
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $attempt = Auth::guard('admin');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->intended('\admin\create');
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
