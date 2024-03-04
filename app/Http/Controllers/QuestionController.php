<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Test;

class QuestionController extends Controller
{
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
            'answer'  => "required",
            'test_id' => "required|exists:tests,id",
        ],[
            'required' => 'All fields are required.',
        ]);

        $question = Question::create([
            'question_name' => $request['question_name'],
            'option1'       => $request['option1'],
            'option2'       => $request['option2'],
            'option3'       => $request['option3'],
            'answer'        => $request['answer'],
            'test_id'       => $request['test_id'],
        ]);

        return redirect()->route('questions.index', ['id' => $request['test_id']])->with('success', 'Question inserted successfully');;
    }

    /**
     * Display the all the questions of the perticular test.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $questions              = Question::where('test_id', $id);
        $questions              = $questions->paginate(5);
        if($questions->isNotEmpty()){
            return view('admin.question.index', ['questions' => $questions]);
        }
        $test = Test::findOrFail($id);
        return view('admin.TestModule.view', ['test' => $test, 'error' => 'Questions not available in this test']);
    }

    /**
     * Display the specified question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id){
        $question = Question::findOrFail($id);
        return view('admin.question.view', compact('question'));
    }

    /**
     * Show the form for editing the specified question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.question.edit', ['question' => $question]);
    }

    /**
     * Update the specified question in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question_name' => "required",
            'option1'       => "required",
            'option2'       => "required",
            'option3'       => "required",
            'answer'        => "required",
        ], [
            'required' => 'All fields are required.',
        ]);
        $question = Question::findOrFail($id);
        $test_id  = $question->test_id;

        $question->update($request->only(['question_name', 'option1', 'option2', 'option3', 'answer']));
        return redirect()->route('questions.index', ['id' => $test_id])->with('success', 'Question updated successfully');
    }

    /**
     * Remove the specified question from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Question::find($id);
        if(!$data){
            return redirect()->route('test.index')->with('fail', 'We can not found data');;
        }
        $test_id = $data->test_id;
        $data->delete();
        return redirect()->route('questions.index', ['id' => $test_id])->with('success', 'Question deleted successfully');
    }
}
