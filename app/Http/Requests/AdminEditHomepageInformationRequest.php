<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEditHomepageInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'nullable|image',
            'title_en' => 'nullable|string',
            'title_dk' => 'nullable|string',
            'tagline_en' => 'nullable|string',
            'tagline_dk' => 'nullable|string',
        ];
    }
}
