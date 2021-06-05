<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>Adsy</title>
</head>
<body>

<nav class="flex p-6 justify-between bg-blue-50">
    <ul class="flex items-center">
        <li class="p-3"><a href="{{ route('home') }}">Home</a></li>
        <li class="p-3"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    </ul>
    <ul class="flex items-center p-3">
        <li class="p-3"><a href="{{ route('authentication.login') }}">Login</a></li>
        <li class="p-3"><a href="{{ route('authentication.registration') }}">Register</a></li>
        @auth
            <li class="p-3"><a href="{{ route('authentication.logout') }}">Logout</a></li>
        @endauth
    </ul>
</nav>
@yield('page')
</body>
</html>
