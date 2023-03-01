<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tab')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('favico.png')}}" type="image/x-icon">
</head>
<body class="h-full w-full bg-blue-50">
    @isset($nav)
        @include('components.navbar')
    @endisset
    @yield('body')
</body>
</html>