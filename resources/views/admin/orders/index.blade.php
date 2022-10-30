@extends('app')
@section('title', 'Admin - Orders')
@section('content')
    <div class="container pt-4">

        @if(Session::has('order-deleted'))
            <p class="alert-message mb-4">{{ Session::get('order-deleted') }}</p>
        @endif

        @if(Session::has('order-completed'))
            <p class="success-message mb-4">{{ Session::get('order-completed') }}</p>
        @endif

        <div class="display-flex align-center justify-space-between width100 mb-3">
            <h1 class="heading-lg">Products</h1>
        </div>
        <div class="admin-product-header">
            <div class="admin-product-header__item">Product name</div>
            <div class="admin-product-header__item">Product Price</div>
            <div class="admin-product-header__item">Invoice number</div>
            <div class="admin-product-header__item">Buyer name</div>
            <div class="admin-product-header__item">Buyer email</div>
            <div class="admin-product-header__item">Buyer phone</div>
            <div class="admin-product-header__item">Actions</div>
        </div>
        @forelse($orders as $order)
            <div class="admin-products">
                <div class="admin-products__item">{{ $order->product->name }}</div>
                <div class="admin-products__item">{{ $order->product->price }} / DKK</div>
                <div class="admin-products__item">{{ $order->invoice->invoice_number }}</div>
                <div class="admin-products__item">{{ $order->invoice->buyer_name }}</div>
                <div class="admin-products__item">{{ $order->invoice->buyer_email  }}</div>
                <div class="admin-products__item">{{ $order->invoice->buyer_phone  }}</div>
                <div class="admin-products__item admin-products__actions">
                    <a class="view-button" href="{{ route('admin.orders.show', $order) }}">View</a>
                    <form method="POST" action="{{ route('admin.orders.update', $order) }}">
                        @csrf
                        @method('PUT')
                        <button onclick="return confirm('Are you sure?')" class="edit-button">Complete</button>
                    </form>
                    <form method="POST" action="{{ route('admin.orders.destroy', $order) }}">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="delete-button">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <h2 class="heading-md pt-2">No orders at the moment. When they are finished they will be added here</h2>
        @endforelse
    </div>

@endsection
