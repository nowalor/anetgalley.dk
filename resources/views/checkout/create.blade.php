@extends('app')
@section('shop', 'active')
@section('content')
    <div class="container pb-4">
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
                <div class="width50">
                    <h1 class="mb-2">Your order</h1>

                    <div class="order-preview-box">
                        <h1 class="mb-2">Your order</h1>
                        <img src="{{ $product->productImageUrl }}" class="order-preview-box__img">
                        <p class="order-preview-box__info-header">Order information</p>
                        <p class="order-preview-box__info-heading">Product name: <span
                                class="order-preview-box__info">{{ $product->name }}</span></p>
                        <p class="order-preview-box__info-heading">Product price: <span
                                class="order-preview-box__info">{{ $product->price }} / DKK</span></p>
                        <p class="order-preview-box__info-heading">Quantity: <span
                                class="order-preview-box__info" id="product_checkout_quantity">1</span></p>
                        <p class="order-preview-box__info-heading">Delivery cost: <span
                                class="order-preview-box__info"><span id="product_checkout_delivery_cost">0</span> / Dkk</span>
                        </p>
                        <p class="order-preview-box__info-heading">Total cost: <span
                                class="order-preview-box__info"><span
                                    id="product_checkout_total"> {{ $product->price }} </span>/ DKK</span></p>
                    </div>
                </div>
                <div class="width50">
                    <form action="{{ route('checkout.products.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product-id" value="{{ $product->id }}">
                        <h1 class="mb-2">Invoice information</h1>
                        <div class="form-group">
                            <label class="label" for="">Quantity</label>
                            <select class="input" name="quantity" id="checkout_quantity_select">
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
                        </div>

                        <div id="delivery_denmark_form" class="display-none">
                            <div class="form-group">
                                <label for="" class="label">Country*</label>
                                <select id="checkout_country_select" class="input">
                                    <option>Denmark</option>
                                    <option>Iceland</option>
                                    <option>USA</option>
                                </select>
                            </div>

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

                        <div id="delivery_outside_denmark_form" class="display-none">
                            To recieve an order outside of Denmark please
                            <a href="{{ route('contact.send-email') }}">write us </a>
                            an email to figure out delivery cost.
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
        const deliveryOutsideDenmarkFormEl = document.getElementById('delivery_outside_denmark_form')
        const countrySelectEl = document.getElementById('checkout_country_select')
        const checkoutQuantitySelectEl = document.getElementById('checkout_quantity_select')

        // Checkout preview elements
        const checkoutQuantityEl = document.getElementById('product_checkout_quantity')
        const checkoutTotalEl = document.getElementById('product_checkout_total')
        const checkoutDeliveryCostEl = document.getElementById('product_checkout_delivery_cost')


        const calculatePrice = () => {
            const productPrice = ({{ $product->price }}).toFixed(2)
            const quantity = document.getElementById('checkout_quantity_select').value
            const selectedDeliveryOption = document.getElementById('checkout_location_select').value

            let deliveryCost

            console.log('selectedDeliveryOption', selectedDeliveryOption)

            if (selectedDeliveryOption === 'delivery_denmark') {
                deliveryCost = ({{ $product->delivery_cost }})
                deliveryDenmarkFormEl.classList.remove('display-none')
                countrySelectEl.disabled = selectedDeliveryOption === 'delivery_denmark'
                checkoutDeliveryCostEl.innerHTML = deliveryCost.toFixed(2)
                deliveryOutsideDenmarkFormEl.classList.add('display_none')
            } else if (selectedDeliveryOption === 'delivery_outside_denmark') {
                deliveryCost = 0
                deliveryDenmarkFormEl.classList.add('display-none')
                deliveryOutsideDenmarkFormEl.classList.remove('display-none')
            } else {
                deliveryCost = 0
                deliveryDenmarkFormEl.classList.add('display-none')
                deliveryOutsideDenmarkFormEl.classList.add('display_none')
            }

            const totalPrice = ((productPrice * quantity) + deliveryCost).toFixed(2)

            checkoutTotalEl.innerHTML = totalPrice

            checkoutQuantityEl.innerHTML = quantity
        }

        checkoutLocationSelectEl.addEventListener('change', calculatePrice)
        checkoutQuantitySelectEl.addEventListener('change', calculatePrice)
    </script>
@endsection
