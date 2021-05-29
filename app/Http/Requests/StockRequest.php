<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        if ($this->has('old_image') && $this->img == null)
            $this->merge([
                'img' => $this->old_image,
            ]);
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
            "img" => ["required"],
            "desc" => ["required"],
            "date_start" => ["required"],
            "date_end" => ["required"],
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Поле Название акции обязательно для заполнения",
            "img.required" => "Поле Картинка акции обязательно для заполнения",
            "desc.required" => "Поле Описание акции обязательно для заполнения",
            "date_start.required" => "Поле Начало акции обязательно для заполнения",
            "date_end.required" => "Поле Конец акции обязательно для заполнения",
        ];
    }
}
