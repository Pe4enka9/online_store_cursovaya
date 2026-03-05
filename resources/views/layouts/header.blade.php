<header class="header mb-4">
    <div class="header__wrapper">
        @include('layouts.logo')
        @include('layouts.nav')

        <div class="header__actions">
            @auth
                <a href="{{ route('carts.show', auth()->user()->cart) }}" class="header__icon">
                    <img src="{{ asset('icons/cart.svg') }}" alt="Корзина"
                         class="header__icon-img image image--contain">
                </a>

                <div class="header__icon" id="profile">
                    <img src="{{ asset('icons/profile.svg') }}" alt="Профиль"
                         class="header__icon-img image image--contain">

                    <div class="header__profile-nav">
                        <div class="header__user">
                            <span class="header__user-name">{{ auth()->user()->name }}</span>
                            <span class="header__user-phone">{{ auth()->user()->phone }}</span>
                        </div>

                        <a href="{{ route('orders.index') }}" class="header__orders">
                            <img src="{{ asset('icons/orders.svg') }}" alt="Мои заказы" class="header__orders-img">
                            <span class="header__orders-link">Мои заказы</span>
                        </a>

                        <form action="{{ route('logout') }}" method="post" class="header__logout">
                            @csrf
                            <img src="{{ asset('icons/enter-gray.svg') }}" alt="Мои заказы" class="header__orders-img">
                            <button type="submit" class="header__logout-link">Выйти</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn--primary">Войти</a>
            @endauth
        </div>
    </div>
</header>
