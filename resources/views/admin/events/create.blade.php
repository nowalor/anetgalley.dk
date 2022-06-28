@extends('app')
@section('title', 'Admin - Events')
@section('content')
    <div class="container center">
        <h1 class="heading-lg pt-2">Create a new event</h1>

        <form class="pt-4" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
              style="width: 37rem;">
            @csrf
            <h3 class="heading-md">Required information</h3>

            <div class="form-group pt-2">
                <label class="label">Name*</label>
                <input type="text" class="input @error('name') validation-error-input @enderror" name="name"
                       value="{{ old('name') }}">
                @error('name')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <div class="label">Quantity*</div>
                <input type="number" name="quantity" class="input @error('quantity') validation-error-input @enderror"
                       value="{{ old('quantity') }}">
                @error('quantity')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="label">Price*</label>
                <input type="number" class="input @error('price') validation-error-input @enderror" name="price"
                       value="{{ old('price') }}">
                @error('price')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>


            <button type="submit" class="mt-2 button-pink-100 ttu">Submit</button>
        </form>
    </div>
@endsection
