@extends('app')
@section('title', 'Gallery - Admin')
@section('content')
    <div class="container pt-2">
        @if(Session::has('image-deleted'))
            <p class="success-message mb-4">{{ Session::get('image-deleted') }}</p>
        @endif

        <div class="display-flex align-center justify-space-between width100 mb-3">
            <h1 class="heading-lg">Gallery</h1>
            <a class="link-btn ttu" href="{{ route('admin.gallery.create') }}">Add image 🚀</a>
        </div>
        <div class="gallery">
            @foreach($chunkedImages as $images)
                <div class="gallery__column">
                    @foreach($images as $image)
                        <div class="gallery__image-container">
                            <form method="POST" action="{{ route('admin.gallery.destroy', $image) }}" class="gallery__form">
                                @csrf
                                @method('DELETE')
                                <label for="delete-gallery-img-submit"></label>
                                <input id="delete-gallery-img-submit" type="submit" value="❌" class="gallery__form-delete-btn"/>
                            </form>
                            <img src="{{ asset('storage/' . $image->image) }}"
                                 class="gallery__image gallery__image-admin">
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
