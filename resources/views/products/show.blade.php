@extends('app')
@section('shop', 'active')
@section('content')
    <div class="modal-container display-none" id="show-product-modal">
        <img id="show-product-modal-img" class="modal-image"/>


    </div>
    <div class="container">
        <div class="single-product-page">
            @if(session()->has('order-successful'))
                <p class="success-message mt-2">
                    {{ session()->get('order-successful') }}
                </p>
            @endif
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
                        {{ $product->price }}DKK
                    </span>
                </div>

                <div class="display-flex single-product__container">
                    <div class="width50 relative single-product__box single-product__images">
                        <img id="selected-product-image" src="{{ $product->productImageUrl }}" alt=""
                             class="single-product__image">

                        <div class="single-product__grid">
                            <img
                                onClick="openModal('{{ $product->productImageUrl }}')"
                                src="{{ $product->productImageUrl }}"
                                alt="" class="single-product__grid-img">
                            @foreach($additionalImages as $image)
                                <img
                                    onClick="openModal('{{ $image->url }}')"
                                    src="{{ $image->url }}"
                                    alt="" class="single-product__grid-img">
                            @endforeach
                        </div>
                    </div>
                    <div class="width50 single-product__box">
                        <div class="single-product__content">
                            <h1 class="heading-lg medium single-product__heading">{{ $product->name }}</h1>

                            <div class="description-and-information">
                                <div class="header-links display-flex">
                                    <h3 id="description-link" class="font16 bold active ttu">Description</h3>
                                    <h3 id="additional-information-link" class="font16 bold ttu">Additional
                                        information</h3>
                                </div>
                                <p id="single-product-description" class="description">
                                    {{ $product->description }}
                                </p>
                                <div id="single-product-information" class="additional-information display-none">
                                    <div class="information-box">
                                        <div class="information-box__row display-flex justify-space-between">
                                            <h3 class="ttu medium heading-sm">Dimensions:</h3>
                                            <h3 class="heading sm text-lighter">{{ $product->dimensions }}</h3>
                                        </div>

                                        <div class="information-box__row display-flex justify-space-between">
                                            <h3 class="ttu medium heading-sm">Weight:</h3>
                                            <h3 class="heading sm text-lighter">{{ $product->weight }}</h3>
                                        </div>

                                        <div class="information-box__row display-flex justify-space-between">
                                            <h3 class="ttu medium heading-sm">Material:</h3>
                                            <h3 class="heading sm text-lighter">{{ $product->material }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8">
                                <a href="{{ route('checkout.products.show', $product) }}" class="button-black-inverse ttu width100">Request invoice</a>
                                <a href="{{ config('app.mobile_pay_link') }}"
                                   class="button-black-inverse ttu width100">Buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/single-product.js') }}"></script>
    <script src="{{ asset('js/modal-image-slider.js') }}"></script>
@endsection
