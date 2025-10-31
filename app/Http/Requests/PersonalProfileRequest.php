<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalProfileRequest extends FormRequest
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
        $data = [
            'name'=>['required','string','max:255'],
            'email'=>['nullable','email'],
            'designation'=> ['required','string', 'max:255'],
            'staff_category'=> ['required','string', 'max:255'],
            'profile_image'=> ['nullable','file', 'mimetypes:image/jpeg,image/png,image/webp,image/gif','max:2048'],
            'phone_number'=> ['nullable','string','max:255'],
            'date_of_birth'=> ['nullable','date','before:today'],
            'qualification'=> ['required','string','max:255'],
            'short_brief'=> ['nullable', 'string','max:1000']
        ];

        if(!request()->isMethod('post')){
            $data['slug'] = ['required','string', 'max:255'];
        }
        return $data;
    }
}
