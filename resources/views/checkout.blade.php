@extends('layouts.app')
@section('content')
    <div class="checkout h-screen w-screen flex flex-col items-center justify-center">
        @php
            $totalCost = 0
        @endphp
        <div class="table-container shadowing bg-white flex flex-col items-center p-3">
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
                        <td>{{$product->name}}</td>
                        <td>{{$product->pivot->quantity}}</td>
                        <td>{{number_format($product->price, 2)}}</td>
                        <td>{{number_format($product->price * $product->pivot->quantity, 2)}}</td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection