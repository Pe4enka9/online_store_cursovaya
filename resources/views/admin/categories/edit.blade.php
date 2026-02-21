@extends('admin-theme')
@section('title', 'Изменить категорию')
@section('content')
    <form action="{{ route('admin.categories.update', $category) }}" method="post" class="form">
        @csrf
        @method('PATCH')
        <h1 class="text--center">Изменить категорию</h1>

        <div class="input-wrapper">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" placeholder="Введите название" value="{{ $category->name }}">
            @error('name') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="buttons">
            <a href="{{ route('admin.categories.index') }}" class="btn btn--danger">Отмена</a>
            <button type="submit" class="btn btn--primary">Изменить</button>
        </div>
    </form>
@endsection
