<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
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

        $galleryImages = GalleryImage::take(9)->get();

        $chunkedImages = collect($galleryImages)->chunk(3);

        return view('home', compact('products', 'homepageInformation', 'chunkedImages'));
    }
}
