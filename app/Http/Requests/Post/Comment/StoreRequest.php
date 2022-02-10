<?php

namespace App\Http\Requests\Post\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'message' => 'required|string|min:2|max:1000'
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Это поле необходимо для заполнения',
            '*.min' => 'Минимальная длина комментария не должна быть менее 2-х знаков',
           '*.max' => 'Максимальное количество символов для одного комментария — 1000 знаков',
        ];
    }
}
