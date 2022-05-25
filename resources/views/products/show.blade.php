@extends('app')

@section('content')
    <div class="container single-product-page">
        <div class="breadcrumbs">
            <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
            <p class="breadcrumbs__slash">/</p>
            <a href="{{ route('products.index') }}" class="breadcrumbs__link">Shop</a>
            <p class="breadcrumbs__slash">/</p>
            <p href="{{ route('products.index') }}"
               class="breadcrumbs__link breadcrumbs__link-active">{{ $product->name }}</p>
        </div>

        <div class="single-product">
            <div class="center pt-2 pb-8">
                <span class="single-product__price">
                    {{ round($product->price) }}DKK
                </span>
            </div>

            <img src="{{ asset('storage/product-images/' . $product->id . '/' . $product->image_url) }}" alt=""
                 class="single-product__image">
        </div>
    </div>
@endsection
