<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskApp</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div>
    @foreach($words as $word)
        <ul>
            <li>{{$word->getData()}}</li>
        </ul>
    @endforeach
    </div>
</body>
</html>