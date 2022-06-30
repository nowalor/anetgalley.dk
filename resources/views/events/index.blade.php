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
                @forelse($events as $event)
                    <div class="event">
                        <img src=" {{ asset("storage/event-images/$event->id/$event->image_name") }} " alt="" class="event__img">
                        <h3 class="heading-md medium pt-2">{{ $event->name }}</h3>
                        <p class="pt-1 font16"> {{ $event->short_description }}</p>
                        <p class="pt-2 font14 light pb-4">{{ $event->formattedFromToDate }}</p>
                        <a href="" class="button button__black width100">View event</a>
                    </div>
                @empty
                    empty...
                @endforelse
            </div>
        </div>
    </div>
@endsection
