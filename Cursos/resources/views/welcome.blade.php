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
            <div class="absolute inset-y-0 right-1/2 -z-10 -mr-96 w-[200%] origin-top-right skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:-mr-80 lg:-mr-96" aria-hidden="true"></div>

            <div class="mx-auto max-w-7xl px-6 py-16 flex flex-col lg:flex-row items-center lg:items-start lg:gap-x-16">
                <div class="max-w-2xl text-center lg:text-left">
                    <h1 class="text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">
                        Prueba Técnica Componentes El Orbe S.A
                    </h1>
                    <p class="mt-6 text-lg font-medium text-gray-600 sm:text-xl">
                        Prueba basada en un módulo de Estudiantes y Cursos Asignados.
                    </p>
                </div>
                <img src="{{ asset('img/young.png') }}" alt="People" class="mt-8 lg:mt-0 aspect-[6/5] max-w-lg rounded-2xl object-contain">
            </div>
        </div>
    </div>

    @stack('scripts')
</body>

</html>