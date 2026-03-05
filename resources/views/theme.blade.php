<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>@yield('title')</title>
</head>
<body>

@include('layouts.header')

<main>
    @yield('content')
</main>

{{--@include('layouts.footer')--}}

<script>
    const profile = document.getElementById('profile');
    const nav = document.querySelector('.header__profile-nav');

    profile.addEventListener('click', () => {
        nav.classList.toggle('active');
    });

    document.addEventListener('click', (e) => {
        if (!profile.contains(e.target)) {
            nav.classList.remove('active');
        }
    });
</script>
</body>
</html>
