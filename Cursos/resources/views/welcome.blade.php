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

<body class="bg-gray-100 text-gray-900 antialiased">
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">
                {{ config('app.name') }}
            </a>
            <div>
                <p>a</p>
                <p>b</p>
            </div>
        </div>
    </nav>
    <main class="container mx-auto p-6">
        <div>
            <p>hola</p>
        </div>
    </main>
    @stack('scripts')
</body>

</html>