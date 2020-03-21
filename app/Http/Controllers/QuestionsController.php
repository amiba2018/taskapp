<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestValidate;

class QuestionsController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $next_question_id = Question::get(['id'])->random(1);
        $user_info = Auth::user();
        $user_questions = $user_info->questions->reverse()->values()->forPage(1, 3);
        return view('questions.index', ['user_questions' => $user_questions, 'next_question_id' => $next_question_id]);
    }

    public function delete(int $Qid, int $Aid)
    {
        Question::destroy($Qid);
        Answer::destroy($Aid);
        return redirect('/');
    }

    public function question($id)
    {
        $next_question_id = Question::get(['id'])->random(1);
        $question = Question::findOrFail($id);
        return view('questions.question',['question' => $question, 'next_question_id' => $next_question_id]);
    }

    public function answer(Request $request, $id)
    {
        $next_question_id = Question::get(['id'])->random(1);
        $user_answers = $request->all();
        $question = Question::findOrFail($id);
        $answers = $question->answers;
        return view('questions.answer',['question' => $question, 'answers' => $answers, 'user_answers' => $user_answers, 'next_question_id' => $next_question_id]);
    }

    public function create()
	{
        $next_question_id = Question::get(['id'])->random(1);
	    return view('questions.create',['next_question_id' => $next_question_id]);
    }

    public function store(RequestValidate $request)
    {
        Question::createQuestion($request);
        return redirect('/create');
    }

    public function edit(int $id)
    {
        $next_question_id = Question::get(['id'])->random(1);
        $question = Question::findOrFail($id);
        $answers = $question->answers;
        return view('questions.edit',['question' => $question, 'answers' => $answers, 'next_question_id' => $next_question_id]);
    }

    public function update(Request $request, int $id)
    {
        Question::updateQuestion($request, $id);
        return redirect("/edit/{$id}");
    }
}
