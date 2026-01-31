<?php

namespace App\Http\Requests\MIS;

use Illuminate\Foundation\Http\FormRequest;

class ProposalRequest extends FormRequest
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
            'sector_id' => ['required', 'string'],
            'department_id' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'entry_date' => ['required', 'date', 'after_or_equal:today'], 
            'initial_cost' => ['required', 'numeric'], 
            'unit' => ['required', 'string', 'in:Crore, Lac'],
            'proposal_copy' => ['required', 'file', 'mimes:pdf'],
            // 'proposal'
        ];
    }
}
