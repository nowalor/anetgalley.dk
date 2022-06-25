<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductAdditionalImage;

class DeleteAdditionalProductImageController extends Controller
{
    public function __invoke(ProductAdditionalImage $productAdditionalImage)
    {
        $productAdditionalImage->delete();

        return redirect()->back()->with('additional_image_deleted', 'Image deleted');
    }
}
