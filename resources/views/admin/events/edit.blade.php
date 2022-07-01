@extends('app')
@section('title', 'Admin - Events')
@section('content')
    <div class="container center pb-4">
        <h1 class="heading-lg pt-2">Create a new event</h1>

        <form class="pt-4" action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data"
              style="width: 37rem;">
            @csrf
            <h3 class="heading-md">Required information</h3>

            <div class="form-group pt-2">
                <label class="label">Name of event</label>
                <input type="text" class="input @error('name') validation-error-input @enderror" name="name"
                       value="{{ $event->name }}">
                @error('name')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <div class="label">Short description</div>
                <input type="text" name="short_description" class="input @error('short_description') validation-error-input @enderror"
                       value="{{ $event->short_description }}">
                @error('short_description')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="label">Event url</label>
                <input type="text" class="input @error('event_url') validation-error-input @enderror" name="event_url"
                       value="{{ $event->event_url }}">
                @error('event_url')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="" class="label">Event image</label>
                <input type="file" class="" name="image">
            </div>
            <div class="form-group">
                <label class="label">Dates</label>
                <input type="text" name="daterange" value="{{ $event->formattedFromToDate  }}"/>

            </div>

            <button type="submit" class="mt-2 button-pink-100 ttu">Submit</button>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/datepicker.js') }}"></script>
@endsection

