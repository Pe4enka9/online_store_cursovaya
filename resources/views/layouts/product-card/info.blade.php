<div class="product-card__info-item">
    @isset($image)
        <img src="{{ $image }}" alt="{{ $alt }}" class="product-card__info-img">
    @endisset

    <span class="product-card__info-text">{{ $text }}</span>
</div>
