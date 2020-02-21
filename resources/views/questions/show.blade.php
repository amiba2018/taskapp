<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuestionApp</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="header">
        <h1>お題</h1>
    </div>
    <div class="main">
        <div class="back"><a href="/menu" class="button">一覧に戻る</a></div>
        <form action="/questions/{{ $question->id }}/answer" method="post" class="question-form">
            @csrf
            <p>{{ $question->first_word }}とは{{ $question->second_word }}である</p>
            <label>答え：</label>
            <textarea name="answers" cols="50" rows="10"></textarea>
            <div class="buttons">
            <button type=""  class="button">お気に入り登録</button>
            <button type="button" onclick="location.href='/questions/{{ $next_question_id[0]['id'] }}'" class="button">次の問題へ</button>
            <button type="submit" class="button">模範解答</button>
            </div>
        </form>
    </div>    
</body>
</html>