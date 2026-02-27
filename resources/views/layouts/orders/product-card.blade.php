<div class="product-card">
    <div class="product-card__img-wrapper">
        <img
            src="{{ $product->image_url }}"
            alt="{{ $product->name }}"
            class="image image--contain"
        >
    </div>

    <div class="product-card__content">
        <h3 class="product-card__title">
            <a href="{{ route('products.show', $product) }}" class="product-card__link">{{ $product->name }}</a>
        </h3>

        @isset($product->short_description)
            <p class="product-card__short-description">{{ $product->short_description }}</p>
        @endisset

        <span class="price">{{ number_format($product->pivot->price, 2, ',', ' ') }} руб.</span>
    </div>

    <div class="product-card__quantity text text--large text--bold">
        {{ $product->pivot->quantity }}
    </div>
</div>

