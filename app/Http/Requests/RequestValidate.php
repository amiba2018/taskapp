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
            "first_word" => "required|max:20",
            "second_word" => "required|max:20",
            "first_answer" => "required|max:40",
            "second_answer" => "nullable|max:40",
            "third_answer" => "nullable|max:40",
        ];
    }

    public function messages()
    {
        return [
            "first_word.required" => "必須項目です",
            "first_word.max" => "20文字以下で入力してくだい",
            "second_word.required" => "必須項目です",
            "second_word.max" => "20文字以下で入力してくだい",
            "first_answer.required" => "必須項目です",
            "first_answer.max" => "40文字以下で入力してくだい",
            "second_answer.max" => "40文字以下で入力してくだい",
            "third_answer.max" => "40文字以下で入力してくだい",
        ];
    } 
}
