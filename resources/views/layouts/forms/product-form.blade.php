<div class="form__row">
    <div class="form__col">
        <div class="input-wrapper">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" placeholder="Введите название"
                   value="{{ $product->name ?? old('name') }}">
            @error('name') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-wrapper">
            <label for="description">Описание</label>
            <textarea name="description" id="description"
                      placeholder="Введите описание">{{ $product->description ?? old('description') }}</textarea>
            @error('description') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-wrapper">
            <label for="short_description">Краткое описание</label>
            <textarea name="short_description" id="short_description"
                      placeholder="Введите краткое описание">{{ $product->short_description ?? old('short_description') }}</textarea>
            @error('short_description') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-wrapper">
            <label for="price">Цена</label>
            <input type="number" name="price" id="price" placeholder="Введите цену"
                   value="{{ $product->price ?? old('price') }}" step="0.01">
            @error('price') <span class="text error">{{ $message }}</span> @enderror
        </div>

        @isset($product)
            <div class="input-wrapper">
                <label for="old_price">Старая цена</label>
                <input type="number" name="old_price" id="old_price" placeholder="Введите цену"
                       value="{{ $product->old_price ?? old('old_price') }}" step="0.01">
                @error('old_price') <span class="text error">{{ $message }}</span> @enderror
            </div>
        @endisset

        <div class="input-wrapper">
            <label for="stock_quantity">Количество на складе</label>
            <input type="number" name="stock_quantity" id="stock_quantity" placeholder="Введите количество"
                   value="{{ $product->stock_quantity ?? old('stock_quantity') }}">
            @error('stock_quantity') <span class="text error">{{ $message }}</span> @enderror
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
                    <option
                        value="{{ $publisher->id }}"
                        @selected(old('publisher', isset($product) ? $product->publisher_id : []) == $publisher->id)
                    >
                        {{ $publisher->name }}
                    </option>
                @endforeach
            </select>
            @error('publisher') <span class="text error">{{ $message }}</span> @enderror
        </div>

        @php
            $selectedIds = old('categories', isset($product) ? $product->categories->pluck('id')->toArray() : []);
        @endphp

        <div class="input-wrapper">
            <label for="categories">Категории</label>
            <select name="categories[]" id="categories" multiple>
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(in_array($category->id, $selectedIds))
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('categories') <span class="text error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form__col">
        <div class="input-wrapper">
            <label for="players_min">Минимальное количество игроков</label>
            <input type="number" name="players_min" id="players_min" placeholder="Введите количество игроков"
                   value="{{ $product->players_min ?? old('players_min') }}">
            @error('players_min') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-wrapper">
            <label for="players_max">Максимальное количество игроков</label>
            <input type="number" name="players_max" id="players_max" placeholder="Введите количество игроков"
                   value="{{ $product->players_max ?? old('players_max') }}">
            @error('players_max') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-wrapper">
            <label for="play_time">Время игры (в минутах)</label>
            <input type="number" name="play_time" id="play_time" placeholder="Введите количество минут"
                   value="{{ $product->play_time ?? old('play_time') }}">
            @error('play_time') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-wrapper">
            <label for="age_rating">Возрастное ограничение (в годах)</label>
            <input type="number" name="age_rating" id="age_rating" placeholder="Введите возраст"
                   value="{{ $product->age_rating ?? old('age_rating') }}">
            @error('age_rating') <span class="text error">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
