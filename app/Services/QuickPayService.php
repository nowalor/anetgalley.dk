<?php

namespace App\Services;

use App\Models\Order;
use QuickPay\QuickPay;

class QuickPayService
{
    private Order $order;
    private string $apiKey;

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->apiKey = config('services.quickpay.api_key');
    }

    public function createCheckoutLink(): array
    {
        $client = new QuickPay(":$this->apiKey");

        try {
            $payment = $client->request->post('/payments', [
                'order_id' => \Str::uuid()->toString(),
                'currency' => 'DKK',
            ]);

            dd(json_encode($payment));

            $status = $payment->httpStatus();

            if($status !== 201) {
                return [
                    'success' => false,
                    'message' => 'Failed to request payment'
                ];
            }

            $paymentObject = $payment->asObject();

            $endpoint = sprintf("/payments/%s/link", $paymentObject->id);

            $link = $client->request->put($endpoint, [
                'amount' => $this->order->price,
                'cancel_url' => redirect()->back()->with('payment_cancel', 'You have canceled the payment.')
            ]);

            if ($link->httpStatus() !== 200) {
                return [
                    'success' => false,
                    'message' => 'Failed to update link'
                ];
            }

            $redirectUrl = $link->asObject()->url;

            return [
                'success' => true,
                'message' => 'Link created',
                'link' => $redirectUrl,
            ];
        } catch(\Exception $ex) {

        }
    }
}
