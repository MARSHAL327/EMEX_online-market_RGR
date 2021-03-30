<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutoModelRequest extends FormRequest
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
            "brand_id" => ["required"],
            "model_name" => ["required"],
            "img" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "brand_id.required" => "Поле Бренд автомобиля обязательно для заполнения",
            "model_name.required" => "Поле Название модели обязательно для заполнения",
            "img.required" => "Поле Картинка модели обязательно для заполнения",
        ];
    }
}
