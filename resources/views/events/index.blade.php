@extends('app')
@section('title', 'Events')
@section('content')
    <div class="container">
        <div class="events-page">
            <div class="breadcrumbs">
                <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
                <p class="breadcrumbs__slash">/</p>
                <a href="{{ route('products.index') }}" class="breadcrumbs__link breadcrumbs__link-active">Events</a>
            </div>

            <ul class="filter-links pt-2">
            <li class="filter-links__item">
                <a href="{{ route('products.index') }}"
                   class="filter-links__link font16 medium ttu @if(Request::query('filter') == 0) active @endif }}">Upcoming</a>

            </li>

            <li class="filter-links__item">
                <a href="{{ route('products.index', ['filter' => 'original']) }}"
                   class="filter-links__link font16 medium ttu @if(Request::query('filter') === 'original') active @endif">All</a>
            </li>

        </ul>

            <div class="events pt-4">
                <div class="event">
                    <img src=" {{ asset('img/placeholder.jpg') }} " alt="" class="event__img">
                    <h3 class="heading-md medium pt-2">This is Denmark Gallery</h3>
                    <p class="pt-1 font16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p class="pt-2 font14 light pb-4">May 16 2021 - May 31 2021</p>
                    <a href="" class="button button__black width100">View event</a>
                </div>

                <div class="event">
                    <img src=" {{ asset('img/placeholder.jpg') }} " alt="" class="event__img">
                    <h3 class="heading-md medium pt-2">This is Denmark Gallery</h3>
                    <p class="pt-1 font16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p class="pt-2 font14 light pb-4">May 16 2021 - May 31 2021</p>
                    <a href="" class="button button__black width100">View event</a>
                </div>
            </div>
        </div>
    </div>
@endsection
