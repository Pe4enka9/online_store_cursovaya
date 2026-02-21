@extends('admin-theme')
@section('title', 'Админ-панель')
@section('content')
    <h1 class="mb-2">Админ-панель</h1>

    <div class="buttons">
        <a href="{{ route('admin.categories.index') }}" class="btn btn--primary">Категории</a>
        <a href="{{ route('admin.products.index') }}" class="btn btn--primary">Товары</a>
    </div>
@endsection
