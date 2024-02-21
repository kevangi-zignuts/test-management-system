<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class adminController extends Controller
{
    public function create()
    {
        return view('role-permission.form-permission');
    }


    public function store(Request $request)
    {
        $request->validate([
            'test_name' => "required",
            'description' => "required",
            'level' => "required",
        ]);

        $test = new Test;
        $test->test_name = $request['test_name'];
        $test->description = $request['description'];
        $test->level = $request['level'];
        $test->save();

        return redirect()->route('show')->with('success', 'Test inserted successfully');;
    }

    public function show()
    {
        $tests = Test::all();
        return view('role-permission.permissions', ['tests' => $tests]);
    }

    public function view($id){
        $test = Test::findOrFail($id);
        // dd($test);
        return view('admin.test-view');
    }
}
