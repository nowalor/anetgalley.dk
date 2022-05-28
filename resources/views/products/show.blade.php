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

            <div class="display-flex">
                <img src="{{ asset('storage/product-images/' . $product->id . '/' . $product->image_url) }}" alt=""
                     class="single-product__image">

                <div class="single-product__content">
                    <h1 class="heading-lg medium">{{ $product->name }}</h1>

                    <div class="description-and-information">
                        <div class="header-links display-flex">
                            <h3 id="description-link" class="font16 bold active ttu">Description</h3>
                            <h3 id="additional-information-link" class="font16 bold ttu">Additional information</h3>
                        </div>
                        <p id="single-product-description" class="description">
                            {{ $product->description }}
                        </p>
                        <div id="single-product-information" class="additional-information display-none">
                            Added information
                        </div>
                    </div>
                    <a href="#" class="button-primary ttu">Buy now</a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/single-product.js') }}"></script>
@endsection
