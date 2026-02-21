@extends('admin-theme')
@section('title', 'Создать категорию')
@section('content')
    <form action="{{ route('admin.categories.store') }}" method="post" class="form">
        @csrf
        <h1 class="text--center">Создать категорию</h1>

        <div class="input-wrapper">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" placeholder="Введите название" value="{{ old('name') }}">
            @error('name') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="buttons">
            <a href="{{ route('admin.categories.index') }}" class="btn btn--danger">Отмена</a>
            <button type="submit" class="btn btn--primary">Создать</button>
        </div>
    </form>
@endsection
