<div class="cart-container bg-white">
    cart products
    @php
        $totalCost = 0
    @endphp
    <table>
        <tr>
            <td></td>
            <td>Product Name</td>
            <td>quantity</td>
        </tr>

        @foreach ($cartproducts as $product)
            @php
                $totalCost += $product->price * $product->pivot->quantity
            @endphp
            <tr>
                <td>
                    <img class="image-styling" src="{{ $product->image }}" alt="">
                </td>
                <td>{{$product->id}}</td>
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

    {{ $totalCost }}
</div>