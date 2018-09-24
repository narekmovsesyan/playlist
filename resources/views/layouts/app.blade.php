<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Home </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="css/header.css" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #31b0d5">
            <div class="container">
                <a class="decoration-none header-text" href="{{ url('/') }}">
                    Music Player
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>

                    @guest


                    @else
                        @if (request()->path() == 'home')
                            <div class="nav-item">
                                <a  href="{{ route('register') }}"><span class="header-text2 menu-list">Playlists</span></a>

                                <a  href="{{ route('register') }}"><span class="header-text2 menu-list">Songs</span></a>
                            </div>
                        @endif
                    @endguest


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (request()->path() == 'register')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><span class="header-text">{{ __('Login') }}</span></a>
                                </li>
                            @elseif(request()->path() == 'login')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><span class="header-text">{{ __('Register') }}</span></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">

                                    <a class="header-text" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
