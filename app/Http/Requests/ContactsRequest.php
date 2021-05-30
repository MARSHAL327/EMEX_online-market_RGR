<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
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
            "name" => ["required"],
            "email" => ["required"],
            "text" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Поле Имя обязательно для заполнения",
            "email.required" => "Поле Email обязательно для заполнения",
            "text.required" => "Поле Текст сообщения обязательно для заполнения",
        ];
    }
}
