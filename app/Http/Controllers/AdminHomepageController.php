<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminHomepageController extends Controller
{
    public function __invoke(): View
    {

        return view('admin.index');
    }
}
