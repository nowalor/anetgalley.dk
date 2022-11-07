@extends('app')
@section('title', 'Gallery')
@section('gallery', 'active')

@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
            <p class="breadcrumbs__slash">/</p>
            <p class="breadcrumbs__link breadcrumbs__link-active">Gallery</p>
        </div>

        <div class="gallery">
            @forelse($chunkedImages as $images)
                <div class="gallery__column">
                    @foreach($images as $image)
                        <img src="{{ asset('storage/' . $image->image) }}" class="gallery__image">
                    @endforeach
                </div>
            @empty
                <p>No images in gallery</p>
            @endforelse
        </div>
    </div>

@endsection
