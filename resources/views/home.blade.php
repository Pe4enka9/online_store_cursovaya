@extends('theme')
@section('title', 'Главная')
@section('content')
    <div class="title mb-2 text--center">
        <h1 class="title__header">Каталог настольных игр</h1>
        <p class="title__text text--large text--gray">
            Откройте для себя мир увлекательных настольных игр. У нас вы найдете игры для любого возраста и компании —
            от классических до современных хитов.
        </p>
    </div>

    @include('layouts.search')

    <div class="wrapper">
        @include('layouts.filter')

        <div class="products">
            @include('layouts.sort')

            <div class="grid-wrapper">
                @forelse($products as $product)
                    @include('layouts.product-card.product-card', ['product' => $product])
                @empty
                    <h2 class="text--center">Таких товаров не найдено</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection
