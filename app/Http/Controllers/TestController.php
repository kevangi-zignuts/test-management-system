<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\User;
use App\Models\UserTest;


class TestController extends Controller
{
    /**
     * Show the form for creating a new test.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testModule.create');
    }


    /**
     * Store a newly created test in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'test_name'   => "required",
            'description' => "required",
            'level'       => "required",
        ],[
            'required' => 'All fields are required.',
        ]);

        $test = Test::create([
            'test_name'   => $request['test_name'],
            'description' => $request['description'],
            'level'       => $request['level'],
        ]);

        return redirect()->route('test.index')->with('success', 'Test inserted successfully');;
    }


    /**
     * Display the all the tests.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tests = Test::all();
        $tests = Test::paginate(5);
        return view('admin.TestModule.index', ['tests' => $tests]);
    }

    /**
     * Display the specified test.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id){
        $test = Test::findOrFail($id);
        return view('admin.TestModule.view', compact('test'));
    }

    /**
     * Show the form for editing the specified test.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::findOrFail($id);
        return view('admin.TestModule.edit', ['test' => $test]);
    }


    /**
     * Update the specified test in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'test_name'   => "required",
            'description' => "required",
            'level'       => "required",
        ],[
            'required' => 'All fields are required.',
        ]);
        $test = Test::findOrFail($id);
        $test->update($request->only(['test_name', 'description', 'level']));
        return redirect()->route('test.index')->with('success', 'Test updated successfully');
    }

    /**
     * Remove the specified test from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $test = Test::find($id);
        if(!$test){
            return redirect()->route('test.index')->with('fail', 'We can not found data');
        }
        $test->delete();
        return redirect()->route('test.index')->with('success', 'Task deleted successfully');
    }

    /**
     * Show the admin Dashboard.
     */
    public function dashboard(){
        $totalUsers = User::where('user_type', 'user')->count();
        $totalTests = Test::count();
        return view('admin.dashboard', ['totalUsers' => $totalUsers, 'totalTests' => $totalTests]);
    }
}
