@extends('layouts.header')
@section('title', 'Edit')
@section('content')
<form action="/question/edit/{{ $question->id }}"  method="post">
        @csrf
        @method('PUT')
        <div class="title">
        <span class="box-title">編集</span>
            <div class="question"><h1><input type="text" name="first_word" placeholder="キーワード" value="{{ $question->first_word }}">とは
            <input type="text" name="second_word" placeholder="キーワード" value="{{ $question->second_word }}"></h1></div>
                @error('first_word')
                <p>{{ $message }}</p>
                @enderror
                @error('second_word')
                <p>{{ $message }}</p>
                @enderror
            <div class="answers">
                <div class="first_answer">
                    <textarea name="first_answer" placeholder="答えを入力してください" cols="52" rows="2">{{ $answers->first_answer }}</textarea>
                    @error('first_answer')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="second_answer">
                    <textarea name="second_answer" placeholder="答えを入力してください" cols="52" rows="2">{{ $answers->second_answer }}</textarea>
                    @error('second_answer')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="third_answer">
                    <textarea name="third_answer" placeholder="答えを入力してください" cols="52" rows="2">{{ $answers->third_answer }}</textarea>
                    @error('third_answer')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="btn">
                <button type="submit"  class="submit-btn">更新</button>
                <button type="button" class="nav-btn" onclick="location.href='/authchart'" >戻る</button>
            </div>
        </div>
    </form>
@endsection