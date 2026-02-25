@extends('theme')
@section('title', 'Корзина')
@section('content')
    <h1 class="mb-2">Корзина</h1>
    <div class="mb-2 text text--large">Итого: <span class="price">{{ $cart->totalPrice() }} руб.</span></div>

    <div class="grid-wrapper mb-2">
        @forelse($cart->products as $product)
            @include('layouts.card', ['product' => $product])
        @empty
            <h4>Пока нет товаров</h4>
        @endforelse
    </div>

    <form action="{{ route('orders.store') }}" method="post">
        @csrf
        <button type="submit" class="btn btn--primary btn--fit-content">Заказать</button>
    </form>
@endsection
