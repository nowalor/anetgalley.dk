@extends('app')
@section('title', 'Homepage')

@section('content')
    <main>
        <div class="container">
            <div class="breadcrumbs">
                <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
                <p class="breadcrumbs__slash">/</p>
                <a href="{{ route('products.index') }}" class="breadcrumbs__link breadcrumbs__link-active">Shop</a>
            </div>
            <ul class="filter-links pt-2">
                <li class="filter-links__item">
                    <a href="#" class="filter-links__link active font16 medium ttu">All</a>
                </li>

                <li class="filter-links__item">
                    <a href="#" class="filter-links__link font16 medium ttu">Originals</a>
                </li>

                <li class="filter-links__item">
                    <a href="#" class="filter-links__link font16 medium ttu">Replicas</a>
                </li>
            </ul>
            <div class="products">
                @foreach($products as $product)
                    <div class="product pt-8">
                        <h2 class="heading-lg medium">{{ $product->name }}</h2>
                        <div class="product__price-box mt-2">
                            <p class="product__price medium">{{$product->price }}DKK</p>
                        </div>
                        <p class="product__description mt-2 font16">
                            {{ str()->words($product->description, 50) }}
                        </p>
                        <img src="{{ asset('img/placeholder.jpg') }}" alt="" class="product__image mt-2">
                        <a href="{{route('products.show', $product->id)}}" class="button-pink-100 ttu mt-2">Buy</a>
                    </div>
                @endforeach
            </div>
        </div>

    </main>
@endsection
