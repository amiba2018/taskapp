<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AnswersApp</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <ul>
    @foreach($question_words as $question_word)
    <li>{{ $question_word->first_word }}</li>
    <li>{{ $question_word->second_word }}</li>
  @foreach($question_word->answers as $answer)
    <li>{{ $answer->answer }}</li>
  @endforeach
  @endforeach
    </ul>
</body>
</html>