@extends('layouts.header')
@section('title', 'favoriteAnswer')
@section('content')
    <div class="title">
    <span class="box-title">答え（お気に入り)</span>
        <div class="question"><h1>{{ $question->first_word }}とは{{ $question->second_word }}である</h1></div>
        <div class="answers">
            <div class="first_answer">
                <p class="subtitle">模範解答(お気に入り)</p>
                <p>{{ $answers->first_answer }}</p>
            </div>
            <div class="second_answer">
                <p>{{ $answers->second_answer }}</p>
            </div>
            <div class="third_answer">
                <p>{{ $answers->third_answer }}</p>
            </div>
            <div class="first_answer">
            @if(App\Answer::isExistUserAnswers($user_answers))
                <p class="subtitle">あなたの答え</p>
            @endif
                <p>{{ $user_answers['first_answer'] }}</p>
            </div>
            <div class="second_answer">
                <p>{{ $user_answers['second_answer'] }}</p>
            </div>
            <div class="third_answer">
                <p>{{ $user_answers['third_answer'] }}</p>
            </div>
        </div>
        <div class="btn">
            <button type="button" class="nav-btn" onclick="location.href='/questions/{{ $next_question_ids[0]['id'] }}'">次の問題へ</button>
            <button type="button"  class="nav-btn" onclick="location.href='/favorites/{{ $question_ids[0]['question_id'] }}'">お気に入りの問題へ</button>
        </div>
    </div>
@endsection