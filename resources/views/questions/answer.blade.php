<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AnswersApp</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<form action="" method="">
    @csrf
        <h1>お題</h1><a href="/menu" class="button">一覧に戻る</a>
        <p>{{ $question->first_word }}とは{{ $question->second_word }}である</p>
        <p>答え：<textarea name="" cols="50" rows="10">{{$user_answers['answers']}}</textarea></p>
        <p><textarea name="" cols="50" rows="10">
            @foreach($answers as $answer)
            {{ $answer->answer}}
            @endforeach
        </textarea>
        </p>
        <p>
            <button type="submit"  class="submit-button">問題をお気に入り登録</button>
            <button type="button" class="submit-button" onclick="location.href='/questions/{{ $next_question_id[0]['id'] }}'" >次の問題へ</button>
            <button type="submit" class="submit-button"></button>
        </p>
    </form>
</body>
</html>