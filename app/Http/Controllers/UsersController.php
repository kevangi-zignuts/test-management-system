<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\Result;

class UsersController extends Controller
{
    /**
     * Display Dashboard of the perticular user
     */
    public function index(){
        $tests = Test::all();

        $user_id = auth()->id();
        // $results = Result::where('user_id', $user_id)->get();
        $results = Result::with('test')->where('user_id', $user_id);
        $total_test = $results->count();
       // $total_test = Result::where('user_id', $user_id)->count();

        $results = $results->paginate(10);

        // $percentage = 0;
        // $result_table = [];
        // foreach($results as $key => $result){
        //     $percentage += $result->percentage;
        //     $test_id = $result->test_id;
        //     $test = Test::findOrFail($test_id);
        //     $result_table[$test->test_name][] = $result->percentage;
        // }

        // $average_percentage = round(($percentage/$total_test), 2);
        dd($results);
        // dd($result_table);
        return view('user.dashboard', ['tests' => $tests, 'total_test' => $total_test, 'percentage' => $average_percentage, 'result_table' => $result_table, 'results' => $results]);
    }

    /**
     * test start of the perticular test
     */
    public function test($id){
        $questions = Question::where('test_id', $id)->get();
        if($questions->isEmpty()){
            // dd('here');
            return redirect()->back()->with('error', 'Question are not present in this Test');
        }else{
            return view('user.test', ['questions' => $questions]);
        }
    }

    /**
     * Show Result of the given test
     */
    public function result(Request $request, $id){

        // dd($request);

        $test       = Test::findOrFail($id);
        $questions  = $test->questions;

        // if($test->questions->count() !== count($request->test))
        // {
        //     //Return back with error message : some of the question are remain to fill
        //     return redirect()->back()->with('error', 'Some of the question are remain to fill');
        // }

        $correct_question = 0;
        foreach ($request->test as $key => $test) {
            $questionId = $test['question'];
            if (!isset($test['answer']) || !$test['answer']) {
                return redirect()->back()->with('error-question', 'Some of the question are remain to fill');
            }
            $userAnswer = $test['answer'];

            // dd($questions);
            $question = $questions->where('id', $questionId)->first();
            if($test['answer'] === $question->answer)
            {
                $correct_question++;
            }
        }

        $percentage = round(($correct_question/$questions->count()) * 100, 2);

        $result = new Result;
        $result->test_id = $id;
        $result->user_id = auth()->id();
        $result->total_que = $questions->count();
        $result->right_que = $correct_question;
        $result->percentage = $percentage;
        $result->save();
        // dd('here');
        $result = [
            'total_question' => $questions->count(),
            'correct_answer' => $correct_question,
            'wrong_answer'   => $questions->count() - $correct_question,
            'percentage'     => $percentage
        ];
        return view('user.result', ['result' => $result]);
    }


}
