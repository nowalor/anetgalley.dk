<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCheckoutRequest;
use App\Mail\InvoiceMail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use PDF;

class ProductCheckoutController extends Controller
{

    public function store(CreateProductCheckoutRequest $request)
    {
        $validated = $request->validated();
        $product = Product::find($request->input('product-id'));

        $pdf = PDF::loadView('pdfs.invoice' , compact('product'));

        $invoice = $pdf->output();

        Mail::to('nikulasoskarsson@gmail.com')->send(new InvoiceMail($invoice));

        return $pdf->stream();
    }

    public function show(Product $product)
    {
        return view('checkout.create', compact('product'));
    }

}
