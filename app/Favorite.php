<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function questions()
    {
        return $this->hasMany(Question::class, 'user_id', 'question_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function questions()
    // {
    //     return $this->belongsToMany(Question::class)->withTimestamps();
    // }

    public function isUserFavorite($user_id)
    {
        // return $this->favorites->where('user_id',$user_id)->exists();
        $exit = $this->favorites;
        // $exit = $this->favorites->where('user_id',$user_id);
        // $exit = $this->favorites()->get(['user_id']);
        dd($exit);
        if(!$exit) {
            return false;
        }
        dd($exit);
        return true;
    }
}
