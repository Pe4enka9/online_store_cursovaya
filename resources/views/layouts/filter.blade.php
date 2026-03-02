<aside class="filter">
    <h3 class="filter__title mb-2">Фильтры</h3>

    <form class="filter__form">
        <details class="filter__details">
            <summary class="filter__summary">Категории</summary>

            <div class="filter__checkboxes">
                @foreach($categories as $category)
                    <label class="checkbox">
                        <input type="checkbox" name="categories[]">
                        <span class="checkbox-icon"></span>
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>
        </details>

        <hr>

        <details class="filter__details">
            <summary class="filter__summary">Издатели</summary>

            <div class="filter__checkboxes">
                @foreach($publishers as $publisher)
                    <label class="checkbox">
                        <input type="checkbox" name="publishers[]">
                        <span class="checkbox-icon"></span>
                        {{ $publisher->name }}
                    </label>
                @endforeach
            </div>
        </details>

        <hr>

        <details class="filter__details">
            <summary class="filter__summary">Цена</summary>

            <div class="flex ai-center gap-1">
                <div class="input-wrapper">
                    <input type="number" name="min_price" id="min_price" placeholder="От"
                           value="{{ request()->min_price }}">
                </div>

                <span>—</span>

                <div class="input-wrapper">
                    <input type="number" name="max_price" id="max_price" placeholder="До"
                           value="{{ request()->max_price }}">
                </div>
            </div>
        </details>

        <hr>

        <details class="filter__details">
            <summary class="filter__summary">Игроки</summary>

            <div class="flex ai-center gap-1">
                <div class="input-wrapper">
                    <input type="number" name="players_min" id="players_min" placeholder="От"
                           value="{{ request()->players_min }}">
                </div>

                <span>—</span>

                <div class="input-wrapper">
                    <input type="number" name="players_max" id="players_max" placeholder="До"
                           value="{{ request()->players_max }}">
                </div>
            </div>
        </details>

        <hr>

        <details class="filter__details">
            <summary class="filter__summary">Возраст (от)</summary>

            <div class="input-wrapper">
                <input type="number" name="age_rating" id="age_rating" placeholder="Возраст"
                       value="{{ request()->age_rating }}">
            </div>
        </details>

        <hr>

        <details class="filter__details">
            <summary class="filter__summary">Время игры (до, мин)</summary>

            <div class="input-wrapper">
                <input type="number" name="play_time" id="play_time" placeholder="Минут"
                       value="{{ request()->play_time }}">
            </div>
        </details>

        <div class="buttons">
            {{--            <a href="{{ route('home') }}" class="btn btn--danger">Сбросить</a>--}}
            <button type="submit" class="btn btn--primary">Применить</button>
        </div>
    </form>
</aside>
