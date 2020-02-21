<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CreateQuestion</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<form action="" method="post">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h1>作成画面</h1><a href="/menu" class="button">一覧に戻る</a>
        <p><input type="text" name="first_word" >とは<input type="text" name="second_word">である</p>
        <p>答え1：<textarea name="answer1" cols="50" rows="10"></textarea></p>
        <p>答え2：<textarea name="answer2" cols="50" rows="10"></textarea></p>
        
<p>答え3：<textarea name="answer3" cols="50" rows="10"></textarea></p>
        <p>
            <button type="submit"  class="submit-button">登録</button>
            <button type="button" class="submit-button" onclick="location.href='/question'" ></button>
            <button type="" class="submit-button"></button>
        </p>
    </form>
</body>
</html>