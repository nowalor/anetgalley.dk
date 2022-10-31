@extends('app')
@section('shop', 'active')
@section('content')
    <div class="modal-container display-none" id="show-product-modal">
        <img id="show-product-modal-img" class="modal-image"/>

    </div>
    <div class="container">
        <div class="product-checkout-page">
            <div class="breadcrumbs">
                <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
                <p class="breadcrumbs__slash">/</p>
                <a href="{{ route('products.index') }}" class="breadcrumbs__link">Shop</a>
                <p class="breadcrumbs__slash">/</p>
                <a href="{{ route('products.show', $product) }}" class="breadcrumbs__link">{{ $product->name }}</a>
                <p class="breadcrumbs__slash">/</p>
                <p class="breadcrumbs__link breadcrumbs__link-active">Checkout</p>
            </div>

            <div class="display-flex pt-8">
                <div class="width50"></div>
                <div class="width50">
                    <form action="{{ route('checkout.products.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product-id" value="{{ $product->id }}">
                        <h1 class="mb-2">Invoice information</h1>
                        <div class="form-group">
                            <label class="label" for="">Quantity</label>
                            <select class="input" name="quantity">
                                @for($i = 1; $i <= $product->quantity; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="label">Your name*</label>
                            <input name="name" type="text" class="input" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="label">Your email*</label>
                            <input name="email" type="text" class="input" required>
                        </div>

                        <h1 class="mb-2">Delivery information</h1>
                        <div class="form-group">
                            <label class="label" for="">Choose delivery</label>
                            <select class="input" id="checkout_location_select">
                                <option value="location_a">Pick up at location A</option>
                                <option value="location_b">Pick up at location B</option>
                                <option value="delivery_denmark">Delivery within Denmark</option>
                                <option value="delivery_outside_denmark">Delivery outside of Denmark</option>
                            </select>

                            <div id="delivery_denmark_form" class="display-none">
                                <div class="form-group">
                                    <label for="" class="label">City*</label>
                                    <input name="text" type="text" class="input">
                                </div>

                                <div class="form-group">
                                    <label for="" class="label">Zip code*</label>
                                    <input name="text" type="text" class="input">
                                </div>

                                <div class="form-group">
                                    <label for="" class="label">Address*</label>
                                    <input name="text" type="text" class="input">
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="buy" class="mt-2 button-pink-100 ttu"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const checkoutLocationSelectEl = document.getElementById('checkout_location_select')
        const deliveryDenmarkFormEl = document.getElementById('delivery_denmark_form')

        const handleChangeDelivery = (deliveryType) => {
            if (
                deliveryType === 'delivery_denmark' ||
                deliveryType === 'delivery_outside_denmark'
            ) {
                deliveryDenmarkFormEl.classList.remove('display-none')
            } else {
                deliveryDenmarkFormEl.classList.add('display-none')

            }
        }

        checkoutLocationSelectEl.addEventListener('change', (event) => handleChangeDelivery(event.target.value))
    </script>
@endsection
