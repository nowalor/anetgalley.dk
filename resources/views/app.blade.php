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

    @auth
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">{{ auth()->user()->name }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown link
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('admin.products.index') }}">Products</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.products.create') }}">Create a product</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endauth
    @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
