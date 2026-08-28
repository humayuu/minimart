<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand_id'    => ['required', 'integer', 'exists:brands,id'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name'        => ['required', 'string', 'min:3'],
            'description' => ['sometimes', 'string', 'min:10'],
            'price'       => ['required', 'numeric', 'min:0'],
            'discount'    => ['sometimes', 'numeric', 'min:0', 'max:100'],
            'image'       => ['sometimes', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
        ];
    }
}