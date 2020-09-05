<?php

namespace App\Http\Requests\Signup;

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
            'userInput.name' => 'required|min:4|max:12',
            'userInput.email' => 'required|max:255|email|unique:users,email',
            'userInput.phone_number' => 'min:11|numeric',
            'userInput.password' => 'required|min:6|max:12|regex:/^[0-9a-zA-Z]+$/',
            'userInput.passwordConfirm' => 'required|min:6|max:12|regex:/^[0-9a-zA-Z]+$/|same:userInput.password',
        ];
    }

    public function messages()
    {
        return [
            'userInput.email.unique' => '入力したメールアドレスは既に登録されています。',
        ];
    }
}
