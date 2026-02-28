@extends('theme')
@section('title', 'Главная')
@section('content')
    <h1 class="mb-2">Главная</h1>
    @include('layouts.filter')

    <div class="grid-wrapper">
        @forelse($products as $product)
            @include('layouts.card', ['product' => $product])
        @empty
            <h2 class="text--center">Таких товаров не найдено</h2>
        @endforelse
    </div>
@endsection
