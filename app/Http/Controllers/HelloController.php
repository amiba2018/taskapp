<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
// use DB;

class HelloController extends Controller
{

    public function index()
    {
        // Taskモデルを使ってデータを全て取得します。
        $words = Question::all();
        return view('questions.index', ['words' => $words]);
    }
    // 'first_word', '恋愛'
    public function getData() 
    {
        return $this->words;
    }
}
