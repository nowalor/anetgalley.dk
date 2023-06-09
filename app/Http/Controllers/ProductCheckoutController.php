<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCheckoutRequest;
use App\Models\Country;
use App\Models\Order;
use App\Models\Product;
use App\Services\QuickPayService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductCheckoutController extends Controller
{

    public function store(CreateProductCheckoutRequest $request)
    {
        $validated = $request->validated();
        $product = Product::find($request->input('product-id'));

        try {
            DB::beginTransaction();

            $product->update([
                'quantity' => $product->quantity - $request->get('quantity'),
            ]);

            $order = [
                'product_id' => $product->id,
                'method' => 'TODO',
                'quantity' => $request->get('quantity'),
                'delivery_type' => $validated['delivery_type'],
                'uuid' => Order::createUUID(),
            ];

            if($order['delivery_type'] === Order::DELIVERY_TYPE_DELIVERY_DENMARK) {
                $order['country_id'] = 1;
                $order['city'] = $request->get('city');
                $order['address'] = $request->get('address');
                $order['zip_code'] = $request->get('zip_code');
            }

            $order = Order::create($order);

            $quickPayCheckout = (new QuickPayService($order))->createCheckoutLink();

            if(!$quickPayCheckout['success']) {
                return redirect()->back()->withError('Something went wrong. Please let us know and we will investigate');
            }

            DB::commit();

            return redirect($quickPayCheckout['link']);
        } catch(\Exception $ex) {
            DB::rollBack();

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
