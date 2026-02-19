@extends('theme')
@section('title', 'Главная')
@section('content')
    <h1 class="mb-2">Главная</h1>

    <div class="grid-wrapper">
        @foreach($products as $product)
            @include('layouts.card', ['product' => $product])
        @endforeach
    </div>
@endsection
