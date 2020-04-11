<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

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
        try {
                Favorite::create([
                "user_id"  => Auth::id(),
                "question_id"  => $question_id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            report($e);
            DB::rollback();
        }
    }
}
