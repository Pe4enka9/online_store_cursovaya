@extends('admin-theme')
@section('title', 'Изменить товар')
@section('content')
    <form action="{{ route('admin.products.update', $product) }}" method="post" class="form form--column"
          enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h1 class="text--center">Изменить товар</h1>
        @include('layouts.forms.product-form', ['product' => $product])

        <div class="buttons">
            <a href="{{ route('admin.products.index') }}" class="btn btn--danger">Отмена</a>
            <button type="submit" class="btn btn--primary">Изменить</button>
        </div>
    </form>
@endsection
