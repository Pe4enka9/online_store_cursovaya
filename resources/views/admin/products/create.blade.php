@extends('admin-theme')
@section('title', 'Создать товар')
@section('content')
    <form action="{{ route('admin.products.store') }}" method="post" class="form form--column"
          enctype="multipart/form-data">
        @csrf
        <h1 class="text--center">Создать товар</h1>
        @include('layouts.forms.product-form')

        <div class="buttons">
            <a href="{{ route('admin.products.index') }}" class="btn btn--danger">Отмена</a>
            <button type="submit" class="btn btn--primary">Создать</button>
        </div>
    </form>
@endsection
