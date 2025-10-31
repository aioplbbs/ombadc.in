<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'name' => "required|string|max:240",
            'page_content' => "nullable|string",
            'slug' => 'nullable|regex:/^[A-Za-z0-9\s-]+$/|max:249',
            'seo'   => 'nullable|array',
            'seo.title' => 'nullable|regex:/^[A-Za-z0-9\s]+$/',
            'seo.keywords' => 'nullable|regex:/^[A-Za-z0-9\s,]+$/',
            'seo.description' => 'nullable|regex:/^[A-Za-z0-9\s]+$/',
            'status'       => 'nullable|in:Show,Hide',
            'banner' => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,image/gif|max:2048',
            'photo' => 'nullable|file|mimetypes:image/jpeg,image/png,image/webp,image/gif|max:2048',
            'page_type'=> 'nullable|string',
            'gallery'=> 'nullable|array',
            'gallery.*'=> 'nullable|string',
            'poster_id'=> 'nullable|string'
        ];

        return $rules;
    }
}
