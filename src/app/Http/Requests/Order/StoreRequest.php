<?php

namespace App\Http\Requests\Order;

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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'desired_date' => 'required|string',
            'cooking_frequency' => 'required|string',
            'categories.*' => 'number|nullable',
            'creation_time' => 'number|nullable',
            'tool.*' => 'string|nullable|max:255',
            'ingredients.*' => 'string|nullable|max:255',
        ];
    }
}
