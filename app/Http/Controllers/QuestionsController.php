<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;
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

    public function index2(Request $request)
    {
        // {{ $question->user->value('name') }}
        // $question = Question::findOrFail(21);
        // $user_id = $question->user_id;
        // $abc = User::where('id',$user_id)->value('name');
        // dd($abc);
        $user_id = Auth::id();
        // $user_info = Auth::user();
        $questions = Question::all()->reverse()->values();
        // $user_questions = $user_info->questions->reverse()->values();
        // $user_questions = Question::all()->where('user_id',$user_id)->exists();
        // $user_questions = $user_info->questions->where('user_id',$user_id);
        // dd($user_questions);
        // $questions = Question::all();
        // dd($questions);
        $questions = $questions->diff(Question::whereIn('user_id', [$user_id])->get());
        $questions = new LengthAwarePaginator(
            $questions->forPage($request->page,3),
            count($questions),
            3,
            $request->page,
            array('path' => $request->url())
        );
        return view('questions.index2', ['questions' => $questions, 'next_question_id' => $this->next_question_id]);
    }

    public function storeFavorite(int $id)
    {
        Auth::user()->favorite($id);
        return back();
    }

    public function destroyFavorite($id)
    {
        Auth::user()->unfavorite($id);
        return back();
    }

    public function delete(int $Qid, int $Aid)
    {
        Question::destroy($Qid);
        Answer::destroy($Aid);
        return redirect('/chart');
    }

    public function question($id)
    {
        $question = Question::findOrFail($id);
        $exit = Auth::user()->favorites()->get(['user_id']);
        // $exit = Auth::user()->isUserFavorite(Auth::id());
        dd($exit);
        if(!Auth::user()->isUserFavorite(Auth::id())) {
            $Q_id = Auth::user()->favorites()->get(['question_id'])->random(1);
            return view('questions.question',['question' => $question, 'next_question_id' => $this->next_question_id, 'Q_id' => $Q_id]);
        }
        return view('questions.question',['question' => $question, 'next_question_id' => $this->next_question_id]);
    }

    public function answer(Request $request, $id)
    {
        $user_answers = $request->except('_token');
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

    public function favoriteQ($id)
    {
        $Q_id = Auth::user()->favorites()->get(['question_id'])->random(1);
        $question = Question::findOrFail($Q_id[0]['question_id']);
        return view('questions.favoriteQ',['question' => $question, 'Q_id' => $Q_id, 'next_question_id' => $this->next_question_id]);
    }

    public function favoriteA(Request $request, $id)
    {
        $Q_id = Auth::user()->favorites()->get(['question_id'])->random(1);
        $user_answers = $request->except('_token');
        $question = Question::findOrFail($id);
        $answers = $question->answers;
        return view('questions.favoriteA',['question' => $question, 'Q_id' => $Q_id,'answers' => $answers, 'user_answers' => $user_answers, 'next_question_id' => $this->next_question_id]);
    }
}
