<div class="cart-container bg-white">
    cart
    @php
        $totalCost = 0
    @endphp
    <table>
        <tr>
            <th></th>
            <th>Product Name</th>
            <th>quantity</th>
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
                        <button>Update cart</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div>
        {{ $totalCost }}
    </div>
    <div>
        <a href="/checkout">Checkout</a>
    </div>

</div>