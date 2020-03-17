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
    


    public function edit(int $id)
    {
        $question = Question::findOrFail($id);
        $answers = $question->answers;
        // dd(array($answers));
        // dd($answers->toArray());
        $answers->toArray();
        // dd($answers->toArray());
        return view('questions.questionEdit',['question' => $question, 'answers' => $answers]);
    }

    public function update(Request $request, int $id)
    {
        $question = Question::findOrFail($id);
        $question->first_word = $request->first_word;
        $question->second_word = $request->second_word;
        $question->update();

        $answers = Answer::where('question_id', $id)->get();
        $answer_keys = $answers->modelKeys();

        for($i = 0; $i < count($answer_keys); $i++) {
            $answer = Answer::findOrFail($answer_keys[$i]);
            if($i === 0) {
                $answer->answer = $request->answer0;
            }
            if($i === 1) {
                $answer->answer = $request->answer1;
            }
            if($i === 2) {
                $answer->answer = $request->answer2;
            }
            $answer->update();
        }

        // $add_answer1 = new Answer;
        // $add_answer1->answer = $request->answer1;
        // $add_answer1->question_id = $question->id;
        // $add_answer1->save();

        // $add_answer2 = new Answer;
        // $add_answer2->answer = $request->answer2;
        // $add_answer2->question_id = $question->id;
        // $add_answer2->save();

        // $answers4 = new Answer;
        // $answers4->answer = $request->answer5;
        // $answers4->question_id = $question->id;
        // $answers4->save();



        // $answer = Answer::findOrFail($answer_keys[1]);
        // $answer->answer = $request->answer2;
        // $answer->update();

        // $answer = Answer::findOrFail($answer_keys[2]);
        // $answer->answer = $request->answer3;
        // $answer->update();
        return redirect('/edit/' . $question->id);
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request, Question::$rules);
    //     // $question = new Question;
    //     // $form = $request->all();
    //     // unset($form['_token']);
    //     // $question->fill($form)->save();


    //     $validate = $request->validate([
    //         'first_word'    => 'required',
    //         'second_word' => 'required',
    //     ]);
    //     // $validate2 = $request->validate([
    //     //     'answers' => 'required',
    //     // ]);
    //     // データベースに登録
    //     Question::create($validate);
    //     // Answer::create($validate2);
        
    //     // 画面表示するURLにリダイレクト
    //     return redirect('/create');
    // }

}
