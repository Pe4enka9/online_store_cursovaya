@extends('theme')
@section('title', 'Регистрация')
@section('content')
    <form action="{{ route('register') }}" method="post" class="form">
        @csrf
        <div class="form__icon">
            <img src="{{ asset('icons/people.svg') }}" alt="Создать аккаунт" class="image image--contain">
        </div>

        <div class="flex fd-column ai-center gap-1">
            <div class="form__title">Создать аккаунт</div>
            <div class="form__description">Заполните форму для регистрации</div>
        </div>

        <div class="input-wrapper">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" placeholder="Иван" value="{{ old('name') }}">
            @error('name') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-wrapper">
            <label for="phone">Номер телефона</label>
            <input type="tel" name="phone" id="phone" placeholder="+7 (___) ___-__-__" value="{{ old('phone') }}">
            @error('phone') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-group">
            <div class="input-wrapper">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" placeholder="••••••••">

                <div class="eye">
                    <img src="{{ asset('icons/open-eye.svg') }}" alt="" class="image image--contain">
                </div>
            </div>

            @error('password') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-wrapper">
            <label for="password_confirmation">Подтвердите пароль</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••">
        </div>

        <button type="submit" class="btn btn--primary btn--w100">Зарегистрироваться</button>
        <div class="form__link">Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></div>
    </form>
@endsection
