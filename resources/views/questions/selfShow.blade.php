@extends('layouts.header')
@section('title', 'selfShow')
@section('content')
    @foreach($user_questions as $question)
    <div class="title">
    <span class="box-title">あなたのお題</span>
        <div class="question"><h1>{{ $question->first_word }}とは{{ $question->second_word }}</h1></div>
        <div class="answers">
            <div class="first_answer">
                <p>{{ $question->answer->first_answer }}</p>
            </div>
            <div class="second_answer">
                <p>{{ $question->answer->second_answer }}</p>
            </div>
            <div class="third_answer">
                <p>{{ $question->answer->third_answer }}</p>
            </div>
        </div>
        <div class="btn">

            @if (Auth::user()->is_favorite($question->id))
            <form action="/chart/{{ $question->id }}" method="post">
            @method('DELETE')
            @csrf
                <button type="submit" class="submit-btn">お気に入り解除</button>
            @else
            <form action="/chart/{{ $question->id }}" method="post">
            @method('POST')
            @csrf
                <button type="submit" class="submit-btn">お気に入り登録</button>
            @endif
                <button type="button" class="nav-btn" onclick="location.href='/question/edit/{{$question->id}}'">編集する</button>
                <button form="delete" type="submit" class="nav-btn" onclick="return confirm('本当に削除します？')">削除する</button>
            </form>
            <form id="delete" action="/chart/{{ $question->id }}/{{ $question->answer->id }}" method="post">
            @method('DELETE')
            @csrf
            </form> 
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center">
    {{ $user_questions->links() }}
    </div>
@endsection