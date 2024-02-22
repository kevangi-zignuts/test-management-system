<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Test;

class QuestionController extends Controller
{
    /**
     * Show all the tests to add question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();
        return view('admin.test-index', ['tests' => $tests]);
    }

    /**
     * Show the form for adding a new question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.question.create', ['id' => $id]);
    }

    /**
     * Store a newly added question in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_name' => "required",
            'option1' => "required",
            'option2' => "required",
            'option3' => "required",
            'answer' => "required",
        ]);

        $question = new Question;
        $question->question_name = $request['question_name'];
        $question->option1 = $request['option1'];
        $question->option2 = $request['option2'];
        $question->option3 = $request['option3'];
        $question->answer = $request['answer'];
        $question->test_id = $request['test_id'];
        $question->save();

        return redirect()->route('create')->with('success', 'Test inserted successfully');;
    }

    /**
     * Display the all the questions in the perticular test.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questions = Question::all();
        return view('admin.question.index', ['questions' => $questions]);
    }

    /**
     * Display the specified test.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id){
        $question = Question::findOrFail($id);
        return view('admin.question.view', compact('question'));
    }

    /**
     * Show the form for editing the specified test.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.question-edit', ['question' => $question]);
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
            'question_name' => "required",
            'option1' => "required",
            'option2' => "required",
            'option3' => "required",
            'answer' => "required",
        ]);
        $question = Question::findOrFail($id);
        $question->update($request->only(['question_name', 'option1', 'option2', 'option3']));
        return redirect()->route('questions.show')->with('success', 'Test updated successfully');
    }
}
