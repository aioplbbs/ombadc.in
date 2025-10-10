<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'caption' => 'required|regex:/^[A-Za-z0-9\s]+$/|max:200',
            'gallery'   => 'required|array',
            'gallery.*' => 'file|mimetypes:image/jpeg,image/png,image/webp,image/gif|max:2048',
        ];

        if ($this->isMethod('post')) {
            $rules['gallery'] = 'required|array';
        } else {
            $rules['gallery'] = 'nullable|array';
        }

        return $rules;
    }
}
