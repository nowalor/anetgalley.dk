<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('quantity', '>', 0);

        if($request->query('filter')) {
            if($request->query('filter') === 'original') {
                $products = $products->where('category_id', 1);
            } else if($request->query('filter') === 'replica') {
                $products = $products->where('category_id', 2);
            }
        }

        $products = $products->paginate(6)->withQueryString();

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $additionalImages = $product->productAdditionalImages;

        return view('products.show', compact('product', 'additionalImages'));
    }
}
