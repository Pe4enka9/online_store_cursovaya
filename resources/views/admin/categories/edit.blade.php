@extends('admin-theme')
@section('title', 'Изменить категорию')
@section('content')
    <form action="{{ route('admin.categories.update', $category) }}" method="post" class="form">
        @csrf
        @method('PATCH')
        @include('layouts.forms.category-form', ['category' => $category])
    </form>
@endsection
