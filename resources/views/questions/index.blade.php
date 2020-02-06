<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuestionApp</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <form action="" method="post">
                @csrf
                <h1>お題</h1><a href="/" class="button">一覧に戻る</a>
                @php
                var_dump($all_answers);
                @endphp
         
                <p>
                    <input type="submit" value="お気に入り登録">
                    <input type="submit" value="スキップ">
                    <input type="submit" value="模範解答">
                </p>
                
    </form>
</body>
</html>