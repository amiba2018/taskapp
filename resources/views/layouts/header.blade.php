<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <ul>
        <li class="active"><a href="/questions/{{ $next_question_ids[0]['id'] }}">お題</a></li>
        <li><a href='/question/create'>作成</a></li>
        <li><a href='/chart'>みんなの一覧</a></li>
        <li><a href='/authchart'>あなたの一覧</a></li>
        <li class="login"><a href="/login">ログアウト</a></li>
    </ul>
</head>
<body>
@yield('content')
</body>
</html>