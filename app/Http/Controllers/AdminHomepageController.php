<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomepageController extends Controller
{
    public function __invoke()
    {
        return view('admin.index');

    }
}
