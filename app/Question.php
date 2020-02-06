<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'user_questions';

    public function answers()
    {
        return $this->hasMany(Answer::class ,'user_question_id');
    }

    public function getData() 
    {
        return $this->first_word;
    }
}
