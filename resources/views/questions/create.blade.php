@extends('layouts.header')
@section('title', 'Create')
@section('content')
    <form action="/question/create" method="post">
        @csrf
        <div class="title">
        <span class="box-title">作成</span>
            <div class="question"><h1><input type="text" name="first_word" placeholder="キーワード" value="{{ old('first_word') }}" >とは
            <input type="text" name="second_word" placeholder="キーワード" value="{{ old('second_word') }}"></h1></div>
                @error('first_word')
                <p>{{ $message }}</p>
                @enderror
                @error('second_word')
                <p>{{ $message }}</p>
                @enderror
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
                <button type="submit"  class="submit-btn">作成</button>
            </div>
        </div>
    </form>
@endsection