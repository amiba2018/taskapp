@extends('layouts.header')
@section('title', 'Answer')
@section('content')
    @foreach($questions as $question)
    <div class="title">
    <span class="box-title">{{ App\User::getUserName($question->user_id) }}さんのお題</span>
        <div class="question"><h1>{{ $question->first_word }}とは{{ $question->second_word }}</h1></div>
        @foreach($question->answers as $answer)
        <div class="answers">
            <div class="first_answer">
                <p>{{ $answer->first_answer }}</p>
            </div>
            <div class="second_answer">
                <p>{{ $answer->second_answer }}</p>
            </div>
            <div class="third_answer">
                <p>{{ $answer->third_answer }}</p>
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
            </form>
            <form id="delete" action="/chart/{{ $question->id }}/{{ $answer->id }}" method="post">
            @method('DELETE')
            @csrf
            </form> 
        </div>
    </div>
    @endforeach
    @endforeach
    <div class="d-flex justify-content-center">
    {{ $questions->links() }}
    </div>
@endsection