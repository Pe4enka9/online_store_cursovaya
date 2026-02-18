@extends('theme')
@section('title', 'Вход')
@section('content')
    <form action="{{ route('login') }}" method="post" class="form">
        @csrf
        <h1 class="text--center">Вход</h1>

        <div class="input-wrapper">
            <label for="phone">Номер телефона</label>
            <input type="tel" name="phone" id="phone" placeholder="+7 (___) ___-__-__" value="{{ old('phone') }}">
            @error('phone') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <div class="input-wrapper">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" placeholder="Ваш пароль">
            @error('password') <span class="text error">{{ $message }}</span> @enderror
        </div>

        <label class="checkbox">
            <input type="checkbox" name="remember" id="remember">
            <span class="checkbox-icon"></span>
            Запомнить меня
        </label>

        <button type="submit" class="btn btn--primary">Войти</button>
        @error('auth') <span class="text text--center error">{{ $message }}</span> @enderror
    </form>
@endsection
