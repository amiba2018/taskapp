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
            "answer1" => "required|max:20",
            "answer2" => "nullable|max:20",
            "answer3" => "nullable|max:20",
        ];
    }

    public function messages()
    {
        return [
            "first_word.required" => "必須項目です",
            "first_word.max" => "20文字以下で入力してくだい",
            "second_word.required" => "必須項目です",
            "second_word.max" => "20文字以下で入力してくだい",
            "answer1.required" => "必須項目です",
            "answer1.max" => "20文字以下で入力してくだい",
            "answer2.max" => "20文字以下で入力してくだい",
            "answer3.max" => "20文字以下で入力してくだい",
        ];
    } 
}
