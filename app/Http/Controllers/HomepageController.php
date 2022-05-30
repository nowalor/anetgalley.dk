<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class HomepageController extends Controller
{
    public function __invoke()
    {
        $products = Product::orderBy('id', 'desc')->take(3)->get();

        $instagramAccessToken = env('INSTAGRAM_ACCESS_TOKEN');

        $response= Http::get("https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url&limit=6&access_token=$instagramAccessToken");
        $instagramPosts = json_decode($response->body())->data;

        return view('home', compact('products', 'instagramPosts'));
    }
}
