<div :class="{'translate-x-full': !cartOpen}" class="shadowing cart-container bg-white z-10 fixed inset-y-0 right-0 top-0 transition eas-in-out duration-200 ">
    cart
    <div>
        <button @click="cartOpen = ! cartOpen">close</button>
    </div>
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