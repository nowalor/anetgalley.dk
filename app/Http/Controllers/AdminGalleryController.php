<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreGalleryImageRequest;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class AdminGalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::all();

        return view('admin.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(AdminStoreGalleryImageRequest $request)
    {
        $request->validated();

        $image = $request->file('image');
        $storedImage = $image->store('gallery', 'public');

        GalleryImage::create(['image' => $storedImage]);

        return redirect()->route('admin.gallery.index');
    }

    public function destroy(GalleryImage $galleryImage)
    {
        //
    }
}
