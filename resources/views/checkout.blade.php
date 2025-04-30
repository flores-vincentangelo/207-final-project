@extends('layouts.app')
@section('content')
    <x-header-component />
    <div class="checkout h-screen w-screen flex flex-col items-center justify-center">
        @php
            $totalCost = 0
        @endphp
        <div class="home-button-container">
            <a href="/">< Back to Home</a>
        </div>
        <div class="table-container shadowing curve-edge bg-white flex flex-col items-center p-3">
            <h1 class="text-dark-green">Products</h1>
            <table class="">
                <tr class="header-row">
                    <th></th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th>Total price</th>
                </tr>
                @foreach ($cartproducts as $product)
                    @php
                        $totalCost += $product->price * $product->pivot->quantity
                    @endphp
                    <tr>
                        <td>
                            <img class="image-styling" src="{{ $product->image }}" alt="">
                        </td>
                        <td>{{ $product->name}}</td>
                        <td>{{ $product->pivot->quantity}}</td>
                        <td>{{ number_format($product->price, 2)}}</td>
                        <td>{{ number_format($product->price * $product->pivot->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="total-row flex flex-row items-center justify-between text-dark-green">
                <h2>Total</h2>
                <h2>{{ number_format($totalCost, 2) }}</h2>
            </div>
        </div>
    </div>
@endsection