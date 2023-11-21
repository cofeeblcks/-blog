<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog CofeeBlcks</title>
    @vite(['resources/sass/app.scss', 'resources/sass/errors-pages.scss', 'resources/js/app.js'])
</head>

<body>
    <!-- Navbar -->
    <header class="header-nav">
        <nav class="navbar navbar-expand-md navbar-dark bg-accent">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/logo.png') }} " alt="Logo blog" width="50">
                    Blog
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navMenu">
                    <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts') }}">Posts</a>
                        </li>
                        @if ( !session('status'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                            </li>
                        @else
                            @if( Auth::user()->id_role == 1 )
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users') }}">Users</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link"  href="{{ route('logout') }}">Logout</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Navbar -->
    <div class="container-wrap">
        @yield('content')
    </div>
    <footer class="bg-accent">
        <p>Desarrollado por Hadik Chavez</p>
    </footer>
</body>
</html>