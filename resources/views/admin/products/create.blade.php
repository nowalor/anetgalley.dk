@extends('app')
@section('extra-links')
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection
@section('title', 'Admin')
@section('content')
    <div class="container">
        <h1>Create a new product..</h1>

        <form class="col-6 mx-auto" action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <h3>Required information</h3>
            <select class="form-select" aria-label="Default select example">
                <option selected disabled>Select category*</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label class="form-label">Name*</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label  class="form-label">Price*</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description*</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description" placeholder="Description"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Image/s*</label>
                <input name="images" type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <br><br>
            <h4>Optional information</h4>
            <div class="mb-3">
                <label class="form-label">Dimensions</label>
                <input type="text" class="form-control" name="dimensions">
            </div>

            <div class="mb-3">
                <label class="form-label">Weight</label>
                <input type="text" class="form-control" name="weight">
            </div>

            <div class="mb-3">
                <label class="form-label">Material</label>
                <input type="text" class="form-control" name="material">
            </div>

            <div class="mb-3">
                <label class="form-label">Condition</label>
                <input type="text" class="form-control" name="condition">
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

