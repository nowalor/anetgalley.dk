<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCheckoutRequest;
use App\Mail\InvoiceMail;
use App\Models\Country;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PDF;

class ProductCheckoutController extends Controller
{

    public function store(CreateProductCheckoutRequest $request)
    {
        $validated = $request->validated();
        $product = Product::find($request->input('product-id'));
        $deliveryTypes = Order::DELIVERY_TYPES;

        try {
            $product->update([
                'quantity' => $product->quantity - $request->get('quantity'),
            ]);

            $order = [
                'product_id' => $product->id,
                'method' => 'invoice',
                'quantity' => $request->get('quantity'),
                'delivery_type' => $validated['delivery_type'],
            ];

            if($order['delivery_type'] === Order::DELIVERY_TYPE_DELIVERY_DENMARK) {
                $order['country_id'] = 1;
                $order['city'] = $request->get('city');
                $order['address'] = $request->get('address');
                $order['zip_code'] = $request->get('zip_code');
            }

            $order = Order::create($order);

        } catch(\Exception $ex) {
            Log::info($ex->getMessage());

            return redirect()->back()->withError('Something went wrong. Please let us know and we will investigate');
        }
   }

    public function show(Product $product)
    {
        $deliveryTypes = Order::DELIVERY_TYPES;
        $countries = Country::all();

        return view('checkout.create', compact('product', 'deliveryTypes', 'countries'));
    }

}
