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
            'quantity' => 'required|numeric',
            'price' => 'required',
            'description' => 'required| string',
            'image' => 'required|image',
            'has_additional_info' => 'boolean',
            'dimensions' => 'string| nullable',
            'weight' => 'string| nullable',
            'material' => 'string| nullable',
            'condition' => 'string| nullable',
         ];
    }
}
