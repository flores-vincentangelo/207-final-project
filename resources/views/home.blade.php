@extends('layouts.app')
@section('content')
    <div>
        This is the home page
    </div>
    <div>
        Welcome {{ $user->name }}
    </div>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>

    <x-product-list :products="$products" />
    <x-cart-component :cartproducts="$cart_products" />

@endsection