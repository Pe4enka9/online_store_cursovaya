@extends('theme')
@section('title', $product->name)
@section('content')
    <div class="product-show">
        <div class="product-show__img-wrapper">
            <img
                src="{{ $product->image ?? asset('images/no-image.png') }}"
                alt="{{ $product->name }}"
                class="image image--contain"
            >
        </div>

        <div class="product-show__content">
            <h1 class="product-show__title">{{ $product->name }}</h1>

            <div class="product-show__categories-wrapper">
                @foreach($product->categories as $category)
                    <a
                        href="{{ route('categories.products', $category) }}"
                        class="text product-show__category-item"
                    >
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <p class="product-show__description">{{ $product->description ?? 'Нет описания.' }}</p>

            <div class="prices">
                <span class="price">{{ number_format($product->price, 2, ',', ' ') }} руб.</span>

                @isset($product->old_price)
                    <span class="old-price">{{ number_format($product->old_price, 2, ',', ' ') }} руб.</span>
                @endisset
            </div>

            <div class="product-show__info">
                <div class="product-show__product-info">
                    <span class="text product-show__stock-quantity">Осталось: {{ $product->stock_quantity }} шт.</span>
                    <span class="text product-show__sku">Артикул: {{ $product->sku }}</span>
                    <span class="text product-show__publisher">Издатель: {{ $product->publisher->name }}</span>
                </div>

                <div class="product-show__game-info">
                    @if($product->players_min && $product->players_max)
                        <span class="text product-show__players-quantity">
                            Кол-во игроков: {{ $product->players_min }} - {{ $product->players_max }}
                        </span>
                    @else
                        <span class="text product-show__players-quantity">
                            Кол-во игроков: {{ $product->players_min }}
                        </span>
                    @endif

                    <span class="text product-show__play-time">Время игры: {{ $product->play_time }} мин.</span>
                    <span class="text product-show__age-rating">
                        Возрастное ограничение: {{ $product->age_rating }}+
                    </span>
                </div>
            </div>

            <button type="button" class="btn btn--primary product-show__btn">В корзину</button>
        </div>
    </div>
@endsection
