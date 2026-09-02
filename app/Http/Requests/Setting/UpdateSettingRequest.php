<?php

namespace App\Http\Requests\Setting;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSettingRequest extends FormRequest
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
            'web_name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'web_description' => ['required', 'string', 'min:10', 'max:1000'],
            'fb_account' => ['nullable', 'url', 'max:255'],
            'x_account' => ['nullable', 'url', 'max:255'],
            'instagram_account' => ['nullable', 'url', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'regex:/^\+?[1-9]\d{1,14}$/'],
        ];
    }
}