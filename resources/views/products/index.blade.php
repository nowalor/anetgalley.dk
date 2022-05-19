@extends('app')
@section('title', 'Homepage')

@section('content')
    <main>
        <div class="container">
            <div class="products">
                @foreach($products as $product)
                    <div class="product">
                        <h2 class="heading-lg medium">{{ $product->name }}</h2>
                        <div class="product__price-box">
                            <p class="product__price">{{$product->price }}DKK</p>
                        </div>
                        <p class="product__description">
                            {{ str()->words($product->description, 50) }}
                        </p>
                        <img src="{{ asset('img/placeholder.jpg') }}" alt="" class="product__image">
                        <a href="{{route('products.show', $product->id)}}" class="button button__pink">BUY</a>
                    </div>
                @endforeach
            </div>
        </div>

    </main>
@endsection
