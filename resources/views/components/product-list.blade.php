<div class="flex flex-col items-center">
    this is products list

    @foreach ($products as $product)

    <div class="product-list-container">
        <div class="product-list-entry">image</div>
        <div class="product-list-entry">{{$product['name']}}</div>
        <div class="product-list-entry .product-list-description bg-green">{{$product['description']}}</div>
        <div class="product-list-entry">{{$product['price']}}</div>
    </div>
        
    @endforeach
</div>