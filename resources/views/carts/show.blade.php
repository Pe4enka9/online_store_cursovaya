@extends('theme')
@section('title', 'Корзина')
@section('content')
    <h1 class="mb-2">Корзина</h1>

    <div class="grid-wrapper">
        @forelse($cart->products as $product)
            @include('layouts.card', ['product' => $product])
        @empty
            <h4>Пока нет товаров</h4>
        @endforelse
    </div>
@endsection
