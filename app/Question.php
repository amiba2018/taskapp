<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class Question extends Model
{
    protected $fillable = ["user_id", "first_word", "second_word"];

    public function answer()
    {
        return $this->hasOne(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    
    public static function createQuestion($request)
    {
        DB::beginTransaction();
        try {
                $question = Question::create([
                    "user_id"  => Auth::id(),
                    "first_word"  => $request->first_word,
                    "second_word"  => $request->second_word,
                ]);
                $answer = Answer::create([
                    "question_id"  => $question->id,
                    "first_answer"  => $request->first_answer,
                    "second_answer"  => $request->second_answer,
                    "third_answer"  => $request->third_answer,
                ]);
                DB::commit();
            } catch (\Exception $e) {
                report($e);
                DB::rollback();
            }
    }

    public static function updateQuestion($request, int $id)
    {
        DB::beginTransaction();
        $question = Question::findOrFail($id);
        try {
            $question->update([
                "first_word" => $request->first_word,
                "second_word" => $request->second_word,
            ]);
            $answers = $question->answer;
            $answers->update([
                "first_answer" => $request->first_answer,
                "second_answer" => $request->second_answer,
                "third_answer" => $request->third_answer,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            report($e);
            DB::rollback();
        }
    }

}
