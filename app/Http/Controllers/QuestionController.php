<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
// use DB;

class QuestionController extends Controller
{

    public function index()
    {
        $words = Question::find(1);
        return view('questions.index', ['words' => $words]);
    }

    public function allAnswer()
    {
        $all_answers = Question::with('answers:user_question_id,answer')->find(1);
        return view('questions.index', ['answers' => $all_answers]);
    }



    public function show()
    {
        // Taskモデルを使って id = 1 のデータを取得します。
        // １つのデータのため、変数名は単数形にしています。
        $task = Question::find(1);
        return view('questions.show', ['task' => $task]);
    }
}
