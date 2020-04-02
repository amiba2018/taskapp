@extends('layouts.header')
@section('title', 'Question')
@section('content')
    <form action="/favorites/{{ $question->id }}/answer" method="post">
        @csrf
        <div class="title">
        <span class="box-title">お気に入りのお題</span>
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
            </div>
        </div>
    </form>
@endsection