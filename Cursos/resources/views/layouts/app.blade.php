<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<header class="absolute inset-x-0 top-0 z-50 bg-gray-50">
    <meta charset="utf-8" />

    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-4" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                <img class="h-8 w-auto" src="{{ asset('img/logo_orbe.png') }}" alt="Logo Orbe">
            </a>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            @foreach([
            ['route' => 'home', 'icon' => 'heroicon-o-home', 'label' => 'Home'],
            ['route' => 'cursos', 'icon' => 'heroicon-o-book-open', 'label' => 'Cursos'],
            ['route' => 'estudiantes', 'icon' => 'heroicon-o-users', 'label' => 'Estudiantes'],
            ] as $item)
            <div class="flex items-center gap-2 text-gray-900 hover:text-blue-500">
                <x-dynamic-component :component="$item['icon']" class="w-4 h-4" />
                <a href="{{ route($item['route']) }}" class="text-sm font-semibold">{{ $item['label'] }}</a>
            </div>
            @endforeach
        </div>
    </nav>
</header>

<body class="antialiased">
    {{ $slot }}

    @livewire('notifications')
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>