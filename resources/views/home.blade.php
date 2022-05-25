@extends('app')
@section('title', 'Homepage')

@section('content')
    {{ $products[1]->name }}
    <main>
        <div class="container">
            <div class="cta">
                <div class="cta__left">
                    <h1 class="cta__left-heading">Art by Anette Andersen</h1>
                    <h3 class="cta__left-tagline">Art is a media for reflection, existensial expansion... a pulse -
                        pleasure - provocation....a sense of life</h3>
                    <div class="cta__left-buttons">
                        <a href="#" class="button button__black">SHOP &rarr;</a>
                        <a href="#" class="button button__white">GALLERY &rarr;</a>
                    </div>
                </div>
                <div class="cta__right">
                    <img src="{{ asset('img/placeholder.jpg') }}" alt="" class="cta__right-img">
                </div>
            </div>
        </div>
        <div class="shop-preview">
            <h1 class="large-heading-white">
                SHOP
            </h1>
            <h3 class="tagline-white-italic mt-1">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            </h3>
            <div class="decoration-line mt-2">
                <div class="decoration-line__line"></div>
                <div class="decoration-line__square"></div>
                <div class="decoration-line__outer-square">
                    <div class="decoration-line__inner-square"></div>
                </div>
                <div class="decoration-line__square"></div>
                <div class="decoration-line__line"></div>
            </div>

            <div class="shop-preview-item pt-4">
                <div class="shop-preview-item__box">
                    <img
                        src="{{ asset('storage/product-images/' . $products[0]->id . '/' . $products[0]->image_url ) }}"
                        alt="" class="shop-preview-item__image">
                </div>
                <div class="shop-preview-item__box">>
                    <div class="shop-preview-item__content">
                        <h2 class="heading-md-white">{{ $products[0]->name }}</h2>
                        <p class="shop-preview-item__description">
                            {{ Str::words($products[0]->description, 60)}}
                        </p>

                        <div class="button-pink-100 mt-12" style="width: 80%; max-width: 40rem;">BUY</div>
                    </div>
                </div>
            </div>
            <div class="shop-preview-item">
                <div class="shop-preview-item__box">>
                    <div class="shop-preview-item__content">
                        <h2 class="heading-md-white">{{ $products[1]->name }}</h2>
                        <p class="shop-preview-item__description">
                            {{ Str::words($products[1]->description, 60)}}
                        </p>

                        <div class="button-pink-100 mt-12" style="width: 80%; max-width: 40rem;">BUY</div>
                    </div>
                </div>
                <div class="shop-preview-item__box">
                    <img
                        src="{{ asset('storage/product-images/' . $products[1]->id . '/' . $products[1]->image_url ) }}"
                        alt="" class="shop-preview-item__image">
                </div>

            </div>
            <div class="shop-preview-item">
                <div class="shop-preview-item__box">
                    <img
                        src="{{ asset('storage/product-images/' . $products[2]->id . '/' . $products[2]->image_url ) }}"
                        alt="" class="shop-preview-item__image">
                </div>
                <div class="shop-preview-item__box">>
                    <div class="shop-preview-item__content">
                        <h2 class="heading-md-white">{{ $products[2]->name }}</h2>
                        <p class="shop-preview-item__description">
                            {{ Str::words($products[2]->description, 60)}}
                        </p>

                        <div class="button-pink-100 mt-12" style="width: 80%; max-width: 40rem;">BUY</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
