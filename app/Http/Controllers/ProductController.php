<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if($request->query('filter')) {
            if($request->query('filter') === 'original') {
                $products = Product::where('category_id', 1)->paginate(6)->withQueryString();
            } else if($request->query('filter') === 'replica') {
                $products = Product::where('category_id', 2)->paginate(6)->withQueryString();
            }
        } else {
            $products = Product::paginate(6)->withQueryString();
        }

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
