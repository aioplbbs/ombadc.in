<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            'notice_name' => 'required|regex:/^[A-Za-z0-9\s()-.]+$/|max:250',
            'notice_category'   => 'required|array',
            'notice_category.*' => 'in:Latest News,News & Event,Notices',
            'notice_type'       => 'required|in:Upload File,Link',
            'notice_open_in'    => 'required|in:New,Same',
            'notice_blink'      => 'required|in:Yes,No',
            'notice_publish'    => 'required|date',
            'custom_data'       => 'nullable|string',
            'status'       => 'nullable|in:Show,Hide',
        ];

        switch ($this->input('notice_type')) {
            case "Upload File":
                $fileRule = 'file|mimetypes:image/jpeg,image/png,application/pdf|max:2048';
                if ($this->isMethod('post')) {
                    $fileRule = 'required|' . $fileRule;
                } else {
                    $fileRule = 'nullable|' . $fileRule;
                }
                $rules['notice'] = $fileRule;
                break;

            case "Link":
                $rules['web_link'] = 'required|url';
                break;
        }

        return $rules;
    }
}
