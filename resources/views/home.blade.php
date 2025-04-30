@extends('layouts.app')
@section('content')
    <div>
        Welcome {{ $user->name }}
    </div>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>

    <form action="/home/" method="GET">
        <input type="text" id="query" name="query" placeholder="search">
        <button class="form-button">Search</button>
    </form>

    <x-product-list :products="$products" />
    <x-cart-component :cartproducts="$cart_products" />

@endsection