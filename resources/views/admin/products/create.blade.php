@extends('app')
@section('extra-links')
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection
@section('title', 'Admin')
@section('content')
    <div class="container center">
        <h1 class="heading-lg pt-2">Create a new product</h1>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        <form class="pt-4" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" style="width: 37rem;">
            @csrf
            <h3 class="heading-md">Required information</h3>
            <div class="form-group pt-2">
                <lablel class="label">Category*</lablel>
                <select name="category_id" class="select" aria-label="Default select example">
                    <option selected disabled>Select category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    {{ $message }}
                @enderror
            </div>


            <div class="form-group">
                <label class="label">Name*</label>
                <input type="text" class="input" name="name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label  class="label">Price*</label>
                <input type="number" class="input" name="price">
            </div>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="label">Description*</label>
                <textarea class="textarea" id="exampleFormControlTextarea1" rows="5" name="description" placeholder="Description"></textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1" class="label">Image</label>
                <input name="image" type="file" class="input-file" id="exampleFormControlFile1">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <br><br>
            <h3 class="pt-2 heading-md">Optional information</h3>
            <div class="form-group">
                <label class="label">Dimensions</label>
                <input type="text" class="input" name="dimensions">
            </div>
            @error('dimensions')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label class="label">Weight</label>
                <input type="text" class="input" name="weight">
            @error('weight')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label class="label">Material</label>
                <input type="text" class="input" name="material">
            @error('material')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group">
                <label class="label">Condition</label>
                <input type="text" class="input" name="condition">
            @error('condition')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <button type="submit" class="mt-2 button-pink-100 ttu">Submit</button>
        </form>
    </div>
@endsection

