<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    protected $stopOnFirstFailure = false;

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
            "img" => ["required"]
        ];
    }

    public function messages()
    {
        return [
            "img.required" => "Поле Картинка обязательно для заполнения"
        ];
    }
}
