<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreGalleryImageRequest;
use App\Models\GalleryImage;

class AdminGalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::all();

        $chunkedImages = collect($images)->chunk(3);

        return view('admin.gallery.index', compact('chunkedImages'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(AdminStoreGalleryImageRequest $request)
    {
        $request->validated();

        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $storedImage = $image->store('gallery', 'public');

                GalleryImage::create(['image' => $storedImage]);
            }
        }

        return redirect()->route('admin.gallery.index');
    }

    public function destroy(GalleryImage $gallery)
    {
        $gallery->delete();

        return redirect()->back()->with('image-deleted', 'Image has been deleted');
    }
}
