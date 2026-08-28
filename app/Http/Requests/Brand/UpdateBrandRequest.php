<?php

namespace App\Http\Requests\Brand;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Override;

class UpdateBrandRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('brands', 'brand_name')->ignore($this->route('brand')),
            ],
            'description' => [
                'sometimes',
                'string',
                'min:10',
            ],
            'image' => [
                'sometimes',
                'image',
                'mimes:png,jpg,jpeg',
                'max:2048'
            ],
        ];
    }
}