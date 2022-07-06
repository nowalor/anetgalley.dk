<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEditHomepageInformationRequest;
use App\Models\HomepageInformation;
use Illuminate\Support\Facades\Storage;

class AdminEditHomepageInformationController extends Controller
{
    public function index()
    {
        $homepageInformation = HomepageInformation::first();

        return view('admin.homepage.index', compact('homepageInformation'));
    }

    public function update(AdminEditHomepageInformationRequest $request)
    {
        $validated = $request->validated();

        // Should only contain one record so first() is fine
        $homepageInfo = HomepageInformation::first();

        // Delete current image if it exists
        if($homepageInfo->image_name) {
            $files = Storage::allFiles('homepage/cta');

            Storage::delete($files);
        }

        $image = $request->file('image');
        $fileName = $image->getClientOriginalName();

        $image->storeAs("homepage/cta", $fileName,'public');

        $homepageInfo->update([
            'image_name' => $fileName,
        ]);

        return "worked? $fileName";
        return redirect()->back()->with('image-changed', 'Image has been changed');
    }
}
