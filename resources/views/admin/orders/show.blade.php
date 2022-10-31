@extends('app')
@section('title', $order->product->name)

@section('content')
    <div class="container">
        <div class="container single-product-page">
            <div class="single-product">

                <div class="display-flex">
                    <div class="width50 relative mt-4 mb-4">
                        <img id="selected-product-image" src="{{ $order->product->productImageUrl }}" alt=""
                             class="single-product__image">
                    </div>
                    <div class="width50 mb-4 mt-4">
                        <div class="single-product__content">
                            <h1 class="heading-lg medium">Order information</h1>

                            <div class="description-and-information">
                                <div class="additional-information">
                                    <div class="information-box">
                                        <div class="information-box__row display-flex justify-space-between">
                                            <h3 class="ttu medium heading-sm">Product name:</h3>
                                            <h3 class="heading sm text-lighter">{{ $order->product->name}}</h3>
                                        </div>

                                        <div class="information-box__row display-flex justify-space-between">
                                            <h3 class="ttu medium heading-sm">Total price: </h3>
                                            <h3 class="heading sm text-lighter">{{ $order->product->price * $order->quantity }}
                                                / DKK</h3>
                                        </div>

                                        <div class="information-box__row display-flex justify-space-between">
                                            <h3 class="ttu medium heading-sm">Product price</h3>
                                            <h3 class="heading sm text-lighter">{{ $order->product->price }}</h3>
                                        </div>

                                        <div class="information-box__row display-flex justify-space-between">
                                            <h3 class="ttu medium heading-sm">Order quantity</h3>
                                            <h3 class="heading sm text-lighter">{{ $order->quantity }}</h3>
                                        </div>

                                        <div class="information-box__row display-flex justify-space-between">
                                            <h3 class="ttu medium heading-sm">Payment method</h3>
                                            <h3 class="heading sm text-lighter">{{ $order->method }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h1 class="heading-lg medium">Buyer information</h1>
                            <div class="description-and-information">
                                <div class="additional-information">
                                    <div class="information-box">
                                        <div class="information-box__row display-flex justify-space-between">
                                            <h3 class="ttu medium heading-sm">Buyer name:</h3>
                                            <h3 class="heading sm text-lighter">{{ $order->invoice->buyer_name }}
                                            </h3>
                                        </div>

                                        <div class="information-box__row display-flex justify-space-between">
                                            <h3 class="ttu medium heading-sm">Buyer email: </h3>
                                            <h3 class="heading sm text-lighter">{{ $order->invoice->buyer_email }}
                                            </h3>
                                        </div>

                                        <div class="information-box__row display-flex justify-space-between">
                                            <h3 class="ttu medium heading-sm">Buyer phone</h3>
                                            <h3 class="heading sm text-lighter">{{ $order->invoice->buyer_phone }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a download href="{{ asset('storage/pdf/' . $order->invoice->invoice_number . '.pdf') }}"
                               class="button-primary ttu single-product__button">Download invoice 🧾</a>
                            <a href="#" class="button-primary ttu single-product__button">Mark as completed ✅</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
