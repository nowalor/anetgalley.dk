@extends('app')
@section('title', 'Homepage')
@section('shop', 'active')

@section('content')
    <main>
        <div class="container pb-8">
            <div class="breadcrumbs">
                <a href="{{ route('home') }}" class="breadcrumbs__link">{{ __('shop.home') }}</a>
                <p class="breadcrumbs__slash">/</p>
                <a href="{{ route('products.index') }}" class="breadcrumbs__link breadcrumbs__link-active">{{ __('shop.shop') }}</a>
            </div>
            <ul class="filter-links pt-2">
                <li class="filter-links__item">
                    <a href="{{ route('products.index') }}"
                       class="filter-links__link font16 medium ttu @if(Request::query('filter') == 0) active @endif }}">{{ __('shop.all') }}</a>
                </li>

                <li class="filter-links__item">
                    <a href="{{ route('products.index', ['filter' => 'original']) }}"
                       class="filter-links__link font16 medium ttu @if(Request::query('filter') === 'original') active @endif">{{ __('shop.originals') }}</a>
                </li>

                <li class="filter-links__item">
                    <a href="{{ route('products.index', ['filter' => 'replica']) }}"
                       class="filter-links__link font16 medium ttu @if(Request::query('filter') === 'replica') active @endif">{{ __('shop.replicas') }}</a>
                </li>
            </ul>
            <div class="products">
                @forelse($products as $product)
                    <div class="product pt-8">
                        <h2 class="heading-lg medium">{{ $product->name }}</h2>
                        <div class="product__price-box mt-2">
                            <p class="product__price medium">{{$product->price }}DKK</p>
                        </div>
                        <p class="product__description mt-2 font16">
                            {{ str()->words($product->description, 50) }}
                        </p>
                        <img src="{{ asset("storage/product-images/$product->id/$product->image_url") }}" alt=""
                             class="product__image mt-2">
                        <a href="{{route('products.show', $product->id)}}" class="button-pink-100 ttu mt-2">{{ __('shop.view_product') }}</a>
                    </div>
                    @empty
                    <p class="heading-md mt-2">No products match criteria.</p>
                @endforelse
            </div>
            @if($products->hasPages())
                {{ $products->links('components.product-paginator') }}
            @endif

        </div>
    </main>
@endsection
