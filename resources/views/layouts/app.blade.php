<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <div class="container">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button"
                    data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('quizzes') }}"
                        class="nav-link">All quizzes</a>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else

                    <li class="nav-item">
                        <a href="{{ route('my-quizzes') }}" class="nav-link">My quizzes</a>
                    </li>

                    <li class="nav-item dropdown">

                        <a href="#" class="nav-link dropdown-toggle"
                        id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('new-quiz') }}">
                                New Quiz
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}"
                                method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>

        @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/libs.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
