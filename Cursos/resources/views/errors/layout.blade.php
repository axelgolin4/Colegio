<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>

<body class="bg-gray-100 text-gray-900 antialiased min-h-screen flex flex-col">
    <div class="bg-white flex-grow flex flex-col">

        <header class="absolute inset-x-0 top-0 z-50 bg-gray-50">
            <nav class="mx-auto flex max-w-7xl items-center justify-between p-4" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                        <img class="h-8 w-auto" src="{{ asset('img/logo_orbe.png') }}" alt="Logo Orbe">
                    </a>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    @foreach([
                    ['route' => 'home', 'icon' => 'heroicon-o-home', 'label' => 'Home'],
                    ['route' => 'profesores', 'icon' => 'heroicon-o-academic-cap', 'label' => 'Profesores'],
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

        <div class="relative isolate flex-grow flex items-center justify-center bg-gradient-to-b from-indigo-100/20 pt-14">
            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>

</html>