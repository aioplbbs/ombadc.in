<?php

namespace App\Http\Requests\MIS;

use Illuminate\Foundation\Http\FormRequest;

class WorkflowStepsRequest extends FormRequest
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
            'steps' => ['required', 'array'],
            'steps.*.step_order' => ['required', 'integer', 'max:20'],
            'steps.*.role_id' => ['required', 'string']
        ];
    }
}
