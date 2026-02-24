@extends('admin-theme')
@section('title', 'Создать категорию')
@section('content')
    <form action="{{ route('admin.categories.store') }}" method="post" class="form">
        @csrf
        @include('layouts.forms.category-form')
    </form>
@endsection
