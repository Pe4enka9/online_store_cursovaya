<form class="mb-2 form">
    <div class="input-wrapper">
        <input type="text" name="name" id="name" placeholder="Поиск по названию" value="{{ request()->name }}">
    </div>

    <div class="input-wrapper">
        <select name="publisher" id="publisher">
            <option value="">Выберите издателя</option>
            @foreach($publishers as $publisher)
                <option
                    value="{{ $publisher->id }}"
                    @selected($publisher->id == request()->publisher)
                >
                    {{ $publisher->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="input-wrapper">
        <select name="age_rating" id="age_rating">
            <option value="">Выберите возрастную категорию</option>
            <option value="0" @selected(request()->age_rating == 0)>0+</option>
            <option value="3" @selected(request()->age_rating == 3)>3+</option>
            <option value="6" @selected(request()->age_rating == 6)>6+</option>
            <option value="12" @selected(request()->age_rating == 12)>12+</option>
            <option value="16" @selected(request()->age_rating == 16)>16+</option>
            <option value="18" @selected(request()->age_rating == 18)>18+</option>
        </select>
    </div>

    <div class="flex gap-1">
        <div class="input-wrapper">
            <input type="number" name="min_price" id="min_price" placeholder="Мин. цена"
                   value="{{ request()->min_price }}">
        </div>

        <div class="input-wrapper">
            <input type="number" name="max_price" id="max_price" placeholder="Макс. цена"
                   value="{{ request()->max_price }}">
        </div>
    </div>

    <div class="flex gap-1">
        <div class="input-wrapper">
            <input type="number" name="players_min" id="players_min" placeholder="Мин. игроков"
                   value="{{ request()->players_min }}">
        </div>

        <div class="input-wrapper">
            <input type="number" name="players_max" id="players_max" placeholder="Макс. игроков"
                   value="{{ request()->players_max }}">
        </div>
    </div>

    <div class="buttons">
        <a href="{{ route('home') }}" class="btn btn--danger">Сбросить</a>
        <button type="submit" class="btn btn--primary">Применить</button>
    </div>
</form>
