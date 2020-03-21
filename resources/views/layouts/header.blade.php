<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <ul>
        <li><a href="/questions/{{ $next_question_id[0]['id'] }}">新しいお題</a></li>
        <li><a href='/create'>作成</a></li>
        <li><a href='/'>一覧</a></li>
        <li class="login"><a href="/login">ログイン</a></li>
    </ul>
</head>
<body>
@yield('content')
</body>
</html>