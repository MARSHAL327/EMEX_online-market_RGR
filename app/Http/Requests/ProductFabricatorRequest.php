<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFabricatorRequest extends FormRequest
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
            'name' => ["required"],
            'logo' => ["required"],
            'desc' => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Поле Название производителя обязательно для заполнения",
            "logo.required" => "Поле Лого производителя обязательно для заполнения",
            "desc.required" => "Поле Описание производителя обязательно для заполнения",
        ];
    }
}
