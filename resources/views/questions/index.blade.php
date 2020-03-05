<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AnswersApp</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@csrf
    @foreach($question_words as $question_word)
    <div id="flexbox">
    <div class="box-item1"><input type="checkbox" name="question[]" value="{{ $question_word->id }}"><label>{{ $question_word->first_word }}とは{{ $question_word->second_word }}である</label></div>

    <div class="box-item"><button type="submit"  class="button">削除する</button></div>
    <div class="box-item"><button type="button"  class="button" onclick="location.href='/create'">編集する</button></div>
    </div>
    @foreach($question_word->answers as $answer)
    <p>{{ $answer->first_answer }}</p>
    @endforeach
    @endforeach
</body>
</html>