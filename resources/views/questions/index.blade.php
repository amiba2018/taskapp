@extends('layouts.header')
@section('title', 'Answer')
@section('content')
    @foreach($user_questions as $question)
    <div class="title">
    <span class="box-title">解答</span>
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
    <div class="d-flex justify-content-center">
    {{ $user_questions->links() }}
    </div>
    
@endsection