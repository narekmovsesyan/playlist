<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Home </title>

    <!-- Latest compiled and minified CSS -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}" type="text/css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #31b0d5">
            <div class="container">
                <a class="decoration-none header-text" href="{{ url('/') }}">
                    Music Player
                    <img src="{{asset('images/default/audioblack.svg')}}" alt="icon">
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
                                <a  href="{{ url('/playlists') }}"><span class="header-text2 menu-list">Playlists</span></a>

                                {{--<a  href="{{ route('song') }}"><span class="header-text2 menu-list">Songs</span></a>--}}
                            </div>
                        @endif

                        @if(Request::is('playlists/', '*'))
                            <div class="nav-item">
                                <a  href="{{ url('playlists') }}"><span class="header-text2 menu-list">Playlists</span></a>
                            </div>
                            <div class="nav-item">
                                <a  href="{{ url('playlists') }}"><span class="header-text2 menu-list">Songs</span></a>
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

    <script
            src="http://code.jquery.com/jquery-1.12.0.js"
            integrity="sha256-yFU3rK1y8NfUCd/B4tLapZAy9x0pZCqLZLmFL3AWb7s="
            crossorigin="anonymous"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
{{--    <script src="{{ asset('js/app.js') }}" ></script>--}}
    @stack('scripts')
</body>
</html>
