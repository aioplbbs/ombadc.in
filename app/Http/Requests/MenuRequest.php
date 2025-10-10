<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'title' => "required|regex:/^[-A-Za-z0-9\s.&']+$/|max:100",
            'url'   => 'nullable|array',
            'url.internal'   => 'nullable|numeric',
            'url.external'   => 'nullable|url',
            'menu_file' => 'nullable|file|mimetypes:application/pdf|max:2048',
        ];

        return $rules;
    }
}
