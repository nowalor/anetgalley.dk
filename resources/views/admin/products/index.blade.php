@extends('app')
@section('extra-links')
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endsection
@section('title', 'Admin')
@section('content')

    <div class="container pt-4">
        @if(Session::has('product-created'))
            <p class="success-message mb-4">{{ Session::get('product-created') }}</p>
        @endif
        <div class="display-flex align-center justify-space-between width100 mb-3">
            <h1 class="heading-lg">Products</h1>
            <a class="link-btn ttu" href="{{ route('admin.products.create') }}">Add product 🚀</a>
        </div>

        <div class="admin-product-header">
            <div class="admin-product-header__item">Name</div>
            <div class="admin-product-header__item">Category</div>
            <div class="admin-product-header__item">Price</div>
            <div class="admin-product-header__item">Dimensions</div>
            <div class="admin-product-header__item">Weight</div>
            <div class="admin-product-header__item">Material</div>
            <div class="admin-product-header__item">Condition</div>
            <div class="admin-product-header__item">Actions</div>
        </div>
        @foreach($products  as $product)
            <div class="admin-products">
                <div class="admin-products__item">{{ $product->name }}</div>
                <div class="admin-products__item">{{ $product->category->name }}</div>
                <div class="admin-products__item">{{ $product->price }}DKK</div>
                <div class="admin-products__item">{{ $product->dimensions && $product->dimensions }}</div>
                <div class="admin-products__item">{{ $product->weight && $product->weight }}</div>
                <div class="admin-products__item">{{ $product->material && $product->material }}</div>
                <div class="admin-products__item">{{ $product->condition && $product->condition }}</div>
                <div class="admin-products__item admin-products__actions">
                    <a class="view-product-button" href="{{ route('admin.products.show', $product) }}">View</a>
                    <a class="edit-product-button" href="{{ route('admin.products.edit', $product) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="delete-product-button">Del</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

