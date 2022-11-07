@extends('app')
@section('title', 'Edit homepage')
@section('content')
    <div class="container">
        <form
            style="max-width: 60rem;"
            action="{{ route('admin.homepage.update', $homepageInformation) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @if($errors->any())
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <div class="form-group pt-2">
                <label for="image" class="label">Image</label>
                <img id="homepage-image-preview" src="{{ $homepageInformation->url }}" alt="Homepage image" style="height: 25rem;">
                <input type="file" name="image" id="homepage-image-input">
            </div>

            <div class="form-group pt-2">
                <label for="title_en" class="label">Title in English</label>
                <input type="text" class="input" name="title_en" id="title_en"
                       value="{{ $homepageInformation->title_en }}">
            </div>

            <div class="form-group pt-2">
                <label for="title_dk" class="label">Title in Danish</label>
                <input type="text" class="input" name="title_dk" id="title_dk"
                       value="{{ $homepageInformation->title_dk }}"
                >
            </div>

            <div class="form-group pt-2">
                <label for="tagline_en" class="label">Tagline in English</label>
                <input type="text" class="input" name="tagline_en" id="tagline_en"
                       value="{{ $homepageInformation->tagline_en }}"
                >
            </div>

            <div class="form-group pt-2">
                <label for="tagline_dk" class="label">Tagline in Danish</label>
                <input type="text" class="input" name="tagline_dk" id="tagline_dk"
                       value="{{ $homepageInformation->tagline_dk }}"
                >
            </div>

            <div class="form-group pt-2">
                <button class="button button__black">Save</button>
            </div>

        </form>
    </div>
@endsection
@section('scripts')
    <script>
        const homepageImagePreviewEl = document.getElementById('homepage-image-preview')
        const homepageImageInputEl = document.getElementById('homepage-image-input')

        const showImgPreview = () => {
            const img = document.getElementById('homepage-image-input').files[0]

            homepageImagePreviewEl.src =  URL.createObjectURL(img)
        }

        homepageImageInputEl.addEventListener('change', showImgPreview)
    </script>
@endsection
