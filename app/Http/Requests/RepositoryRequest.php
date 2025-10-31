<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepositoryRequest extends FormRequest
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
            "name"=> ['required', 'string', 'max:255'],
            'description'=> ['nullable', 'string','max:255'],
            'category'=> ['required', 'string', 'max:255'],
            'file_date'=> ['nullable', 'date'],
            'document_file'=> ['required', 'file', 'mimes:pdf'],
            'thumbnail'=> ['required', 'file','mimetypes:image/jpeg,image/png,image/webp,image/gif'],
        ];

        if(!request()->isMethod('POST')){
            $rules['document_file'] = ['nullable', 'file', 'mimes:pdf'];
            $rules['thumbnail'] = ['nullable', 'file', 'mimetypes:image/jpeg,image/png,image/webp,image/gif'];
        }

        return $rules;
    }
}
