<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
            'nos_village' => ['required', 'regex:/^[0-9]{1,35}$/'],
            'nos_beneficiaries' => ['required', 'regex:/^[0-9]{1,35}$/'],
            'sanctioned' => 'required|numeric|min:0|max:9999999.99',
            'released' => 'required|numeric|min:0|max:9999999.99',
            'utilised' => 'required|numeric|min:0|max:9999999.99',
        ];
    }
}
