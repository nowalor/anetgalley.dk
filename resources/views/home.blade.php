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
                    <img src="{{ $homepageInformation->url ? $homepageInformation->url : asset('img/placeholder.jpg') }}" alt="" class="cta__right-img">
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
                <div class="gallery-preview__gallery">
                    @foreach($instagramPosts as $instagramPost)
                        <div class="instagram-post">
                            <img data-aos="zoom-in" src="{{ $instagramPost->media_url  }}" alt="" class="instagram-post__img">
                        <!-- <h2 class="heading-md medium pt-2">anetgallery</h2>
                            <p class="instagram-post__caption pt-1 font16 mb-8">{{ strtok($instagramPost->caption, '#') }}
                            <span
                                class="instagram-post__caption-hashtags">{{ strstr($instagramPost->caption, '#') }}</span>
                            </p>

                            <a target="_blank" href="{{  $instagramPost->permalink }}" class="instagram-post__button">
                                View
                                <svg fill="#FFF" xmlns="http://www.w3.org/2000/svg" width="48px"
                                     height="48px" class="instagram-post__button-icon">
                                    <path
                                        d="M 16.5 5 C 10.16639 5 5 10.16639 5 16.5 L 5 31.5 C 5 37.832757 10.166209 43 16.5 43 L 31.5 43 C 37.832938 43 43 37.832938 43 31.5 L 43 16.5 C 43 10.166209 37.832757 5 31.5 5 L 16.5 5 z M 16.5 8 L 31.5 8 C 36.211243 8 40 11.787791 40 16.5 L 40 31.5 C 40 36.211062 36.211062 40 31.5 40 L 16.5 40 C 11.787791 40 8 36.211243 8 31.5 L 8 16.5 C 8 11.78761 11.78761 8 16.5 8 z M 34 12 C 32.895 12 32 12.895 32 14 C 32 15.105 32.895 16 34 16 C 35.105 16 36 15.105 36 14 C 36 12.895 35.105 12 34 12 z M 24 14 C 18.495178 14 14 18.495178 14 24 C 14 29.504822 18.495178 34 24 34 C 29.504822 34 34 29.504822 34 24 C 34 18.495178 29.504822 14 24 14 z M 24 17 C 27.883178 17 31 20.116822 31 24 C 31 27.883178 27.883178 31 24 31 C 20.116822 31 17 27.883178 17 24 C 17 20.116822 20.116822 17 24 17 z"/>
                                </svg>
                            </a> -->
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
