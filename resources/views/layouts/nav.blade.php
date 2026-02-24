<nav>
    @auth
        <a
            href="{{ route('login') }}"
            class="{{ request()->routeIs('home') ? 'active' : '' }}"
        >
            Главная
        </a>

        <a
            href="{{ route('carts.show', auth()->user()->cart) }}"
            class="{{ request()->routeIs('carts.show') ? 'active' : '' }}"
        >
            Корзина
        </a>

        @if(auth()->user()->is_admin)
            <a
                href="{{ route('admin.index') }}"
                class="{{ request()->routeIs('admin.*') ? 'active' : '' }}"
            >
                Админ-панель
            </a>
        @endif

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn--danger">Выйти</button>
        </form>
    @else
        <a
            href="{{ route('register') }}"
            class="{{ request()->routeIs('register') ? 'active' : '' }}"
        >
            Регистрация
        </a>

        <a
            href="{{ route('login') }}"
            class="{{ request()->routeIs('login') ? 'active' : '' }}"
        >
            Вход
        </a>
    @endauth
</nav>
