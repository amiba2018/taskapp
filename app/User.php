<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function isFavorite($question_id)
    {
        return $this->favorites()->where('question_id',$question_id)->exists();
    }

    public function isUserFavorite($user_id)
    {
        return $this->favorites()->where('user_id',$user_id)->exists();
    }

    public function isExistUserFavorite()
    {
        $auth_id = Auth::id();
        if (Auth::user()->isUserFavorite($auth_id)) {
            return Auth::user()->favorites()->get(['question_id'])->random(1);
        }
        else {
            return false;
        }
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
