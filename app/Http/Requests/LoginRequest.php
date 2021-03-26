<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'phone' => ["required", "regex:/((8|\+7|\+3)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/"],
            "password" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "phone.required" => "Поле телефон обязательно для заполнения",
            "phone.regex" => "Неверно введён телефон",
            "password.required" => "Поле пароль обязательно для заполнения",
        ];
    }
}
