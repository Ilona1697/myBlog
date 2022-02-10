<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users',
            'role' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            '*.required' => 'Это поле необходимо для заполнения',
            '*.string' => 'Данные должны соответствовать строчному типу',
            '*.unique' => 'Пользователь с таким email уже существует',
            '*.email' => 'Ваша почта должна соответстовать формату main@some.domain'
        ];
    }
}
