@extends('layouts.header')
@section('title', 'Answer')
@section('content')
    <div class="title">
    <span class="box-title">答え（お気に入り)</span>
        <div class="question"><h1>{{ $question->first_word }}とは{{ $question->second_word }}である</h1></div>
        <div class="answers">
            <div class="first_answer">
                <p class="subtitle">模範解答(お気に入り)</p>
                <p>@foreach($answers as $answer){{ $answer->first_answer }}@endforeach</p>
            </div>
            <div class="second_answer">
                <p>@foreach($answers as $answer){{ $answer->second_answer }}@endforeach</p>
            </div>
            <div class="third_answer">
                <p>@foreach($answers as $answer){{ $answer->third_answer }}@endforeach</p>
            </div>
            <div class="first_answer">
                <p class="subtitle">あなたの答え</p>
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
            <!-- <button type="button" onclick="location.href='/questions/{{ $next_question_id[0]['id'] }}'" class="button">次の問題へ</button> -->
            <!-- <button type="button" class="nav-btn" onclick="location.href='/menu'" >戻る</button> -->
        </div>
    </div>
@endsection