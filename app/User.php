<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function favorites()
    {
        return $this->belongsToMany(Question::class, 'favorites', 'user_id', 'question_id')->withTimestamps();
    }

    public function favorite($question_id)
    {
        $exist = $this->is_favorite($question_id);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($question_id);
            return true;
        }
    }

    public function unfavorite($question_id)
    {
        $exist = $this->is_favorite($question_id);

        if($exist){
            $this->favorites()->detach($question_id);
            return true;
        }else{
            return false;
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
