@extends('theme')
@section('title', 'Корзина')
@section('content')
    <h1 class="mb-2">Корзина</h1>
    <a href="{{ route('orders.index') }}" class="mb-2 btn btn--primary btn--fit-content">Заказы</a>

    @if($cart->products->isNotEmpty())
        <div class="mb-2 flex ai-center jc-sb">
            <div class="text text--large">
                Итого: <span class="price">{{ number_format($cart->totalPrice(), 2, ',', ' ') }} руб.</span>
            </div>

            <form action="{{ route('orders.store') }}" method="post">
                @csrf
                <button type="submit" class="btn btn--primary btn--fit-content">Заказать</button>
            </form>
        </div>
    @endif

    <div class="grid-wrapper mb-2">
        @forelse($cart->products as $product)
            @include('layouts.card', ['product' => $product])
        @empty
            <h4>Пока нет товаров</h4>
        @endforelse
    </div>
@endsection
