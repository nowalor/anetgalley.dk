<?php

namespace App\Http\Controllers;

use App\Models\HomepageInformation;
use Dymantic\InstagramFeed\Profile;
use Illuminate\View\View;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class HomepageController extends Controller
{
    public function __invoke()
    {
        $homepageInformation = HomepageInformation::first();

        $products = Product::orderBy('id', 'desc')->take(3)->get();

        return view('home', compact('products', 'homepageInformation'));
    }
}
