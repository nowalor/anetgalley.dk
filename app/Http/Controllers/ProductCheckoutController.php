<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCheckoutRequest;
use App\Mail\InvoiceMail;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use PDF;

class ProductCheckoutController extends Controller
{

    public function store(CreateProductCheckoutRequest $request)
    {
        $validated = $request->validated();
        $product = Product::find($request->input('product-id'));

        $product->update([
            'quantity' => $product->quantity--,
        ]);

        $order = Order::create([
            'product_id' => $product->id,
            'method' => 'invoice',
        ]);

        $invoice = Invoice::create([
            'order_id' => $order->id,
            'buyer_name' => $request->name,
            'buyer_email' => $request->email,
            'buyer_phone' => '61477261',
        ]);

        $pdf = PDF::loadView('pdfs.invoice' , compact('product', 'order', 'invoice'));

        $invoice = $pdf->output();

        Mail::to('nikulasoskarsson@gmail.com')->send(new InvoiceMail($invoice));

        return $pdf->stream();
    }

    public function show(Product $product)
    {
        return view('checkout.create', compact('product'));
    }

}
