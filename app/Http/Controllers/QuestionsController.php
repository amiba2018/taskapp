<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestValidate;
use Illuminate\Pagination\LengthAwarePaginator;

class QuestionsController extends Controller
{
    public $next_question_id;

    public function __construct() 
    {
        $this->next_question_id = Question::get(['id'])->random(1);
    }

    public function index(Request $request)
    {
        $user_info = Auth::user();
        $user_questions = $user_info->questions->reverse()->values();
        $user_questions = new LengthAwarePaginator(
            $user_questions->forPage($request->page,3),
            count($user_questions),
            3,
            $request->page,
            array('path' => $request->url())
        );
        return view('questions.index', ['user_questions' => $user_questions, 'next_question_id' => $this->next_question_id]);
    }

    public function delete(int $Qid, int $Aid)
    {
        Question::destroy($Qid);
        Answer::destroy($Aid);
        return redirect('/');
    }

    public function question($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.question',['question' => $question, 'next_question_id' => $this->next_question_id]);
    }

    public function answer(Request $request, $id)
    {
        $user_answers = $request->all();
        $question = Question::findOrFail($id);
        $answers = $question->answers;
        return view('questions.answer',['question' => $question, 'answers' => $answers, 'user_answers' => $user_answers, 'next_question_id' => $this->next_question_id]);
    }

    public function create()
	{
	    return view('questions.create',['next_question_id' => $this->next_question_id]);
    }

    public function store(RequestValidate $request)
    {
        Question::createQuestion($request);
        return redirect('/create');
    }

    public function edit(int $id)
    {
        $question = Question::findOrFail($id);
        $answers = $question->answers;
        return view('questions.edit',['question' => $question, 'answers' => $answers, 'next_question_id' => $this->next_question_id]);
    }

    public function update(Request $request, int $id)
    {
        Question::updateQuestion($request, $id);
        return redirect("/edit/{$id}");
    }
}
