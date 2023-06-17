<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductAdditionalImage;

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

        if($validated['dimensions'] || $validated['weight'] || $validated['material']) {
            $validated['has_additional_info'] = true;
        }

        $validated['price'] =  (double)($validated['price']) * 100; // 25.5dkk = 2555 in database
        $validated['delivery_cost'] = (double)$validated['delivery_cost'] * 100;
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
        $additionalImages = $product->productAdditionalImages;

        return view('admin.products.show', compact('product', 'additionalImages'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

       if($request->hasFile('image')) {
           $image = $request->file('image');
           $fileName = $image->getClientOriginalName();

           Storage::disk('public')->delete("product-images/$product->id/$product->image_url");
           $image->storeAs("product-images/$product->id", $fileName, 'public');

           $product->image_url = $fileName;
       }

        if($request->hasFile('additional_images')) {
            foreach($request->file('additional_images') as $image) {
                $fileName = $image->getClientOriginalName();

                $newImage = ProductAdditionalImage::create([
                    'product_id' => $product->id,
                    'name' => $fileName,
                ]);

                $image->storeAs("product-images/$product->id/additional/$newImage->id", $fileName, 'public');
            }
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('Product updated', 'Product has been updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('product-deleted', 'Product has been deleted');
    }
}
