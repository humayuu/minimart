<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
                'min:3'
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'min:8',
                'confirmed',
            ],
            'image' => [
                'sometimes',
                'image',
                'mimes:png,jpg,jpeg',
                'max:2048',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*' => [
                'string',
                'exists:roles,name',
            ],
            'permissions' => [
                'required',
                'array',
            ],
            'permissions.*' => [
                'string',
                'exists:permissions,name',
            ],

        ];
    }
}
