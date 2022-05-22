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

        if(!$validated) {
            return redirect->back();
        }

        if($validated['dimensions']) {
            $validated['has_additional_info'] = true;
            echo "if ran";
        } else {
        echo "...";}
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
