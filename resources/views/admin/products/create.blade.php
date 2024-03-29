@extends('app')
@section('extra-links')
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection
@section('title', 'Admin')
@section('content')
    <div class="container center pb-4">
        <h1 class="heading-lg pt-2">Create a new product</h1>
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

            <div class="form-group pt-2">
                <div class="label">Quantity*</div>
                <input type="number" name="quantity" class="input @error('quantity') validation-error-input @enderror"
                       value="{{ old('quantity') }}">
                @error('quantity')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group pt-2">
                <lablel class="label">Category*</lablel>
                <select name="category_id" class="select @error('category_id') validation-error-input @enderror"
                        aria-label="Default select example">
                    <option selected disabled>Select category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group pt-2">
                <label class="label">Price(DKK)*</label>
                <input type="text" class="input @error('price') validation-error-input @enderror" name="price"
                       value="{{ old('price') }}">
                @error('price')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group pt-2">
                <label class="label">Delivery cost(DKK)*</label>
                <input type="text" class="input @error('delivery_cost') validation-error-input @enderror" name="delivery_cost"
                       value="{{ old('delivery_cost') }}">
                @error('delivery_cost')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group pt-2">
                <label for="exampleFormControlTextarea1" class="label">Description*</label>
                <textarea class="textarea mb-2 @error('description')  validation-error-input @enderror"
                          id="exampleFormControlTextarea1" rows="5" name="description"
                          placeholder="Description">{{ old('description') }}</textarea>
                @error('description')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group pt-2">
                <label for="exampleFormControlFile1" class="label">Image</label>
                <input name="image" type="file" class="input-file @error('image') validation-error-input @enderror"
                       id="exampleFormControlFile1">
                @error('image')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <h3 class="pt-4 heading-md">Optional information</h3>
            <div class="form-group pt-2">
                <label class="label">Dimensions</label>
                <input type="text" class="input @error('dimensions') validation-error-input @enderror"
                       name="dimensions" value="{{ old('dimensions') }}">
                @error('dimensions')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group pt-2">
                <label class="label">Weight</label>
                <input type="text" class="input @error('weight') validation-error-input @enderror" name="weight"
                       value="{{ old('weight') }}">
                @error('weight')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group pt-2">
                <label class="label">Material</label>
                <input type="text" class="input @error('material') validation-error-input @enderror" name="material"
                       value="{{ old('material') }}">
                @error('material')
                <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="mt-2 button-pink-100 ttu">Submit</button>
        </form>
    </div>
@endsection

