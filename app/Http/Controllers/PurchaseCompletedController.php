<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PurchaseCompletedController extends Controller
{
    public function __invoke(): View
    {
        return view('checkout.success');
    }
}
