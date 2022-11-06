<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;

class GalleryController extends Controller
{

    public function __invoke()
    {
        $images = GalleryImage::all();
        $chunkedImages = collect($images)->chunk(3);

        return view('gallery.index', compact('chunkedImages'));
    }
}
