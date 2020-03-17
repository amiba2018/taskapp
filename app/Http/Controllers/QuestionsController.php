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
        $user_info = Auth::user();
        
        $question_words = $user_info->questions;
        // dd($question_words);
        // $question_words = Question::select('id', 'first_word','second_word')->get();
        return view('questions.index', ['question_words' => $question_words]);
    }

    public function menu()
    {
        return view('questions.menu');
    }

    public function show($id)
    {
        $next_question_id = Question::get(['id'])->random(1);
        $question = Question::findOrFail($id);
        return view('questions.show',['question' => $question, 'next_question_id' => $next_question_id]);
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
	    return view('questions.create');
    }

    public function store(RequestValidate $request)
    {
        $question = Question::create([
            "user_id"  => Auth::id(),
            "first_word"  => $request->first_word,
            "second_word"  => $request->second_word,
        ]);

        Answer::create([
            "question_id"  => $question->id,
            "first_answer"  => $request->first_answer,
            "second_answer"  => $request->second_answer,
            "third_answer"  => $request->third_answer,
        ]);
        return redirect('/create');
    }

    public function edit(int $id)
    {
        $question = Question::findOrFail($id);
        $answers = $question->answers;
        return view('questions.edit',['question' => $question, 'answers' => $answers]);
    }

    public function update(Request $request, int $id)
    {
        $question = Question::findOrFail($id);
        $question->update([
            "first_word" => $request->first_word,
            "second_word" => $request->second_word,
        ]);
        $answers = $question->answers;
        $answers[0]->update([
            "first_answer" => $request->first_answer,
            "second_answer" => $request->second_answer,
            "third_answer" => $request->third_answer,
        ]);
        return redirect("/edit/{$id}");
    }
}
