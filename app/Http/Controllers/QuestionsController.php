<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;
use App\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestValidate;
use Illuminate\Pagination\LengthAwarePaginator;

class QuestionsController extends Controller
{
    public $next_question_ids;

    public function __construct() 
    {
        $this->next_question_ids = Question::get(['id'])->random(1);
    }

    //ログインユーザーの問題と答えの一覧を表示する
    public function selfShow(Request $request)
    {
        $user_questions = Auth::user()->questions->reverse()->values();
        $user_questions = new LengthAwarePaginator(
            $user_questions->forPage($request->page,3),
            count($user_questions),
            3,
            $request->page,
            array('path' => $request->url())
        );
        return view('questions.selfShow', ['user_questions' => $user_questions, 'next_question_ids' => $this->next_question_ids]);
    }

    //ログインユーザー以外の問題と答えの一覧を表示する
    public function show(Request $request)
    {
        $user_id = Auth::id();
        $questions = Question::all()->reverse()->values();
        $questions = $questions->diff(Question::whereIn('user_id', [$user_id])->get());
        $questions = new LengthAwarePaginator(
            $questions->forPage($request->page,3),
            count($questions),
            3,
            $request->page,
            array('path' => $request->url())
        );
        return view('questions.show', ['questions' => $questions, 'next_question_ids' => $this->next_question_ids]);
    }

    public function storeFavorite(int $id)
    {
        Favorite::addFavorite($id);
        return back();
    }

    public function destroyFavorite($id)
    {
        $user_id = Auth::id();
        $favorite_id = Favorite::where('user_id', $user_id)->where('question_id', $id)->value('id'); 
        Favorite::destroy($favorite_id);
        return back();
    }

    public function delete(int $question_id, int $answer_id)
    {
        Question::destroy($question_id);
        Answer::destroy($answer_id);
        return back();
    }

    public function question(int $id)
    {
        $questions = Question::all();
        $question = Question::findOrFail($id);
        $question_ids = Auth::user()->isExistUserFavorite();
        return view('questions.question',['question' => $question,'questions' => $questions, 'next_question_ids' => $this->next_question_ids, 'question_ids' => $question_ids]);
    }

    public function answer(Request $request, int $id)
    {
        //ユーザーの答えを一つ一つ空かどうか確認したいので、tokenを取り除いた変数をviewに渡す
        $user_answers = $request->except('_token');
        $question = Question::findOrFail($id);
        $answers = $question->answer;
        $question_ids = Auth::user()->isExistUserFavorite();
        return view('questions.answer',['question' => $question, 'answers' => $answers, 'user_answers' => $user_answers, 'next_question_ids' => $this->next_question_ids,'question_ids' => $question_ids]);
    }

    public function create()
	{
	    return view('questions.create',['next_question_ids' => $this->next_question_ids]);
    }

    public function store(RequestValidate $request)
    {
        Question::createQuestion($request);
        return redirect('/question/create');
    }

    public function edit(int $id)
    {
        $question = Question::findOrFail($id);
        $answers = $question->answer;
        return view('questions.edit',['question' => $question, 'answers' => $answers, 'next_question_ids' => $this->next_question_ids]);
    }

    public function update(RequestValidate $request, int $id)
    {
        Question::updateQuestion($request, $id);
        return redirect("/authchart");
    }

    public function favoriteQuestion(int $id)
    {
        $question_ids = Auth::user()->favorites()->get(['question_id'])->random(1);
        $question = Question::findOrFail($question_ids[0]['question_id']);
        return view('questions.favoriteQuestion',['question' => $question, 'question_ids' => $question_ids, 'next_question_ids' => $this->next_question_ids]);
    }

    public function favoriteAnswer(Request $request, $id)
    {
        $question_ids = Auth::user()->favorites()->get(['question_id'])->random(1);
        //ユーザーの答えを一つ一つ空かどうか確認したいので、tokenを取り除いた変数をviewに渡す
        $user_answers = $request->except('_token');
        $question = Question::findOrFail($id);
        $answers = $question->answer;
        return view('questions.favoriteAnswer',['question' => $question, 'question_ids' => $question_ids,'answers' => $answers, 'user_answers' => $user_answers, 'next_question_ids' => $this->next_question_ids]);
    }
}
