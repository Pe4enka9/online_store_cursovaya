@extends('theme')
@section('title', 'Заказы')
@section('content')
    <h1 class="mb-2">Заказы</h1>

    <div class="flex fd-column gap-2">
        @forelse($orders as $order)
            @include('layouts.orders.order-card')
        @empty
            <h4>Пока нет заказов</h4>
        @endforelse
    </div>
@endsection
