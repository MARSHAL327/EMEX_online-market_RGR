<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'auto_modification' => ["required"],
            'fabricator' => ["required"],
            'provider' => ["required"],
            'name' => ["required"],
            'count' => ["required"],
            'img' => ["required"],
            'price' => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "auto_modification.required" => "Поле Выбор модификации авто обязательно для заполнения",
            "fabricator.required" => "Поле Выбор производителя обязательно для заполнения",
            "provider.required" => "Поле Выбор поставщика обязательно для заполнения",
            "name.required" => "Поле Название товара обязательно для заполнения",
            "count.required" => "Поле Доступное количество обязательно для заполнения",
            "img.required" => "Поле Картинка товара обязательно для заполнения",
            "price.required" => "Поле Цена товара обязательно для заполнения",
        ];
    }
}
