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
        unset($validated['image']);

        // Should only contain one record so first() is fine
        $homepageInfo = HomepageInformation::first();

        // Delete current image if it exists
        if($homepageInfo->image_name) {
            $files = Storage::allFiles('homepage/cta');

            Storage::delete($files);
        }

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();

            $image->storeAs("homepage/cta", $fileName,'public');
            $validated['image_name'] = $fileName;
        }

        $homepageInfo->update($validated);

        return redirect()->route('home');
    }
}
