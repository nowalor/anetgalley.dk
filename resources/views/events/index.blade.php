@extends('app')
@section('title', 'Events')
@section('events', 'active')


@section('content')
    <div class="container">
        <div class="events-page">
            <div class="breadcrumbs">
                <a href="{{ route('home') }}" class="breadcrumbs__link">{{ __('events.home') }}</a>
                <p class="breadcrumbs__slash">/</p>
                <a href="{{ route('events.index') }}" class="breadcrumbs__link breadcrumbs__link-active">{{ __('events.events') }}</a>
            </div>

            <ul class="filter-links pt-2">
            <li class="filter-links__item">
                <a href="{{ route('events.index') }}"
                   class="filter-links__link font16 medium ttu @if(Request::query('filter') == 0) active @endif }}">{{ __('events.upcoming') }}</a>

            </li>

            <li class="filter-links__item">
                <a href="{{ route('events.index', ['filter' => 'all']) }}"
                   class="filter-links__link font16 medium ttu @if(Request::query('filter') === 'all') active @endif">{{ __('events.all') }}</a>
            </li>
        </ul>

            <div class="events pt-4">
                @forelse($events as $event)
                    <div class="event">
                        <img src=" {{ $event->imageUrl }} " alt="" class="event__img">
                        <h3 class="heading-md medium pt-2">{{ $event->name }}</h3>
                        <p class="pt-1 font16"> {{ $event->short_description }}</p>
                        <p class="pt-2 font14 light pb-4">{{ $event->formattedFromToDate }}</p>
                        <a target="_blank" href=" {{ $event->event_url }} " class="button button__black width100">{{ __('events.view_event') }}</a>
                    </div>
                @empty
                    empty...
                @endforelse
            </div>
        </div>
    </div>
@endsection
