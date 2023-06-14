<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
               'category_id' => 'exists:categories,id',
               'name' => 'string',
               'quantity' => 'numeric',
               'price' => 'numeric',
               'description' => 'string',
               'image' => 'image',
               'has_additional_info' => 'boolean',
               'dimensions' => 'string|nullable',
               'weight' => 'string|nullable',
               'material' => 'string|nullable',
            ];
    }
}
