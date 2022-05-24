<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        if($validated['dimensions'] || $validated['weight'] || $validated['material'] || $validated['condition']) {
            $validated['has_additional_info'] = true;
        }

        $validated['quantity'] = 5;

        $product = Product::create($validated);


        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();

            $image->storeAs("product-images/$product->id", $fileName, 'public');

            $product->update(['image_url' => $fileName]);
        }

        return redirect()->route('admin.products.index')->with('product-created', 'New product created!');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back();
    }
}
