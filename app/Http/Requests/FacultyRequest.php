<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacultyRequest extends FormRequest
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
            'page_id' => 'required|exists:pages,id,deleted_at,NULL',
            'salutation' => 'required|in:Dr.,Mr.,Ms.',
            'name' => 'required|regex:/^[A-Za-z0-9\s.]+$/|max:255',
            'slug' => 'nullable|string',
            'designation' => 'required|regex:/^[A-Za-z0-9\s.]+$/|max:50',
            'qualification' => 'required|regex:/^[A-Za-z0-9\s.]+$/|max:50',
            'area_of_specialization' => 'required|regex:/^[A-Za-z0-9\s.]+$/|max:50',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|digits:10',
            'other_information' => 'nullable|string',
            'faculty_profile' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];

        return $rules;
    }
}
