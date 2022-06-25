<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductAdditionalImage;
use Illuminate\Support\Facades\Storage;

class DeleteAdditionalProductImageController extends Controller
{
    public function __invoke(ProductAdditionalImage $productAdditionalImage)
    {
        Storage::disk('public')->deleteDirectory(
            'product-images/' . $productAdditionalImage->product_id . '/additional/' . $productAdditionalImage->id . '/',
        );

        $productAdditionalImage->delete();

        return redirect()->back()->with('additional_image_deleted', 'Image deleted');
    }
}
