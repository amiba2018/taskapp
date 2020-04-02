<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;
use Log;

class Question extends Model
{
    protected $fillable = ["user_id", "first_word", "second_word"];

    public static function createQuestion($request)
    {
        DB::beginTransaction();
        DB::enableQueryLog();
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
            Log::debug('sql_debug_log', ['createQuestion' => DB::getQueryLog()]);
            DB::commit();
        } catch (\Exception $e) {
            report($e);
            DB::rollback();
        }
    }

    public static function updateQuestion($request, int $id)
    {
        DB::beginTransaction();
        DB::enableQueryLog();
        $question = Question::findOrFail($id);
        try {
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
            Log::debug('sql_debug_log', ['updateQuestion' => DB::getQueryLog()]);
            DB::commit();
        } catch (\Exception $e) {
            report($e);
            DB::rollback();
        }
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
