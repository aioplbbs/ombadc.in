<?php

namespace App\Http\Requests\MIS;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'string'],
            'mobile' => ['required', 'numeric', 'digits:10,12'], 
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::default()->min(8)],
            'department_id' => ['required', 'array']
        ];
    }
}
