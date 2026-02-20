<div class="card">
    <div class="card__img-wrapper">
        <img
            src="{{ $product->image ?? asset('images/no-image.png') }}"
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
                <span class="old-price">{{ number_format($product->old_price, 2, ',', ' ') }} руб.</span>
            @endisset
        </div>

        <button type="button" class="btn btn--primary">В корзину</button>
    </div>
</div>
