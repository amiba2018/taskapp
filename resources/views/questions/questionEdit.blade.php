<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AnswersApp</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<form action="/edit/{{ $question->id }}"  method="post">
    @csrf
    @method('PUT')
        <h1>お題</h1><a href="{{url('/menu')}}" class="button">一覧に戻る</a>
        <p><input type="text" name="first_word" value="{{ $question->first_word }}">とは<input type="text" name="second_word" value="{{ $question->second_word }}">である</p>
    @for ($i = 0; $i < 3; $i++)
        <p>答え：<textarea name="answer{{ $i }}" cols="20" rows="10">@if(!empty($answers[$i])){{ $answers[$i]["answer"] }}@endif</textarea></p>
    @endfor
        <p>
            <button type=""  class="submit-button">お気に入り登録</button>
            <button type="button" class="submit-button" onclick="location.href='{{url('/question')}}'" >次の問題へ</button>
            <button type="submit" class="submit-button">更新</button>
        </p>
    </form>
</body>
</html>