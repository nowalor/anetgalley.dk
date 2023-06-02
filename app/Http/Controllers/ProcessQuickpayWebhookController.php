<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class ProcessQuickpayWebhookController extends Controller
{
    public function __invoke()
    {
        Log::info('webhook ran');
    }
}
