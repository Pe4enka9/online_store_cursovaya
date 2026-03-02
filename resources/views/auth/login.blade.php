@extends('theme')
@section('title', 'Вход')
@section('content')
    <form action="{{ route('login') }}" method="post" class="form">
        @csrf
        <div class="form__icon">
            <img src="{{ asset('icons/enter.svg') }}" alt="Вход в аккаунт" class="image image--contain">
        </div>

        <div class="flex fd-column ai-center gap-1">
            <div class="form__title">Вход в аккаунт</div>
            <div class="form__description">Введите свои данные для входа</div>
        </div>

        @error('auth')
        <div class="form__auth-error">{{ $message }}</div>
        @enderror

        <div class="input-wrapper">
            <label for="phone">Номер телефона</label>
            <input type="tel" name="phone" id="phone" placeholder="+7 (___) ___-__-__" value="{{ old('phone') }}">
            @error('phone') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-group">
            <div class="input-wrapper">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" placeholder="Ваш пароль">

                <div class="eye">
                    <img src="{{ asset('icons/open-eye.svg') }}" alt="" class="image image--contain">
                </div>
            </div>

            @error('password') <span class="text error">{{ $message }}</span> @enderror
        </div>

        {{--        <label class="checkbox">--}}
        {{--            <input type="checkbox" name="remember" id="remember">--}}
        {{--            <span class="checkbox-icon"></span>--}}
        {{--            Запомнить меня--}}
        {{--        </label>--}}

        <button type="submit" class="btn btn--primary btn--w100">Войти</button>
        <div class="form__link">Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></div>
    </form>
@endsection
