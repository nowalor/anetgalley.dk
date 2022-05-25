@extends('app')

@section('content')
    <div class="breadcrumbs">
        <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
        <p class="breadcrumbs__slash">/</p>
        <a href="{{ route('products.index') }}" class="breadcrumbs__link">Shop</a>
        <p class="breadcrumbs__slash">/</p>
        <p href="{{ route('products.index') }}"
           class="breadcrumbs__link breadcrumbs__link-active">{{ $product->name }}</p>
    </div>
@endsection
