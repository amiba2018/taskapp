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
        <p>答え：<textarea name="first_answer" cols="52" rows="2">@foreach($answers as $answer){{ $answer->first_answer }}@endforeach</textarea></p>
        <p>答え：<textarea name="second_answer" cols="52" rows="2">@foreach($answers as $answer){{ $answer->second_answer }}@endforeach</textarea></p>
        <p>答え：<textarea name="third_answer" cols="52" rows="2">@foreach($answers as $answer){{ $answer->third_answer }}@endforeach</textarea></p>
        <p>
            <button type="button" class="submit-button" onclick="location.href='{{url('/question')}}'" >次の問題へ</button>
            <button type="submit" class="submit-button">更新</button>
        </p>
    </form>
</body>
</html>