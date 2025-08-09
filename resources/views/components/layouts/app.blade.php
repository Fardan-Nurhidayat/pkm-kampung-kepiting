<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ url(asset('assets/images/favicon.png')) }}">

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>{{ "Kampoeng Kepiting | " .  $title ?? 'Page Title' }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    <wireui:scripts />
</head>

<body>
    <x-navbar-home />
    <x-dialog z-index="z-50" blur="md" align="center" />
    {{ $slot }}
    <x-footer />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>