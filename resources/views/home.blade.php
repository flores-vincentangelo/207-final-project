@extends('layouts.app')
@section('content')
    <x-header-component />
    <div>
        Welcome {{ $user->name }}
    </div>

    <div class="search-container">
        <form action="/home/" method="GET">
            <input type="text" id="query" name="query" placeholder="search">
            <button class="form-button w-2">Search</button>
        </form>
    </div>


    <x-product-list :products="$products" />
    <x-cart-component :cartproducts="$cart_products" />

@endsection