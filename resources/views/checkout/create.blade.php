@extends('app')
@section('shop', 'active')
@section('content')
    <div class="modal-container display-none" id="show-product-modal">
        <img id="show-product-modal-img" class="modal-image"/>

    </div>
    <div class="container">
        <div class="product-checkout-page">
            <div class="breadcrumbs">
                <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
                <p class="breadcrumbs__slash">/</p>
                <a href="{{ route('products.index') }}" class="breadcrumbs__link">Shop</a>
                <p class="breadcrumbs__slash">/</p>
                <a href="{{ route('products.show', $product) }}" class="breadcrumbs__link">{{ $product->name }}</a>
                <p class="breadcrumbs__slash">/</p>
                <p class="breadcrumbs__link breadcrumbs__link-active">Checkout</p>
            </div>

            <div class="display-flex pt-8">
                <div class="width50"></div>
                <div class="width50">
                    <form action="{{ route('checkout.products.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product-id" value="{{ $product->id }}">

                        <div class="form-group">
                            <label class="label" for="">Quantity</label>
                            <select name="" id="" class="input">
                                @for($i = 1; $i <= $product->quantity; $i++)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="label">Your name*</label>
                            <input name="name" type="text" class="input">
                        </div>

                        <div class="form-group">
                            <label for="" class="label">Your email*</label>
                            <input name="email" type="text" class="input">
                        </div>

                        <button class="mt-2 button-pink-100 ttu">Buy</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
