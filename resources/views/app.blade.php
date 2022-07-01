<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar">
    <div class="navbar__content container">
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="" class="navbar__logo">
        </a>
        <ul class="navbar__menu">
            <li class="navbar__menu-item">
                <a href="{{ route('products.index') }}" class="navbar__menu-link @yield('shop')">SHOP</a>
            </li>
            <li class="navbar__menu-item">
                <a target="_blank" href="https://www.instagram.com/anetgallery/" class="navbar__menu-link">GALLERY</a>
            </li>
            <li class="navbar__menu-item">
                <a href="{{ route('contact.index') }}" class="navbar__menu-link @yield('contact')">CONTACT</a>
            </li>
        </ul>

        <div class="navbar__icon" id="navbar-icon">
            <div class="navbar__icon-line navbar__icon-line-1"></div>
            <div class="navbar__icon-line navbar__icon-line-2"></div>
            <div class="navbar__icon-line navbar__icon-line-3"></div>
        </div>
    </div>
    <div class="mobile-navigation container" id="mobile-navigation">
        <ul class="mobile-navigation__menu">
            <li class="mobile-navigation__menu-item">
                <a href="{{ route('products.index') }}" class="mobile-navigation__menu-link @yield('shop')">SHOP</a>
            </li>
            <li class="mobile-navigation__menu-item">
                <a target="_blank" href="https://www.instagram.com/anetgallery/" class="mobile-navigation__menu-link">GALLERY</a>
            </li>
            <li class="mobile-navigation__menu-item">
                <a href="{{ route('contact.index') }}"
                   class="mobile-navigation__menu-link @yield('contact')">CONTACT</a>
            </li>
        </ul>
    </div>
</nav>

@auth
    <div class="secondary-navbar">
        <div class="secondary-navbar__content container">
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
                <li class="secondary-navbar__list-item">
                    <a href="{{ route('admin.events.index') }}" class="secondary-navbar__list-link">
                        Events
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
<div class="footer">
    <div class="footer__content container">
        <div>
            <img src="{{ asset('img/logo-white.svg') }}" alt="" class="footer__content-img">
        </div>
        <div class="footer__content-right" style="margin-left: auto;">
            <div class="footer__content-block">
                <h2 class="heading-md medium white">
                    Socials
                </h2>
                <div class="pink-divider mt-1 mb-1"></div>
                <ul class="footer__list">
                    <li class="footer__list-item">
                        <i class="fa-brands fa-instagram footer__icon"></i>
                        <a href="" class="footer__link font16">Instagram</a>
                    </li>
                    <li class="footer__list-item">
                        <i class="fa-brands fa-facebook-f footer__icon"></i>
                        <a href="" class="footer__link font16">Facebook</a>
                    </li>
                    <li class="footer__list-item">
                        <i class="fa-brands fa-pinterest-p footer__icon"></i>
                        <a href="" class="footer__link font16">Pintrest</a>
                    </li>
                    <li class="footer__list-item">
                        <i class="fa-brands fa-twitter footer__icon"></i>
                        <a href="" class="footer__link font16">Twitter</a>
                    </li>
                </ul>
            </div>
            <div class="footer__content-block">
                <h2 class="heading-md medium white">
                    Contact
                </h2>
                <div class="pink-divider mt-1 mb-1"></div>
                <ul class="footer__list">
                    <li class="footer__list-item">
                        <a href="" class="footer__link font16">info@skiltebanden.dk </a>
                    </li>
                    <li class="footer__list-item">
                        <a href="" class="footer__link font16">28 35 92 25 </a>
                    </li>
                    <li class="footer__list-item">
                        <a href="" class="footer__link font16">Rentemestervej 67</a>
                    </li>
                    <li class="footer__list-item">
                        <a href="" class="footer__link font16">2400 København NV </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src=" {{ asset('js/navbar.js') }}"></script>
@yield('scripts')
</body>
</html>
