<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // protected $fillable = ['first_word', 'second_word'];


    // protected $table = 'user_questions';
    // protected $guarded = array('id', 'created_at', 'updated_at');

    // public static $rules = array(
    //         'first_word'    => 'required',
    //         'second_word' => 'required',        
    // );

    // public function answers()
    // {
    //     return $this->hasMany(Answer::class);
    // }

    // public function getData() 
    // {
    //     return $this->first_word;
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
