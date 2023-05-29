@extends('app')
@section('shop', 'active')
@section('content')
    <div class="container pb-12">
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

            @if($errors->any)
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif

            @if(session()->has('error'))
                <div class="alert-message mb-4">
                    {{ session()->get('error') }}
                </div>
            @endif

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
                                class="order-preview-box__info "><span
                                    id="product_checkout_total"> {{ $product->price }} </span>/ DKK</span></p>

                        <p class="order-preview-box__info-header mt-2">Delivery information</p>
                        <div>
                            <p class="order-preview-box__info-heading">Delivery type: <span
                                    class="order-preview-box__info" id="checkout_delivery_type_preview">Pick up at {{ $deliveryTypes[0] }}</span></p>
                            <div id="delivery-mail-preview" class="display-none">
                                <p class="order-preview-box__info-heading">City: <span
                                        class="order-preview-box__info" id="checkout_city_preview"></span></p>
                                <p class="order-preview-box__info-heading">Address: <span
                                        class="order-preview-box__info" id="checkout_address_preview"></span></p>
                                <p class="order-preview-box__info-heading">Zip code: <span
                                        class="order-preview-box__info" id=checkout_zip_preview></span></p>
                            </div>
                        </div>

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

                        <div class="form-group">
                            <label for="" class="label">Your phone*</label>
                            <input name="phone" type="text" class="input" required>
                        </div>

                        <h1 class="mb-2">Delivery information</h1>
                        <div class="form-group">
                            <label class="label" for="">Choose delivery</label>
                            <select class="input" id="checkout_location_select" name="delivery_type">
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
                                <input name="city" type="text" class="input" id="checkout_city_input">
                            </div>

                            <div class="form-group">
                                <label for="" class="label">Zip code*</label>
                                <input name="zip_code" type="text" class="input" id="checkout_address_input">
                            </div>

                            <div class="form-group">
                                <label for="" class="label">Address*</label>
                                <input name="address" type="text" class="input" id="checkout_zip_input">
                            </div>
                        </div>

                        <div id="delivery_outside_denmark_form" class="display-none">
                            To recieve an order outside of Denmark please
                            <a href="{{ route('contact.send-email') }}">write us </a>
                            an email to figure out delivery cost.
                        </div>

                        <div class="display-flex align-center" style="height:1.4rem;">
                            <label for="" class="label" style="margin-bottom: 0.2rem;">I agree to the <a href="{{ asset('pdfs/terms-and-conditions') }}" target="blank">Terms & conditions</a></label>
                            <input type="checkbox" name="terms" style="height: 1.6rem; width: 1.6rem; margin-left: 1rem;" required>
                        </div>

                        <input type="submit" value="submit" class="mt-4 button-black-inverse width100 ttu"/>
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

        // Delivery preview elements
        const checkoutDeliveryTypePreviewEl = document.getElementById('checkout_delivery_type_preview')
        const checkoutCityPreviewEl = document.getElementById('checkout_city_preview')
        const checkoutAddressPreviewEl = document.getElementById('checkout_address_preview')
        const checkoutZipPreviewEl = document.getElementById('checkout_zip_preview')

        const deliveryMailPreviewEl = document.getElementById('delivery-mail-preview')

        // Inputs
        const checkoutCityInput = document.getElementById('checkout_city_input')
        const checkoutAddressInput = document.getElementById('checkout_address_input')
        const checkoutZipInput = document.getElementById('checkout_zip_input')


        const calculatePrice = () => {
            const productPrice = ({{ $product->price }}).toFixed(2)
            const quantity = document.getElementById('checkout_quantity_select').value
            const selectedDeliveryOption = document.getElementById('checkout_location_select').value

            let deliveryCost

            if (selectedDeliveryOption === 'delivery_denmark') {
                deliveryCost = ({{ $product->delivery_cost }})
                deliveryDenmarkFormEl.classList.remove('display-none')
                countrySelectEl.disabled = selectedDeliveryOption === 'delivery_denmark'
                checkoutDeliveryCostEl.innerHTML = deliveryCost.toFixed(2)
                deliveryOutsideDenmarkFormEl.classList.add('display-none')
                deliveryMailPreviewEl.classList.remove('display-none')
            } else if (selectedDeliveryOption === 'delivery_outside_denmark') {
                deliveryCost = 0
                deliveryDenmarkFormEl.classList.add('display-none')
                deliveryOutsideDenmarkFormEl.classList.remove('display-none')
                deliveryMailPreviewEl.classList.add('display-none')

            } else {
                deliveryCost = 0
                deliveryDenmarkFormEl.classList.add('display-none')
                deliveryOutsideDenmarkFormEl.classList.add('display_none')
                deliveryMailPreviewEl.classList.add('display-none')
            }

            const totalPrice = ((productPrice * quantity) + deliveryCost).toFixed(2)

            checkoutTotalEl.innerHTML = totalPrice

            checkoutQuantityEl.innerHTML = quantity
        }

        const updateDeliveryPreview = () => {
            const checkoutCityInputValue = document.getElementById('checkout_city_input').value
            const checkoutAddressInputValue = document.getElementById('checkout_address_input').value
            const checkoutZipInputValue = document.getElementById('checkout_zip_input').value
            const selectedDeliveryOption = document.getElementById('checkout_location_select').value


            checkoutCityPreviewEl.innerHTML = checkoutCityInputValue
            checkoutAddressPreviewEl.innerHTML = checkoutAddressInputValue
            checkoutZipPreviewEl.innerHTML = checkoutZipInputValue

            if(selectedDeliveryOption === 'location_a') {
                checkoutDeliveryTypePreviewEl.innerHTML = '{{ $deliveryTypes[0] }}'
            } else if(selectedDeliveryOption === 'location_b') {
                checkoutDeliveryTypePreviewEl.innerHTML = '{{ $deliveryTypes[1] }}'
            } else if(selectedDeliveryOption === 'delivery_denmark') {
                checkoutDeliveryTypePreviewEl.innerHTML = '{{ $deliveryTypes[2] }}'
            } else if(selectedDeliveryOption === 'delivery_outside_denmark') {
                checkoutDeliveryTypePreviewEl.innerHTML = '{{ $deliveryTypes[3] }}'
            }
        }

        checkoutLocationSelectEl.addEventListener('change', () => {
            calculatePrice()
            updateDeliveryPreview()
        })
        checkoutQuantitySelectEl.addEventListener('change', calculatePrice)

        checkoutCityInput.addEventListener('keyup', updateDeliveryPreview)
        checkoutAddressInput.addEventListener('keyup', updateDeliveryPreview)
        checkoutZipInput.addEventListener('keyup', updateDeliveryPreview)
    </script>
@endsection
