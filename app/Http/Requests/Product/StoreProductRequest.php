<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'brand'    => ['required', 'integer', 'exists:brands,id'],
            'category' => ['required', 'integer', 'exists:categories,id'],
            'name'        => ['required', 'string', 'min:3'],
            'description' => ['sometimes', 'string', 'min:10'],
            'price'       => ['required', 'numeric', 'min:0'],
            'discount'    => ['sometimes', 'numeric', 'min:0', 'max:100'],
            'stock'       => ['required', 'integer', 'min:0'],
            'image'       => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'status'      => ['sometimes', 'boolean'],
        ];
    }
}
