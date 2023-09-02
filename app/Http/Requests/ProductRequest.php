<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // Condition
            'category_id' => 'required',
            'title' => 'required|string',
            'description' => 'string|required',
            'cost_price' => 'nullable|numeric',
            'price' => 'nullable|numeric'
        ];
    }
}
