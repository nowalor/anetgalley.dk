<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Product;

class HomepageController extends Controller
{
    public function __invoke(): View
    {
        $products = Product::orderBy('id', 'desc')->take(3)->get();

        return view('home', compact('products'));
    }
}
