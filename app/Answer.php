<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'first_answer', 'second_answer', 'third_answer'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
