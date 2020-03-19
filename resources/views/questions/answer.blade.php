@extends('layouts.header')
@section('title', 'Answer')
@section('content')
    <div class="title">
    <span class="box-title">答え</span>
        <div class="question"><h1>{{ $question->first_word }}とは{{ $question->second_word }}である</h1></div>
        <div class="answers">
            <div class="first_answer">
                <p class="subtitle">模範解答</p>
                <textarea name="first_answer" cols="52" rows="2">@foreach($answers as $answer){{ $answer->first_answer }}@endforeach</textarea>
            </div>
            <div class="second_answer">
                <textarea name="second_answer" cols="52" rows="2">@foreach($answers as $answer){{ $answer->second_answer }}@endforeach</textarea>
            </div>
            <div class="third_answer">
                <textarea name="third_answer" cols="52" rows="2">@foreach($answers as $answer){{ $answer->third_answer }}@endforeach</textarea>
            </div>
            <div class="first_answer">
                <p class="subtitle">あなたの答え</p>
                <textarea name="first_answer" cols="52" rows="2">{{ $user_answers['first_answer'] }}</textarea>
            </div>
            <div class="second_answer">
                <textarea name="second_answer" cols="52" rows="2">{{ $user_answers['second_answer'] }}</textarea>
            </div>
            <div class="third_answer">
                <textarea name="third_answer" cols="52" rows="2">{{ $user_answers['third_answer'] }}</textarea>
            </div>
        </div>
        <div class="btn">
            <button type="button" onclick="location.href='/questions/{{ $next_question_id[0]['id'] }}'" class="button">次の問題へ</button>
            <button type="button" class="nav-btn" onclick="location.href='/menu'" >戻る</button>
        </div>
    </div>
@endsection