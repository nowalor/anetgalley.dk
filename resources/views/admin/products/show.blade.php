@extends('app')
@section('title', 'Single product')
@section('content')
    <div class="container">
        <h1 class="heading-lg pt-2">{{ $product->name }}</h1>
        <div class="admin-single-product ">
            <img class="mt-2 admin-single-product__image"
                 src="{{ asset('storage/product-images/' . $product->id . '/' . $product->image_url) }}"
                 alt="">

            <div class="product-information">
                <h3 class="heading-md mt-2">Description</h3>
                <p class="product-information__description">{{ $product->description }}</p>
            </div>
        </div>

    </div>
@endsection
