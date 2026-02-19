<div class="card">
    <div class="card__img-wrapper">
        <img
            src="https://basket-01.wbbasket.ru/vol3/part374/374808/images/big/1.webp"
            alt="{{ $product->name }}"
            class="card__img"
        >
    </div>

    <div class="card__content">
        <h3 class="card__title">{{ $product->name }}</h3>
        <span class="price">{{ $product->price }} руб.</span>
        <button type="button" class="btn btn--primary">Купить</button>
    </div>
</div>
