@extends('admin-theme')
@section('title', 'Товары')
@section('content')
    <h1 class="mb-2">Товары</h1>
    <a href="{{ route('admin.products.create') }}" class="mb-2 btn btn--primary btn--fit-content">Добавить</a>

    <div class="grid-wrapper">
        @foreach($products as $product)
            @include('layouts.admin.card', ['product' => $product])
        @endforeach
    </div>
@endsection
