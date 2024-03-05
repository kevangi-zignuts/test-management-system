<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\Result;
use App\Models\UserTest;
use Carbon\Carbon;

class UsersController extends Controller
{
    /**
     * Display Dashboard of the perticular user
     */
    public function index(Request $request){
        $tests                = Test::all();
        $userId               = auth()->id();
        $results              = Result::with('test')->where('user_id', $userId)->latest('created_at');
        if($request->filled(['start_date', 'end_date'])){
            $startDate           = Carbon::parse($request->start_date);
            $endDate             = Carbon::parse($request->end_date);
            $results             = Result::whereBetween('created_at', [$startDate, $endDate]);
        }
        $result               = Result::with('test')->where('user_id', $userId);
        $total_test           = $result->count();
        $results              = $results->paginate(5);
        $results->appends($request->except('page'));
        $totalSumOfPercentage = Result::where('user_id', $userId)->sum('percentage');
        if($total_test != 0){
            $average_percentage = round(($totalSumOfPercentage/$total_test), 2);
        }else{
            $average_percentage = 0;
        }

        return view('user.dashboard', ['tests' => $tests, 'total_test' => $total_test, 'percentage' => $average_percentage, 'results' => $results]);
    }

    /**
     * test start of the perticular test
     */
    public function test($id){
        $questions = Question::where('test_id', $id)->get();
        if($questions->isEmpty()){
            return redirect()->back()->with('error', 'Question are not present in this Test');
        }
        return view('user.test', ['questions' => $questions]);
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

        $request->validate([
            'test' => "required",
        ]);


        $correct_question = 0;
        foreach ($request->test as $key => $test) {
            $questionId = $test['question'];
            if (!isset($test['answer']) || !$test['answer']) {
                return redirect()->back()->with('error-question', 'Some of the question are remain to fill');
            }

            $userAnswer = $test['answer'];
            $question   = $questions->where('id', $questionId)->first();
            if($test['answer'] === $question->answer)
            {
                $correct_question++;
            }
        }

        $percentage = round(($correct_question/$questions->count()) * 100, 2);

        $result = Result::create([
            'test_id'    => $id,
            'user_id'    => auth()->id(),
            'total_que'  => $questions->count(),
            'right_que'  => $correct_question,
            'percentage' => $percentage,
        ]);
        $resultId = $result->id;
        // dd($result->id);
        foreach ($request->test as $key => $test){
            $questionId = $test['question'];
            $userTest = UserTest::create([
                'user_id'     => auth()->id(),
                'test_id'     => $id,
                'question_id' => $questionId,
                'result_id'   => $resultId,
                'option'      => $test['answer'],
            ]);
        }

        $result = [
            'total_question' => $questions->count(),
            'correct_answer' => $correct_question,
            'wrong_answer'   => $questions->count() - $correct_question,
            'percentage'     => $percentage
        ];
        return view('user.result', ['result' => $result]);
    }

    public function view($id){
        $submittedTests = UserTest::with('question')->where('result_id', $id)->get();

        // dd($submittedTests);
        return view('user.viewSubmittedTest', ['submittedTests' => $submittedTests]);
    }
}




