<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskApp</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <p>{{ $task->first_word }}</p>
    <p>{{ $task->answer }}</p>
</body>
</html>