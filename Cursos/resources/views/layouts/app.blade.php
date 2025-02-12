<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Estilos de Tailwind CSS --}}
    @vite(['resources/css/app.css'])

    {{-- Estilos adicionales --}}
    @stack('styles')

    {{-- Livewire Styles --}}
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900 antialiased">

    {{-- Navbar --}}
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">
                {{ config('app.name') }}
            </a>
            <div>
                @auth
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 text-gray-700 hover:text-blue-600">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-gray-700 hover:text-red-600">Salir</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-blue-600">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-gray-700 hover:text-blue-600">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Contenido de la página --}}
    <main class="container mx-auto p-6">
        {{ $slot }}
    </main>

    {{-- Livewire Scripts --}}
    @livewireScripts

    {{-- Scripts adicionales --}}
    @stack('scripts')
</body>
</html>
