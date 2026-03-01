<div class="badges__item badges__item--{{ $mod }}">
    @isset($image)
        <img src="{{ $image }}" alt="Хит" class="badges__img">
    @endisset

    <span class="badges__text">{{ $text }}</span>
</div>
