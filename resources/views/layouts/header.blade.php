<header class="header mb-4">
    <div class="header__wrapper">
        @include('layouts.logo')
        @include('layouts.nav')

        <div class="header__actions">
            <div class="header__cart">
                <img src="{{ asset('icons/cart.svg') }}" alt="Корзина" class="header__cart-img image image--contain">
            </div>

            <a href="{{ route('login') }}" class="btn btn--primary">Войти</a>
        </div>
    </div>
</header>
