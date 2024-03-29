<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPropertiesRequest extends FormRequest
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
            'category_id' => ["required"],
            'name' => ["required"],
            'prop_type_id' => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "category_id.required" => "Поле Выбор категории обязательно для заполнения",
            "name.required" => "Поле Название свойства обязательно для заполнения",
            'prop_type_id' => "Поле Выбор типа свойства обязательно для заполнения",
        ];
    }
}
