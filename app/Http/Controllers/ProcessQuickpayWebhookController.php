<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProcessQuickpayWebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        $sha256 = $request->header('Quickpay-Checksum-Sha256');
        $body = $request->getContent();

        $calculatedSha256 = hash_hmac('sha256', $body, config('services.quickpay.private_key'));

        if($sha256 !== $calculatedSha256) {
            return;
        }

        $orderId = $request->get('order_id');
        $status = $request->get('accepted');

        $order = \App\Models\Order::where('uuid', $orderId)->firstOrFail();

        if($status === 1) {
            $order->update([
                'status' => 'paid',
            ]);
        }

        $order->product->update([
            'quantity' => $order->product->quantity - $order->quantity,
        ]);

        $email = $order->buyer_email;
    }
}
