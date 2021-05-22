<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNewsRequest extends FormRequest
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
            "title" => ["required"],
            "desc" => ["required"],
            "text" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Поле Название новости обязательно для заполнения",
            "desc.required" => "Поле Описание новости обязательно для заполнения",
            "text.required" => "Поле Текст новости обязательно для заполнения",
        ];
    }
}
