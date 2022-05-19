<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('extra-links')
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar">
        <div class="navbar__content">
            <img src="{{ asset('img/logo.svg') }}" alt="" class="navbar__logo">
            <ul class="navbar__menu">
                <li class="navbar__menu-item">
                    <a href="#" class="navbar__menu-link">SHOP</a>
                </li>
                <li class="navbar__menu-item">
                    <a href="#" class="navbar__menu-link">GALLERY</a>
                </li>
                <li class="navbar__menu-item">
                    <a href="#" class="navbar__menu-link">CONTACT</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</body>
</html>
