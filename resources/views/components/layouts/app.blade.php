<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Kampoeng Kepiting">
    <meta name="description" content="Kampoeng Kepiting Kutawaru - Surga Kepiting di Ujung Selatan Jawa">
    <meta name="keywords" content="kampoeng kepiting, kampung kepiting, kampoeng kepiting kutawaru, kampung kepiting kutawaru, kepiting kutawaru, kepiting segar , kepiting fresh, kepiting murah, kepiting enak, kepiting segar kutawaru, kepiting fresh kutawaru, kepiting murah kutawaru, kepiting enak kutawaru , restoran seafood , wisata kepiting">
    <link rel="shortcut icon" href="{{ url(asset('assets/images/favicon.png')) }}">

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>{{ $title ?? 'Kampoeng Kepiting' }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    <wireui:scripts />
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <x-navbar-home />
    <x-dialog z-index="z-50" blur="md" align="center" />
    {{ $slot }}
    <x-footer />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>