<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>{{ "PKM PNC | " .  $title ?? 'Page Title' }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    <wireui:scripts />
</head>

<body>
    <x-navbar-home />
    <x-dialog z-index="z-50" blur="md" align="center" />
    {{ $slot }}
</body>

</html>