@extends('app')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
            <p class="breadcrumbs__slash">/</p>
            <p
               class="breadcrumbs__link breadcrumbs__link-active">Purchase confirmation</p>
        </div>

        <div class="center pt-4">
            <i class="fa-solid fa-circle-check icon-xll" style="color: #25a61c;"></i>
            <h1 class="heading-lg medium checkout-success__heading pt-4">Thank you for your purchase!</h1>
            <p class="heading-sm pt-2">You will receive an email with your order confirmation shortly.</p>
            <div class="pt-4">
                <a href="{{ route('products.index') }}" class="link-button-underline">
                    Go back home &rarr;
                </a>
            </div>
        </div>
    </div>
@endsection
