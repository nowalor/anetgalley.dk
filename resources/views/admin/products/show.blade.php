@extends('app')
@section('shop', 'active')
@section('content')
    <div class="modal-container display-none" id="show-product-modal">
        <img id="show-product-modal-img" class="modal-image"/>
    </div>
    <div class="container single-product-page">
        <div class="single-product">
            <div class="center pt-2 pb-8">
                <span class="single-product__price">
                    {{ round($product->price) }}DKK
                </span>
            </div>

            <div class="display-flex">
                <div class="width50 relative">
                    @if(session()->has('additional_image_deleted'))
                        <div class="alert alert-success">
                            {{ session()->get('additional_image_deleted') }}
                        </div>
                    @endif
                    <img id="selected-product-image" src="{{ $product->productImageUrl }}" alt=""
                         class="single-product__image">

                    <div class="single-product__grid">
                        <img
                            onClick="openModal('{{ $product->productImageUrl }}')"
                            src="{{ $product->productImageUrl }}"
                            alt="" class="single-product__grid-img">
                        @foreach($additionalImages as $image)
                            <div>
                                <img
                                    onClick="openModal('{{ $image->url }}')"
                                    src="{{ $image->url }}"
                                    alt="" class="single-product__grid-img">
                                <form action=" {{route('admin.additional-image.delete', $image)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button-danger">Delete 🗑️</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="width50">
                    <div class="single-product__content">
                        <h1 class="heading-lg medium">{{ $product->name }}</h1>

                        <div class="description-and-information">
                            <div class="header-links display-flex">
                                <h3 id="description-link" class="font16 bold active ttu">Description</h3>
                                <h3 id="additional-information-link" class="font16 bold ttu">Additional information</h3>
                            </div>
                            <p id="single-product-description" class="description">
                                {{ $product->description }}
                            </p>
                            <div id="single-product-information" class="additional-information display-none">
                                <div class="information-box">
                                    <div class="information-box__row display-flex justify-space-between">
                                        <h3 class="ttu medium heading-sm">Dimensions:</h3>
                                        <h3 class="heading sm text-lighter">{{ $product->dimensions }}</h3>
                                    </div>

                                    <div class="information-box__row display-flex justify-space-between">
                                        <h3 class="ttu medium heading-sm">Weight:</h3>
                                        <h3 class="heading sm text-lighter">{{ $product->weight }}</h3>
                                    </div>

                                    <div class="information-box__row display-flex justify-space-between">
                                        <h3 class="ttu medium heading-sm">Material:</h3>
                                        <h3 class="heading sm text-lighter">{{ $product->material }}</h3>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-1">
                            <div class="btn btn-warning">Edit</div>
                            <div class="btn btn-danger">Delete</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/single-product.js') }}"></script>
    <script src="{{ asset('js/modal-image-slider.js') }}"></script>
@endsection
