<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO validate admin
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
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string',
            'price' => 'required',
            'description' => 'required| string',
            'images' => 'required|image',
            'has_additional_info' => 'boolean',
            'dimensions' => 'string',
            'weight' => 'string',
            'material' => 'string',
            'condition' => 'string',
         ];
    }
}
