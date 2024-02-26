<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\Result;

class UsersController extends Controller
{
    public function index(){
        $tests = Test::all();
        return view('user.dashboard', ['tests' => $tests]);
    }

    public function test($id){
        $questions = Question::where('test_id', $id)->get();
        return view('user.test', ['questions' => $questions]);
    }

    public function result(Request $request, $id){

        $questions = Question::where('test_id', $id)->get();
        $i = $questions->count();
        $total = 0;
        for($j=1; $j<=$i; $j++){
            $question_id = $request->input("question_id" . $j);
            $question = Question::findOrFail($question_id);
            $que_ans = $question->answer;
            $answer = $request["option".$j];
            if($que_ans === $answer){
                $total++;
            }
        }
        $percentage = ($total/$i) * 100;
        $user_id = auth()->id();

        $result = new Result;
        $result->test_id = $id;
        $result->user_id = $user_id;
        $result->total_que = $i;
        $result->right_que = $total;
        $result->percentage = $percentage;
        $result->save();


        $tests = Test::all();
        return view('user.dashboard', ['tests' => $tests]);
    }
}
