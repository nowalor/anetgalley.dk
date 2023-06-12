<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Log;
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
                'order_id' => $this->order->uuid,
                'currency' => 'DKK',
            ]);

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
                'amount' => $this->order->product->price,
                'cancel_url' => route('checkout.products.show', ['product' => $this->order->product, 'error' => 'You cancelled the payment. Please try again.']),
                'continue_url' => route('checkout.success'),
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
            Log::info($ex->getMessage());

            return [
                'success' => false,
                'message' => $ex->getMessage(),
            ];
        }
    }
}
