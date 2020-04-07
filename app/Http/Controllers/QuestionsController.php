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
use Log;

class QuestionsController extends Controller
{
    public $next_question_id;

    public function __construct() 
    {
        $this->next_question_id = Question::get(['id'])->random(1);
    }

    public function index(Request $request)
    {
        $user_questions = Auth::user()->questions->reverse()->values();
        $user_questions = new LengthAwarePaginator(
            $user_questions->forPage($request->page,3),
            count($user_questions),
            3,
            $request->page,
            array('path' => $request->url())
        );
        return view('questions.index', ['user_questions' => $user_questions, 'next_question_id' => $this->next_question_id]);
    }

    public function index2(Request $request)
    {
        $is_questions = Auth::user()->questions()->exists();
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
        return view('questions.index2', ['is_questions' => $is_questions,'questions' => $questions, 'next_question_id' => $this->next_question_id]);
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

    public function delete(int $Qid, int $Aid)
    {
        Question::destroy($Qid);
        Answer::destroy($Aid);
        return back();
    }

    public function question($id)
    {
        $question = Question::findOrFail($id);
        $Q_id = Auth::user()->jageUserFavorite();
        return view('questions.question',['question' => $question, 'next_question_id' => $this->next_question_id, 'Q_id' => $Q_id]);
    }

    public function answer(Request $request, $id)
    {
        $user_answers = $request->except('_token');
        $question = Question::findOrFail($id);
        $answers = $question->answer;
        $Q_id = Auth::user()->jageUserFavorite();
        return view('questions.answer',['question' => $question, 'answers' => $answers, 'user_answers' => $user_answers, 'next_question_id' => $this->next_question_id,'Q_id' => $Q_id]);
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
        $answers = $question->answer;
        return view('questions.edit',['question' => $question, 'answers' => $answers, 'next_question_id' => $this->next_question_id]);
    }

    public function update(Request $request, int $id)
    {
        Question::updateQuestion($request, $id);
        return redirect("/edit/{$id}");
    }

    public function favoriteQuestion($id)
    {
        $Q_id = Auth::user()->favorites()->get(['question_id'])->random(1);
        $question = Question::findOrFail($Q_id[0]['question_id']);
        return view('questions.favoriteQ',['question' => $question, 'Q_id' => $Q_id, 'next_question_id' => $this->next_question_id]);
    }

    public function favoriteAnswer(Request $request, $id)
    {
        $Q_id = Auth::user()->favorites()->get(['question_id'])->random(1);
        $user_answers = $request->except('_token');
        $question = Question::findOrFail($id);
        $answers = $question->answer;
        return view('questions.favoriteA',['question' => $question, 'Q_id' => $Q_id,'answers' => $answers, 'user_answers' => $user_answers, 'next_question_id' => $this->next_question_id]);
    }
}
