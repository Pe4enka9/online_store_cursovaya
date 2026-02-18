@extends('theme')
@section('title', 'Регистрация')
@section('content')
    <form action="{{ route('register') }}" method="post" class="form">
        @csrf
        <h1 class="text--center">Регистрация</h1>

        <div class="input-wrapper">
            <label for="phone">Номер телефона</label>
            <input type="tel" name="phone" id="phone" placeholder="+7 (___) ___-__-__" value="{{ old('phone') }}">
            @error('phone') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-wrapper">
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" placeholder="Иван" value="{{ old('name') }}">
            @error('name') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-wrapper">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" placeholder="Ваш пароль">
            @error('password') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-wrapper">
            <label for="password_confirmation">Подтверждение пароля</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Повторите пароль">
        </div>

        <button type="submit" class="btn btn--primary">Зарегистрироваться</button>
    </form>
@endsection
