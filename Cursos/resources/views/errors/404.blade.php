@extends('errors.layout')
@section('content')
    <style>
        .error-container {
            text-align: center;
            padding: 2rem;
        }
        
        .error-image {
            width: 75%;
            max-width: 25rem;
            margin-bottom: 2rem;
        }

        .error-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #4a4a4a;
            margin-bottom: 1rem;
        }

        .error-message {
            font-size: 1.25rem;
            color: #6b6b6b;
            margin-top: 1rem;
        }

        .back-link {
            font-size: 1rem;
            color: #4a90e2;
            text-decoration: underline;
            font-weight: bold;
            margin-top: 1.5rem;
            display: inline-block;
        }

        .back-link:hover {
            color: #184e94;
        }
    </style>

    <div class="error-container">
        <p class="error-title">Página no encontrada</p>
        <p class="error-message">Lo sentimos, la página que buscas no existe o ha sido movida.</p>
        <p class="back-link">
            <a href="{{ config('app.url') }}">Volver a la pantalla de inicio</a>
        </p>
    </div>
@endsection
