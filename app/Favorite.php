<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;
use Log;

class Favorite extends Model
{
    protected $fillable = ["user_id", "question_id"];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function addFavorite($question_id)
    {
        DB::beginTransaction();
        DB::enableQueryLog();
        try {
                Favorite::create([
                "user_id"  => Auth::id(),
                "question_id"  => $question_id,
            ]);
            Log::debug('sql_debug_log', ['addFavorite' => DB::getQueryLog()]);
            DB::commit();
        } catch (\Exception $e) {
            report($e);
            DB::rollback();
        }
    }
}
