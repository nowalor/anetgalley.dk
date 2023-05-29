<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use QuickPay\QuickPay;

class QuickpayMobilepayOnlineLinkController extends Controller
{
    public function __invoke()
    {
        $apiKey = config('services.quickpay.api_key');

        $client = new QuickPay(":$apiKey", [
            'QuickPay-Callback-Url' => 'https://google.com',
            'callbackurl' => 'https://google.com',
        ]);

        try {
            $payment = $client->request->post('/payments', [
                'order_id' => '1234c4hx22xbasv', // Todo replace with orders.id
                'currency' => 'DKK',
            ]);

            $status = $payment->httpStatus();

            if ($status !== 201) {
                // handle error
                echo 'NOT 201';
            }

            $paymentObject = $payment->asObject();

            $endpoint = sprintf("/payments/%s/link", $paymentObject->id);

            $link = $client->request->put($endpoint, [
                'amount' => 100
            ]);

            if ($link->httpStatus() !== 200) {
                echo 'NOT 200';
            }

            $redirectUrl = $link->asObject()->url;

            echo $redirectUrl;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
