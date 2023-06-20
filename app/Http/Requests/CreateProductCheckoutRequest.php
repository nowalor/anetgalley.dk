<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductCheckoutRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'quantity' => 'numeric',
            'delivery_type' => ['required', Rule::in(Order::DELIVERY_TYPES)],
            'country_id' => 'exists:countries,id',
            'city' => 'required_if:delivery_type,==,' .Order::DELIVERY_TYPE_DELIVERY_DENMARK,
            'address' => 'required_if:delivery_type,==,' .Order::DELIVERY_TYPE_DELIVERY_DENMARK,
            'zip_code' => 'required_if:delivery_type,==,' .Order::DELIVERY_TYPE_DELIVERY_DENMARK,

        ];
    }
}
