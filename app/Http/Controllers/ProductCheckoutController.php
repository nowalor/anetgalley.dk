<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCheckoutRequest;
use App\Mail\InvoiceMail;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\File;
use Illuminate\Http\Request;
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

        $product->update([
            'quantity' => $product->quantity - $request->get('quantity'),
        ]);

        $order = Order::create([
            'product_id' => $product->id,
            'method' => 'invoice',
            'quantity' => $request->get('quantity')
        ]);

        $invoice = Invoice::create([
            'order_id' => $order->id,
            'buyer_name' => $request->name,
            'buyer_email' => $request->email,
            'buyer_phone' => '61477261',
        ]);

        $invoice->update([
            'invoice_number' => Str::random(6) . $invoice->id,
        ]);

        $pdf = PDF::loadView('pdfs.invoice' , compact('product', 'order', 'invoice'));

        Storage::put("public/pdf/$invoice->invoice_number.pdf", $pdf->output());


        $invoice = $pdf->output();

        Mail::to('nikulasoskarsson@gmail.com')->send(new InvoiceMail($invoice));

        return redirect()->route('products.show', $product)
            ->with('order-successful', 'Your order was successful. Check your email');
   }

    public function show(Product $product)
    {
        return view('checkout.create', compact('product'));
    }

}
