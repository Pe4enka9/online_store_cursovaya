<div class="card">
    <div class="card__img-wrapper">
        <img
            src="{{ $product->image_url }}"
            alt="{{ $product->name }}"
            class="image image--contain"
        >
    </div>

    <div class="card__content">
        <h3 class="card__title">
            <a href="{{ route('products.show', $product) }}" class="card__link">{{ $product->name }}</a>
        </h3>

        @isset($product->short_description)
            <p class="card__short-description">{{ $product->short_description }}</p>
        @endisset

        <div class="prices">
            <span class="price">{{ number_format($product->price, 2, ',', ' ') }} руб.</span>

            @isset($product->old_price)
                <span class="old-price">@price($product->old_price) руб.</span>
            @endisset
        </div>

        @if($cartItems->has($product->id))
            @php($cartItem = $cartItems[$product->id])
            <div class="buttons">
                <form action="{{ route('carts.subtract', $product) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn--danger">-</button>
                </form>

                <span class="text text--center">{{ $cartItem->pivot->quantity }}</span>

                <form action="{{ route('carts.add', $product) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn--primary">+</button>
                </form>
            </div>
        @else
            <form action="{{ route('carts.add', $product) }}" method="post">
                @csrf
                <button type="submit" class="btn btn--primary">В корзину</button>
            </form>
        @endif
    </div>
</div>
