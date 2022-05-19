@extends('app')
@section('title', 'Homepage')

@section('content')
    <main>
        <div class="container">
            <div class="cta">
                <div class="cta__left">
                    <h1 class="cta__left-heading">Art by Anette Andersen</h1>
                    <h3 class="cta__left-tagline">Art is a media for reflection, existensial expansion... a pulse - pleasure - provocation....a sense of life</h3>
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
        </div>
    </main>
@endsection
