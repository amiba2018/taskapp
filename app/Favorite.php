<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function questions()
    // {
    //     return $this->belongsToMany(Question::class)->withTimestamps();
    // }
}
