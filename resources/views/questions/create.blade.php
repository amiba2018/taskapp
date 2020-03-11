<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CreateQuestion</title>
    <link rel="stylesheet" href="{{ asset('css/styleA.css') }}">
</head>
<body>
<form action="" method="post">
    @csrf
    <div class="title">
    <span class="box-title">作成</span>
        <p class="question"><input type="text" name="first_word" placeholder="キーワード" value="{{ old('first_word') }}" >とは
        <input type="text" name="second_word" placeholder="キーワード" value="{{ old('second_word') }}"></p>
            @error('first_word')
            <p>{{ $message }}</p>
            @enderror
            @error('second_word')
            <p>{{ $message }}</p>
            @enderror
        <div class="answer">
            <p><textarea name="answer1" placeholder="答えを入力してください" cols="63" rows="15">{{ old('answer1') }}</textarea></p>
            @error('answer1')
            <p>{{ $message }}</p>
            @enderror
            <p><textarea name="answer2" placeholder="答えを入力してください" cols="63" rows="15">{{ old('answer2') }}</textarea></p>
            @error('answer2')
            <p>{{ $message }}</p>
            @enderror
            <p><textarea name="answer3" placeholder="答えを入力してください" cols="63" rows="15">{{ old('answer3') }}</textarea></p>
            @error('answer3')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <p class="btn">
            <button type="submit"  class="submit-btn">作成</button>
            <button type="button" class="nav-btn" onclick="location.href='/question'" >戻る</button>
        </p>
    </div>
    </form>
</body>
</html>