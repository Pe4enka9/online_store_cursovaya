<h1 class="text--center">Создать категорию</h1>

<div class="input-wrapper">
    <label for="name">Название</label>
    <input type="text" name="name" id="name" placeholder="Введите название"
           value="{{ $category->name ?? old('name') }}">
    @error('name') <span class="text error">{{ $message }}</span> @enderror
</div>

<div class="buttons">
    <a href="{{ route('admin.categories.index') }}" class="btn btn--danger">Отмена</a>
    <button type="submit" class="btn btn--primary">Создать</button>
</div>
