<div :class="{'translate-x-full': !cartOpen}" class="shadowing cart-container bg-white z-10 fixed inset-y-0 right-0 top-0 transition ease-in-out duration-200 translate-x-full">
    <div class="flex flex-col items-center">
        <div class="close-container flex flex-row items-center">
            <button @click="cartOpen = ! cartOpen">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                    <path fill="#000000" d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504 738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512 828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496 285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512 195.2 285.696a64 64 0 0 1 0-90.496z"/>
                </svg>
            </button>
        </div>
        <div class="flex flex-row justify-center items-center w-full">
            <h2>
                Cart
            </h2>
        </div>

        <div>
            @php
            $totalCost = 0
        @endphp
        <table>
            <tr>
                <th></th>
                <th>Product Name</th>
                <th>Quantity</th>
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
                    <td>
                        <form action="/update-cart/{{ $product->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" id="quantity" value={{ $product->pivot->quantity }}>
                            <button class="form-button">Update cart</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="total-row flex flex-row items-center justify-between text-dark-green">
            <h3>Total</h3>
            <h3>{{ number_format($totalCost, 2) }}</h3>
        </div>
        <div class="checkout-button-container w-full flex flex-row justify-center items-center">
            <a href="/checkout">
                <button class="form-button">
                    Checkout
                </button>
            </a>
        </div>
        </div>
    </div>
</div>