@extends('admin-theme')
@section('title', 'Создать товар')
@section('content')
    <form action="{{ route('admin.products.store') }}" method="post" class="form form--column" enctype="multipart/form-data">
        @csrf
        <h1 class="text--center">Создать товар</h1>

        <div class="form__row">
            <div class="form__col">
                <div class="input-wrapper">
                    <label for="name">Название</label>
                    <input type="text" name="name" id="name" placeholder="Введите название" value="{{ old('name') }}">
                    @error('name') <span class="text error">{{ $message }}</span> @enderror
                </div>

                <div class="input-wrapper">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" placeholder="Введите описание">{{ old('description') }}</textarea>
                    @error('description') <span class="text error">{{ $message }}</span> @enderror
                </div>

                <div class="input-wrapper">
                    <label for="short_description">Краткое описание</label>
                    <textarea name="short_description" id="short_description" placeholder="Введите краткое описание">{{ old('short_description') }}</textarea>
                    @error('short_description') <span class="text error">{{ $message }}</span> @enderror
                </div>

                <div class="input-wrapper">
                    <label for="price">Цена</label>
                    <input type="number" name="price" id="price" placeholder="Введите цену" value="{{ old('price') }}" step="0.01">
                    @error('price') <span class="text error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form__col">
                <div class="input-wrapper">
                    <label for="image">Изображение</label>
                    <input type="file" name="image" id="image">
                    @error('image') <span class="text error">{{ $message }}</span> @enderror
                </div>

                <div class="input-wrapper">
                    <label for="publisher">Издатель</label>
                    <select name="publisher" id="publisher">
                        <option value="" hidden>Выберите издателя</option>
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                        @endforeach
                    </select>
                    @error('publisher') <span class="text error">{{ $message }}</span> @enderror
                </div>

                <div class="input-wrapper">
                    <label for="categories">Категории</label>
                    <select name="categories[]" id="categories" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categories') <span class="text error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="buttons">
            <a href="{{ route('admin.products.index') }}" class="btn btn--danger">Отмена</a>
            <button type="submit" class="btn btn--primary">Создать</button>
        </div>
    </form>
@endsection
