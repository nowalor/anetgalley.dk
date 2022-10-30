@extends('app')

@section('title', 'Admin - Gallery')
@section('content')
    <div class="container pt-2">
        <h1 class="heading-lg">Gallery</h1>
        <h2 class="heading-md">Create a new image</h2>
        <form style="width: 45rem;" method="POST" action="{{ route('admin.gallery.store') }}"
              enctype="multipart/form-data">
            @csrf
            <input type="file" name="image"/>
            <button type="submit" class="mt-2 button-pink-100 ttu">Submit</button>
        </form>
    </div>
@endsection

