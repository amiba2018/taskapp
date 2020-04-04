<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Log;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    // public function favorites()
    // {
    //     return $this->belongsToMany(Question::class, 'favorites', 'user_id', 'question_id')->withTimestamps();
    // }

    public function favorites()
    {
        return $this->belongsTo(Favorite::class);
    }

    public function favorite($question_id)
    {
        DB::beginTransaction();
        DB::enableQueryLog();
        try {
            $this->favorites()->attach($question_id);
            Log::debug('sql_debug_log', ['favorite' => DB::getQueryLog()]);
            DB::commit();
        } catch (\Exception $e) {
            report($e);
            DB::rollback();
        }
    }

    public function unfavorite($question_id)
    {
        DB::beginTransaction();
        DB::enableQueryLog();
        try {
            $this->favorites()->detach($question_id);
            Log::debug('sql_debug_log', ['unfavorite' => DB::getQueryLog()]);
            DB::commit();
        } catch (\Exception $e) {
            report($e);
            DB::rollback();
        }
    }

    public function is_favorite($question_id)
    {
        return $this->favorites()->where('question_id',$question_id)->exists();
    }



    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public static function getUserName($user_id) 
    {
        return User::where('id',$user_id)->value('name');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
