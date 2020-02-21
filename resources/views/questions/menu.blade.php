<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>メニュー</h1>
    <div class = "select_button"><button type="button" onclick="location.href='{{url('/question')}}'">問題</button></div>
    <div class = "select_button"><button type="button" onclick="location.href='{{url('/create')}}'">作成</button></div>
    <div class = "select_button"><button type="button" onclick="location.href='{{url('/question')}}'">お気に入り登録</button></div>
    <div class = "select_button"><button type="button" onclick="location.href='{{url('/question')}}'">問題追加</button></div>
    <div class = "select_button"><button type="button" onclick="location.href='{{url('/question')}}'">みんなのお題</button></div>
</body>
</html>