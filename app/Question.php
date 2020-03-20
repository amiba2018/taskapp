<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    protected $fillable = ["user_id", "first_word", "second_word"];


    public static function createQuestion($request)
    {
        $question = Question::create([
            "user_id"  => Auth::id(),
            "first_word"  => $request->first_word,
            "second_word"  => $request->second_word,
        ]);

        Answer::create([
            "question_id"  => $question->id,
            "first_answer"  => $request->first_answer,
            "second_answer"  => $request->second_answer,
            "third_answer"  => $request->third_answer,
        ]);
    }

    public static function updateQuestion($request, int $id)
    {
        $question = Question::findOrFail($id);
        $question->update([
                "first_word" => $request->first_word,
                "second_word" => $request->second_word,
            ]);
        $answers = $question->answers;
        $answers[0]->update([
                "first_answer" => $request->first_answer,
                "second_answer" => $request->second_answer,
                "third_answer" => $request->third_answer,
            ]);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
