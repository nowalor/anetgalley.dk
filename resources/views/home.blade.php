@extends('app')
@section('title', 'Homepage')

@section('content')
    <main>
        <div class="cta" id="cta">
            <div class="cta__logo-container">
                <h1 class="cta__logo">
                    A<span class="red">net</span>gallery.dk
                </h1>
            </div>
            <div class="cta__dog-container">
                <div class="cta__text-bubble-div">
                    <img src="{{ asset('img/text-bubble.png') }}" alt="" class="cta__text-bubble-img">
                    <div class="cta__text-bubble-text-container">
                        <span id="text-bubble" class="cta__text-bubble-text">Art is reflection, existencial expansion - pulse - please - provacationa... a sense of life</span>
                        <div class="cursor"></div>
                    </div>
                </div>
                <div class="cta__dog-div">
                    <div id="eye-container" class="cta__eye-container-absolute hidden-md">
                        <div class="cta__eye-container-relative">
                            <img id="eye-img" class="cta__eye-img" src="{{ asset('img/eye.svg')}}" alt="">
                        </div>
                    </div>
                    <img alt="Dog painting" class="cta__dog-img hidden-md" src="{{ asset('img/dog-final.png')}}">
                    <img alt="Dog painting" class="cta__dog-img hidden-lg" src="{{ asset('img/dog-sm.svg')}}">
                </div>
            </div>
            <div class="cta__bottom-box">

            </div>
        </div>

        <div class="container">
            {{--            <div class="cta">--}}
            {{--                <div class="cta__left" data-aos="fade-down-right">--}}
            {{--                    <h1 class="cta__left-heading">{{ $homepageInformation->title }}</h1>--}}
            {{--                    <h3 class="cta__left-tagline">{{ $homepageInformation->tagline }}</h3>--}}
            {{--                    <div class="cta__left-buttons">--}}
            {{--                        <a href="{{ route('products.index') }}" class="button button__black">{{ __('homepage.shop') }} &rarr;</a>--}}
            {{--                        <a href="{{ route('gallery.index') }}" class="button button__white">{{ __('homepage.gallery') }} &rarr;</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <div class="cta__right" data-aos="fade-up-left">--}}
            {{--                    <img src="{{ $homepageInformation ? $homepageInformation?->url : asset('img/placeholder.jpg') }}"--}}
            {{--                         alt="" class="cta__right-img">--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
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
            <div class="pt-4">

            </div>

            @forelse($products as $product)
                @if($loop->index !== 1)
                    <div class="shop-preview-item">
                        <div class="shop-preview-item__box" data-aos="fade-right">
                            <img
                                src="{{ asset('storage/product-images/' . $product->id . '/' . $product->image_url ) }}"
                                alt="" class="shop-preview-item__image">
                        </div>
                        <div class="shop-preview-item__box" data-aos="fade-left">
                            <div class="shop-preview-item__content">
                                <h2 class="heading-md-white">{{ $product->name }}</h2>
                                <div class="shop-preview-item__price-box">
                                    <p class="shop-preview-item__price">
                                        {{ $product->price }}DKK
                                    </p>
                                </div>
                                <p class="shop-preview-item__description">
                                    {{ Str::words($product->description, 60)}}
                                </p>

                                <a href="{{ route('products.show', $product) }}" class="button-black-inverse mt-12"
                                   style="width: 80%; max-width: 40rem;">{{ __('homepage.view_product') }}</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="shop-preview-item should-reverse">
                        <div class="shop-preview-item__box" data-aos="fade-left">
                            <div class="shop-preview-item__content">
                                <h2 class="heading-md-white">{{ $product->name }}</h2>
                                <div class="shop-preview-item__price-box">
                                    <p class="shop-preview-item__price">
                                        {{ $product->price }}DKK
                                    </p>
                                </div>
                                <p class="shop-preview-item__description">
                                    {{ Str::words($product->description, 60)}}
                                </p>

                                <a href="{{ route('products.show', $product) }}" class="button-black-inverse mt-12"
                                     style="width: 80%; max-width: 40rem;">{{ __('homepage.view_product') }}</a>
                            </div>
                        </div>
                        <div class="shop-preview-item__box" data-aos="fade-right">
                            <img
                                src="{{ asset('storage/product-images/' . $product->id . '/' . $product->image_url ) }}"
                                alt="" class="shop-preview-item__image">
                        </div>
                    </div>

                @endif
            @empty
                <p style="color: white;">No products have been added</p>
            @endforelse
            <div class="pt-8 pb-10">
                <a href="{{ route('products.index') }}" class="link-button-underline-white" data-aos="fade-in">
                    {{ __('homepage.view_entire_shop') }} &rarr;
                </a>
            </div>
        </div>

        <div class="gallery-preview container">
            <h1 class="heading-xl ttu pt-12">
                {{ __('homepage.gallery') }}
            </h1>
            <h3 class="tagline-italic mt-1">
                {{ __('homepage.latest_posts_from_my_gallery') }}
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
                @forelse($chunkedImages as $images)
                    <div class="gallery__column">
                        @foreach($images as $image)
                            <img src="storage/{{ $image->image }}" class="gallery__image">
                        @endforeach
                    </div>
                @empty
                    <p style="text-align: center; width: 100%;">No images in gallery</p>
                @endforelse
            </div>

            <div class="pt-8 pb-10 mb-4" data-aos="fade-in">
                <a href="{{ route('products.index') }}" class="link-button-underline">
                    {{ __('homepage.view_entire_gallery') }}&rarr;
                </a>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>
        if (screen.width > 900) {
            const eyeImg = document.getElementById('eye-img')
            const eye = document.getElementById('eye-container')
            const cta = document.getElementById('cta')
            const navbar = document.getElementById('navbar')

            const handleMouseMove = (e) => {
                let x = e.clientX * 100 / window.innerWidth - 50
                let y = e.clientY * 100 / window.innerHeight - 50


                // if (e.clientY < 1000) {
                //     y = 1000 * 100 / window.innerWidth - 50
                // }

                /*if (e.clientY > 1000) {
                    y = 1000 * 100 / window.innerWidth - 50
                } */

                // if (e.clientX < 650) {
                //     x = 650 * 100 / window.innerWidth - 50
                // }
                // if (e.clientX > 2000) {
                //     x = 2000 * 100 / window.innerWidth - 50
                // }

                x = x + (45 - e.clientX / 90)
                y = y + 35 - (e.clientY / 60)

                eyeImg.style.left = x + "%"
                eyeImg.style.top = y + 5 + "%"
            }

            cta.addEventListener("mousemove", (e) => handleMouseMove(e))
            navbar.addEventListener("mousemove", (e) => handleMouseMove(e))

            // Typewriter for text bubble
            const textBubbleEl = document.getElementById('text-bubble')
            textBubbleEl.innerHTML = ''


            const initialString = "Art is reflection, existencial expansion - pulse - please - provacationa... a sense of life"

            const homeLink = document.getElementById('home-link')
            const galleryLink = document.getElementById('gallery-link')
            const shopLink = document.getElementById('shop-link')
            const contactLink = document.getElementById('contact-link')
            const aboutLink = document.getElementById('about-link')
            const projectsLink = document.getElementById('projects-link')
            const links = [homeLink, galleryLink, shopLink, contactLink, aboutLink, projectsLink]


            let typeTimer
            let eraseTimer
            let isTyping = false

            let currentLink

            const type = (typedString) => {
                console.log('typedString', typedString)
                isTyping = true

                let i = 0
                let string = typedString
                typeTimer = setInterval(() => {
                    if (i < string.length) {
                        textBubbleEl.innerHTML += string.charAt(i)
                        i++
                    } else {
                        isTyping = false
                        clearInterval(typeTimer)
                    }

                }, 50)
            }

            const erase = () => {
                clearInterval(typeTimer)

                let i = textBubbleEl.innerHTML.length
                let string = textBubbleEl.innerHTML
                eraseTimer = setInterval(() => {
                    if (i >= 0) {
                        textBubbleEl.innerHTML = string.slice(0, i)
                        i--
                    } else {
                        isTyping = false
                        clearInterval(eraseTimer)
                    }
                }, 5)
            }

            let beforeTypingTimer

            const handleMouseHover = (currentLinkName) => {
                if (currentLinkName === currentLink) {
                    return
                }

                currentLink = currentLinkName

                erase()

                beforeTypingTimer = setTimeout(() => {
                    !isTyping && type(currentLinkName)
                }, 500)
            }

            type(initialString)

            homeLink.addEventListener('mouseover', () => {
                handleMouseHover('You are already home silly')
            })

            galleryLink.addEventListener('mouseover', () => {
                handleMouseHover('Checkout the latest images in my gallery!')
            })

            shopLink.addEventListener('mouseover', () => {
                handleMouseHover('Buy some of my art!')
            })

            projectsLink.addEventListener('mouseover', () => {
                handleMouseHover('Checkout some of my projects!')
            })

            contactLink.addEventListener('mouseover', () => {
                handleMouseHover('Contact me!')
            })

            links.forEach(link => {
                link.addEventListener('mouseleave', () => {
                    clearInterval(beforeTypingTimer)
                })
            })


            let navLeaveTimer

            navbar.addEventListener('mouseover', () => {
                clearInterval(navLeaveTimer)
            })
            navbar.addEventListener('mouseleave', () => {
                navLeaveTimer = setTimeout(() => {
                    handleMouseHover('Art is reflection, existencial expansion - pulse - please - provacationa... a sense of life')
                }, 5000)
            })
        }

    </script>
@endsection
