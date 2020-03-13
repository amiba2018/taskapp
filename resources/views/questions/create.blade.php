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
        <div class="question"><h1><input type="text" name="first_word" placeholder="キーワード" value="{{ old('first_word') }}" >とは
        <input type="text" name="second_word" placeholder="キーワード" value="{{ old('second_word') }}"></h1></div>
            @error('first_word')
            <p>{{ $message }}</p>
            @enderror
            @error('second_word')
            <p>{{ $message }}</p>
            @enderror
        <div class="answer">
            <div class="answer_1"><textarea name="answer1" placeholder="答えを入力してください" cols="63" rows="3">{{ old('answer1') }}</textarea>
            @error('answer1')
            <p>{{ $message }}</p>
            @enderror
            </div>
            <div class="answer_2"><textarea name="answer2" placeholder="答えを入力してください" cols="63" rows="3">{{ old('answer2') }}</textarea>
            @error('answer2')
            <p>{{ $message }}</p>
            @enderror
            </div>
            <div class="answer_3">
            <textarea name="answer3" placeholder="答えを入力してください" cols="63" rows="3">{{ old('answer3') }}</textarea>
            @error('answer3')
            <p>{{ $message }}</p>
            @enderror
            </div>
        </div>
        <div class="btn">
            <button type="submit"  class="submit-btn">作成</button>
            <button type="button" class="nav-btn" onclick="location.href='/menu'" >戻る</button>
        </div>
    </div>
    </form>
</body>
</html>