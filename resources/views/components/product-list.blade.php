<div class="product-list-container flex flex-row flex-wrap justify-center">
    @foreach ($products as $product)
        <div class="product-card shadowing curve-edge bg-white">
            <div class="product-list-entry">
                <img class="image-styling" src="{{ $product->image }}" alt="">
            </div>
            <div class="details-container">
                <h3>{{$product->name}}</h3>
                <div class="product-list-entry product-list-description">{{$product->description}}</div>
                <div class="product-list-entry"><b>Price:</b> {{ number_format($product->price, 2) }}</div>
                <div class="rating-container"><b>Rating:</b> 
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $product->rating)
                            <svg class="filled" viewBox="0 0 24 24">
                            
                        @else
                            <svg viewBox="0 0 24 24">
                        @endif
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.19989 20.3953C5.12432 20.6752 5.04625 20.9642 4.96473 21.2631C4.81941 21.7959 4.26967 22.1101 3.73684 21.9648C3.20402 21.8194 2.88989 21.2697 3.03521 20.7369C3.11711 20.4366 3.19659 20.141 3.27481 19.8501C3.89341 17.5496 4.43255 15.5445 5.4577 13.856C6.65976 11.8761 8.47999 10.3833 11.6153 9.07691C12.1251 8.86449 12.7106 9.10557 12.923 9.61537C13.1354 10.1252 12.8944 10.7106 12.3846 10.9231C9.51993 12.1167 8.0902 13.3738 7.16728 14.894C6.29972 16.3229 5.8386 18.0304 5.19989 20.3953Z"
                                fill="#323232" />
                            <path
                                d="M19.7876 2.63999C13.4875 1.13059 8.1545 2.16695 4.98951 5.03284C1.93684 7.79703 1.1376 12.0409 3.15904 16.6257C3.54045 15.4554 3.98936 14.3476 4.60288 13.3371C5.94458 11.1272 7.96014 9.51658 11.2307 8.15384C12.2503 7.72901 13.4212 8.21116 13.8461 9.23076C14.2709 10.2504 13.7888 11.4213 12.7692 11.8461C10.0401 12.9833 8.80547 14.1226 8.02204 15.413C7.44205 16.3682 7.05658 17.474 6.62903 18.9706C11.9349 18.773 15.6883 17.5773 18.1717 15.2934C20.7446 12.9272 21.7683 9.56634 21.9638 5.5431C22.0302 4.17924 21.1174 2.9586 19.7876 2.63999Z"
                                fill="#323232" />
                        </svg>
                    @endfor




                </div>
            </div>
            <div class="action-container flex flex-row items-center">
                <form action="/add-to-cart/{{ $product->id }}" method="POST" class="w-full">
                    @csrf
                    <input type="number" name="quantity" id="quantity" value=1>
                    <button class="form-button">Add to cart</button>
                </form>
            </div>
        </div>

    @endforeach
</div>