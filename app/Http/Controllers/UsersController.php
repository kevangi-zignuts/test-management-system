<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class UsersController extends Controller
{
    public function index(){
        $tests = Test::all();
        return view('user.dashboard', ['tests' => $tests]);
    }

    public function test($id){
        $test = Test::findOrFail($id);
        return view('user.test', ['test' => $test]);
    }
}
