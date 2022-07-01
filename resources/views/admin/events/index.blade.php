@extends('app')
@section('title', 'Events')
@section('content')
    <div class="container pt-4">
        @if(Session::has('event-created'))
            <p class="success-message mb-4">
                {{ Session::get('event-created') }}
            </p>
        @endif

        @if(Session::has('event-updated'))
            <p class="success-message mb-4">{{ Session::get('event-updated') }}</p>
        @endif

        @if(Session::has('event-deleted'))
            <p class="alert-message mb-4">{{ Session::get('event-deleted') }}</p>
        @endif

        <div class="display-flex align-center justify-space-between width100 mb-3">
            <h1 class="heading-lg">Events</h1>
            <a class="link-btn ttu" href="{{ route('admin.events.create') }}">Add Event 🚀</a>
        </div>
        <div class="table-header">
            <p class="table-heading">Name</p>
            <p class="table-heading">Short description</p>
            <p class="table-heading">Date</p>
            <p class="table-heading">Action</p>
        </div>
        <div class="table-items">
            @foreach($events as $event)
                <div class="table-row">
                    <p class="table-row__item">
                        {{ $event->name }}
                    </p>
                    <p class="table-row__item">
                        {{ $event->short_description }}
                    </p>
                    <p class="table-row__item">
                        {{ $event->formattedFromToDate }}
                    </p>
                    <div class="table-row__item table-row__actions">
                        <a class="view-button" href="">View</a>
                        <a class="edit-button" href=" {{ route('admin.events.edit', $event) }} ">Edit</a>
                        <form method="POST" action=" {{ route('admin.events.destroy', $event) }} ">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" class="delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection('content)
