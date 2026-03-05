@extends('theme')
@section('title', 'Админ-панель')
@section('content')
    <div class="title title--center mb-2">
        <img src="{{ asset('icons/admin.svg') }}" alt="" class="title__icon">
        <h1 class="title__header title__header--small">Админ-панель</h1>
    </div>

    <div class="admin-buttons mb-2">
        <a href="{{ route('admin.products.index') }}" class="admin-buttons__btn active">
            <img src="{{ asset('icons/orders-black.svg') }}" alt="Товары" class="admin-buttons__icon">
            Товары
        </a>

        <a href="{{ route('admin.categories.index') }}" class="admin-buttons__btn">
            <img src="{{ asset('icons/categories.svg') }}" alt="Категории" class="admin-buttons__icon">
            Категории
        </a>

        <a href="{{ route('admin.categories.index') }}" class="admin-buttons__btn">
            <img src="{{ asset('icons/publishers.svg') }}" alt="Издатели" class="admin-buttons__icon">
            Издатели
        </a>

        <a href="{{ route('admin.orders.index') }}" class="admin-buttons__btn">
            <img src="{{ asset('icons/cart.svg') }}" alt="Заказы" class="admin-buttons__icon">
            Заказы
        </a>
    </div>

    <div class="admin-search">
        <form class="search">
            <div class="search__input-wrapper input-wrapper">
                <input type="search" name="search" id="search" class="search__input"
                       placeholder="Поиск товаров..." value="{{ request()->search }}">
            </div>
        </form>

        <a href="{{ route('admin.products.create') }}" class="admin-search__btn btn btn--primary">
            <img src="{{ asset('icons/plus.svg') }}" alt="Добавить" class="btn__icon">
            Добавить
        </a>
    </div>
@endsection
