<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar">
    <div class="navbar__content">
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="" class="navbar__logo">
        </a>
        <ul class="navbar__menu">
            <li class="navbar__menu-item">
                <a href="{{ route('products.index') }}" class="navbar__menu-link">SHOP</a>
            </li>
            <li class="navbar__menu-item">
                <a href="{{ route('gallery.index') }}" class="navbar__menu-link">GALLERY</a>
            </li>
            <li class="navbar__menu-item">
                <a href="{{ route('contact.index') }}" class="navbar__menu-link">CONTACT</a>
            </li>
        </ul>
    </div>
</nav>

@auth
    <div class="secondary-navbar">
        <div class="secondary-navbar__content">
            <ul class="secondary-navbar__list">
                <li class="secondary-navbar__list-item">
                    <a href="{{ route('admin.index') }}" class="secondary-navbar__list-link">
                        Home
                    </a>
                </li>
                <li class="secondary-navbar__list-item">
                    <a href="{{ route('admin.products.index') }}" class="secondary-navbar__list-link">
                        Products
                    </a>
                </li>
            </ul>
            <div class="ml-auto">
                <form class="" method="POST" action="{{ route('auth.logout') }}">
                    @csrf
                    <button class="button-small-primary" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
@endauth
@yield('content')
<footer class="footer">
    <div class="footer__content container">
        The footer
    </div>
</footer>
</body>
</html>
