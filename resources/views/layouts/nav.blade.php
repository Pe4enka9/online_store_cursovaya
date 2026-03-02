<nav class="nav">
    <a href="{{ route('home') }}" class="nav__link">Каталог</a>

    @auth
        <a href="{{ route('orders.index') }}" class="nav__link">Мои заказы</a>

        @if(auth()->user()->is_admin)
            <a href="{{ route('admin.index') }}" class="nav__link">Админ-панель</a>
        @endif

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn--danger">Выйти</button>
        </form>
    @endauth
</nav>
