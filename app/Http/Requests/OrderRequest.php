<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'fio' => ["required", "regex:/^\w{1,}\s\w{1,}\s\w{1,}$/iu"],
            'phone' => ["required", "regex:/((8|\+7|\+3)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/"],
        ];
    }

    public function messages()
    {
        return [
            "fio.required" => "Поле ФИО обязательно для заполнения",
            "fio.regex" => "Поле ФИО должно содержать фамилию имя отчество",
            "phone.required" => "Поле телефон обязательно для заполнения",
            "phone.regex" => "Неверно введён телефон",
        ];
    }
}
