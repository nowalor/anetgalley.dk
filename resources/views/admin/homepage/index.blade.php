@extends('app')
@section('title', 'Edit homepage')
@section('content')
    <div class="container">
        <form action="{{ route('admin.homepage.update', $homepageInformation) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <div class="form-group pt-2">
                    <label for="image" class="label">Image</label>
                    <input type="file" name="image">
                </div>
            <button class="button button__black">Save</button>

        </form>
    </div>
@endsection
