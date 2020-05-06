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

    public static function isExistUserAnswers($user_answers)
    {
        $answers_count = 0;
        foreach($user_answers as $user_answer) {
            if(!empty($user_answer)) {
                $answers_count++;
            }
        }
        if($answers_count === 0) {
            return false;
        }
        return true;
    }
}
