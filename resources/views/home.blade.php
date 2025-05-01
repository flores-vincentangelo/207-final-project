@extends('layouts.app')
@section('content')

    <div class="black-overlay transition ease-in-out duration-200 hidden" 
        :class="{'hidden': !filterOpen && !cartOpen }" 
        @click="cartOpen = false; filterOpen = false;"></div>
    <x-header-component :displaycart="$displayCart" />
    <div class="search-container flex flex-row items-center justify-center">
        <div class="svg-container bg-green hover:bg-dark-green flex flex-row items-center rounded-lg">
            <button @click="filterOpen = !filterOpen" class="flex flex-row items-center">

            <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 3H16V1H0V3Z" fill="#000000" />
                <path d="M2 7H14V5H2V7Z" fill="#000000" />
                <path d="M4 11H12V9H4V11Z" fill="#000000" />
                <path d="M10 15H6V13H10V15Z" fill="#000000" />
            </svg>
            </button>
        </div>
        <form action="/home/" method="GET">
            <input type="text" id="query" name="query" placeholder="search">
            <button class="form-button">Search</button>
        </form>
    </div>
    <x-filter-menu-component />
    <x-product-list :products="$products" />
    <x-cart-component :cartproducts="$cart_products" />

@endsection