<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        $rules = [
            'site_title' => 'required|string|max:250',
            'site_logo'   => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,image/gif|max:2048',
            'site_favicon'   => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,image/gif|max:2048',
            'social'   => 'nullable|array',
            'social.facebook'   => 'nullable|url',
            'social.linked_in'   => 'nullable|url',
            'social.google'   => 'nullable|url',
        ];

        return $rules;
    }
}
