@extends('app')
@section('title', 'Homepage')

@section('content')
    <main>
        <div class="container">
            <div class="cta">
                <div class="cta__left" data-aos="fade-down-right">
                    <h1 class="cta__left-heading">{{ __('homepage.art_by') }}</h1>
                    <h3 class="cta__left-tagline">{{ __('homepage.art_is_a_media') }}</h3>
                    <div class="cta__left-buttons">
                        <a href="#" class="button button__black">{{ __('homepage.shop') }} &rarr;</a>
                        <a href="#" class="button button__white">{{ __('homepage.gallery') }} &rarr;</a>
                    </div>
                </div>
                <div class="cta__right" data-aos="fade-up-left">
                    <img src="{{ $homepageInformation ? $homepageInformation?->url : asset('img/placeholder.jpg') }}" alt="" class="cta__right-img">
                </div>
            </div>
        </div>
        @if(count($products))
            <div class="shop-preview">
                <h1 class="large-heading-white" data-aos="fade-right">
                    {{ __('homepage.shop') }}
                </h1>
                <h3 class="tagline-white-italic mt-1" data-aos="fade-left">
                    {{ __('homepage.checkout_the_latest_items') }}
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
                @endif

                @if(empty($products))
                <div class="shop-preview-item pt-4">
                    <div class="shop-preview-item__box" data-aos="fade-right">
                        <img
                            src="{{ asset('storage/product-images/' . $products[0]->id . '/' . $products[0]->image_url ) }}"
                            alt="" class="shop-preview-item__image">
                    </div>
                    <div class="shop-preview-item__box" data-aos="fade-left">
                        <div class="shop-preview-item__content">
                            <h2 class="heading-md-white">{{ $products[0]->name }}</h2>
                            <div class="shop-preview-item__price-box">
                                <p class="shop-preview-item__price">
                                    {{ $products[0]->price }}DKK
                                </p>
                            </div>
                            <p class="shop-preview-item__description">
                                {{ Str::words($products[0]->description, 60)}}
                            </p>

                            <div class="button-pink-100 mt-12" style="width: 80%; max-width: 40rem;">{{ __('homepage.view_product') }}</div>
                        </div>
                    </div>
                </div>
                @endif

                @if(count($products) >= 2)
                    <div class="shop-preview-item should-reverse" data-aos="fade-left">
                        <div class="shop-preview-item__box">
                            <div class="shop-preview-item__content">
                                <h2 class="heading-md-white">{{ $products[1]->name }}</h2>
                                <div class="shop-preview-item__price-box">
                                    <p class="shop-preview-item__price">
                                        {{ $products[1]->price }}DKK
                                    </p>
                                </div>
                                <p class="shop-preview-item__description">
                                    {{ Str::words($products[1]->description, 60)}}
                                </p>

                                <div class="button-pink-100 mt-12" style="width: 80%; max-width: 40rem;">BUY</div>
                            </div>
                        </div>
                        <div class="shop-preview-item__box" data-aos="fade-left">
                            <img
                                src="{{ asset('storage/product-images/' . $products[1]->id . '/' . $products[1]->image_url ) }}"
                                alt="" class="shop-preview-item__image">
                        </div>

                    </div>
                @endif

                @if(count($products) >= 3)
                    <div class="shop-preview-item" data-aos="fade-right">
                        <div class="shop-preview-item__box">
                            <img
                                src="{{ asset('storage/product-images/' . $products[2]->id . '/' . $products[2]->image_url ) }}"
                                alt="" class="shop-preview-item__image">
                        </div>
                        <div class="shop-preview-item__box" data-aos="fade-left">
                            <div class="shop-preview-item__content">
                                <h2 class="heading-md-white">{{ $products[2]->name }}</h2>
                                <div class="shop-preview-item__price-box">
                                    <p class="shop-preview-item__price">
                                        {{ $products[2]->price }}DKK
                                    </p>
                                </div>
                                <p class="shop-preview-item__description">
                                    {{ Str::words($products[2]->description, 60)}}
                                </p>

                                <div class="button-pink-100 mt-12" style="width: 80%; max-width: 40rem;">BUY</div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="pt-8 pb-10">
                    <a href="{{ route('products.index') }}" class="link-button-underline-white" data-aos="fade-in">
                        {{ __('homepage.view_entire_shop') }} &rarr;
                    </a>
                </div>
            </div>

            <div class="gallery-preview container">
                <h1 class="heading-xl ttu">
                    {{ __('homepage.gallery') }}
                </h1>
                <h3 class="tagline-italic mt-1">
                    {{ __('homepage.latest_posts_from_my_instagram') }}
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

                <div class="gallery">
                    @foreach($chunkedImages as $images)
                        <div class="gallery__column">
                            @foreach($images as $image)
                                <img src="storage/{{ $image->image }}" class="gallery__image">
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <div class="pt-8 pb-10" data-aos="fade-in">
                    <a href="{{ route('products.index') }}" class="link-button-underline">
                        {{ __('homepage.view_entire_gallery') }}&rarr;
                    </a>
                </div>
            </div>
    </main>
@endsection
