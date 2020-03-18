@extends('layouts.header')
@section('title', 'Question')
@section('content')
    <form action="/questions/{{ $question->id }}/answer" method="post">
        @csrf
        <div class="title">
        <span class="box-title">お題</span>
            <div class="question"><h1>{{ $question->first_word }}とは{{ $question->second_word }}である</h1></div>
            <div class="answers">
                <div class="first_answer">
                    <textarea name="first_answer" placeholder="答えを入力してください" cols="52" rows="2">{{ old('first_answer') }}</textarea>
                    @error('first_answer')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="second_answer">
                    <textarea name="second_answer" placeholder="答えを入力してください" cols="52" rows="2">{{ old('second_answer') }}</textarea>
                    @error('second_answer')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="third_answer">
                    <textarea name="third_answer" placeholder="答えを入力してください" cols="52" rows="2">{{ old('third_answer') }}</textarea>
                    @error('third_answer')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="btn">
                <button type="submit"  class="submit-btn">模範解答</button>
                <button type="button" onclick="location.href='/questions/{{ $next_question_id[0]['id'] }}'" class="button">次の問題へ</button>
                <button type="button" class="nav-btn" onclick="location.href='/menu'" >戻る</button>
            </div>
        </div>
    </form>
@endsection