<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCheckoutRequest;
use App\Models\Product;

class ProductCheckoutController extends Controller
{

    public function store(CreateProductCheckoutRequest $request)
    {
        $validated = $request->validated();

        return $validated;
    }

    public function show(Product $product)
    {
        return view('checkout.create', compact('product'));
    }

}
