<div class="flex flex-col items-center">
    @foreach ($products as $product)
        <div class="product-list-container shadowing bg-white p-3 flex flex-row">
            <div class="product-list-entry">
                <img
                    class="image-styling" 
                    src="{{ $product->image }}" alt="">
            </div>
            <div class="flex flex-col">
                <div class="product-list-entry">{{$product->name}}</div>
                <div class="product-list-entry .product-list-description bg-green">{{$product->description}}</div>
                <div class="product-list-entry">{{$product->price}}</div>
            </div>
            <div>
                <form action="/add-to-cart/{{ $product->id }}" method="POST">
                    @csrf
                    <input type="number" name="quantity" id="quantity" value=1>
                    <button>Add to cart</button>
                </form>
            </div>
        </div>

    @endforeach
</div>