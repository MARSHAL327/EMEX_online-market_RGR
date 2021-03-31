<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModificationRequest extends FormRequest
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
            "model_id" => ["required"],
            "modification_name" => ["required"],
            "engine_type" => ["required"],
            "engine_model" => ["required"],
            "engine_volume" => ["required"],
            "power" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "model_id.required" => "Поле Выбор модели обязательно для заполнения",
            "modification_name.required" => "Поле Название модификации обязательно для заполнения",
            "engine_type.required" => "Поле Тип двигателя обязательно для заполнения",
            "engine_model.required" => "Поле Модель двигателя обязательно для заполнения",
            "engine_volume.required" => "Поле Объём двигателя обязательно для заполнения",
            "power.required" => "Поле Мощность обязательно для заполнения",
        ];
    }
}
