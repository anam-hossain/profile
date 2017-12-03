<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
        <div id="app" class="container">
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        @if (auth()->check())
                            <li role="presentation">
                                <a href="{{ route('logout') }}">Logout</a>
                            </li>
                        @else
                            <li role="presentation">
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                            <li role="presentation">
                                <a href="{{ route('users.create') }}">Register</a>
                            </li>
                        @endif
                    </ul>
                </nav>
                <h3 class="text-muted">User management</h3>
            </div>

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if (auth()->check() && !auth()->user()->isVerified())
                <div class="alert alert-info">
                    Your account is not verified. Please verify your email address.
                </div>
            @endif

            @yield('content')

        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
