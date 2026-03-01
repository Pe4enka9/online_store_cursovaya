<div class="product-card">
    <a href="{{ route('products.show', $product) }}" class="product-card__img-wrapper">
        <img
            src="{{ $product->image_url }}"
            alt="{{ $product->name }}"
            class="image image--cover"
        >
    </a>

    <div class="product-card__content">
        <h3 class="product-card__title">
            <a href="{{ route('products.show', $product) }}" class="product-card__link">{{ $product->name }}</a>
        </h3>

        <div class="product-card__info">
            @include('layouts.product-card.info', ['text' => "$product->players_min-$product->players_max", 'image' => asset('icons/players.svg'), 'alt' => 'Количество игроков'])
            @include('layouts.product-card.info', ['text' => "$product->play_time мин", 'image' => asset('icons/time.svg'), 'alt' => 'Время игры'])
            @include('layouts.product-card.info', ['text' => "$product->age_rating+"])
        </div>

        <div class="prices">
            <span class="price">@price($product->price) ₽</span>

            @isset($product->old_price)
                <span class="old-price">@price($product->old_price) ₽</span>
            @endisset
        </div>

        <form action="{{ route('carts.add', $product) }}" method="post">
            @csrf
            <button type="submit" class="btn btn--primary btn--w100">
                <img src="{{ asset('icons/white-cart.svg') }}" alt="В корзину" class="btn__icon">
                В корзину
            </button>
        </form>
    </div>

    <div class="badges">
        @if($product->is_new)
            @include('layouts.badge', ['text' => 'Новинка', 'mod' => 'new'])
        @endif

        @if($product->is_bestseller)
            @include('layouts.badge', ['text' => 'Хит', 'mod' => 'hit', 'image' => asset('icons/hit.svg')])
        @endif

        @isset($product->old_price)
            @include('layouts.badge', ['text' => '-14%', 'mod' => 'sale'])
        @endisset
    </div>
</div>
