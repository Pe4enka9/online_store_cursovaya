<nav>
    @if(!auth()->check())
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
    @else
        <a
            href="{{ route('login') }}"
            class="{{ request()->routeIs('home') ? 'active' : '' }}"
        >
            Главная
        </a>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn--danger">Выйти</button>
        </form>
    @endif
</nav>
