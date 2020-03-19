@extends('layouts.header')
@section('title', 'Answer')
@section('content')
    @foreach($user_questions as $question)
    <div class="title">
    <span class="box-title">問題</span>
        <div class="question"><h1>{{ $question->first_word }}とは{{ $question->second_word }}</h1></div>
        @foreach($question->answers as $answer)
        <div class="answers">
            <div class="first_answer">
                <p class="subtitle">解答</p>
                <textarea name="first_answer" cols="52" rows="2">{{ $answer->first_answer }}</textarea>
            </div>
            <div class="second_answer">
                <textarea name="second_answer" cols="52" rows="2">{{ $answer->second_answer }}</textarea>
            </div>
            <div class="third_answer">
                <textarea name="third_answer" cols="52" rows="2">{{ $answer->third_answer }}</textarea>
            </div>
        </div>
        <div class="btn">
        <form action="/{{ $question->id }}/{{ $answer->id }}" method="post">
        @method('DELETE')
        @csrf
            <button type="submit" class="submit-btn" onclick="return confirm('本当に削除します？')">削除</button>
            <button type="button" class="nav-btn" onclick="location.href='/edit/{{$question->id}}'">編集する</button>
            </form>
        </div>
    </div>
    @endforeach
    @endforeach
@endsection