@extends('layouts.app')
@section('content')
    <x-header-component/>
    <x-product-list :products="$products" />
    <x-cart-component :cartproducts="$cart_products" />

@endsection