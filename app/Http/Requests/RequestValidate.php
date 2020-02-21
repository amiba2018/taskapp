<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_word" => "required|max:3",
            "second_word" => "required",
            "answer1" => "required|max:100",
            "answer2" => "required",
            "answer3" => "required",
        ];
    }

    public function messages()
    {
        return [
            // "" => "koooo",
            "first_word.max" => "３文字以内で入力してくだい",
        ];
    } 
}
