<div>
    <x-navbar />

    <div class="min-h-screen bg-gray-100 flex flex-col items-center py-10 pt-20">
        <div class="max-w-screen-lg w-full mt-8 space-y-8">
            <div class="flex items-center gap-2">
                <x-heroicon-o-arrow-uturn-left class="w-5 h-5 text-primary" alt="email icon" />
                <a href="{{ route('estudiantes') }}" class="text-blue-600 hover:underline">Volver a Estudiantes</a>
            </div>
            <div class="bg-white p-6 shadow-lg rounded-lg gap-5 mb-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Estudiante</h1>
                <div class="flex items-center gap-4">
                    <div class="rounded-full p-1 border-2 border-gray-400">
                        <img src="{{ $estudiante->avatar }}" alt="avatar" class="w-16 h-16 rounded-full">
                    </div>
                    <div class="text-gray-700">
                        <p><span class="font-semibold">Nombre:</span> {{ $estudiante->nombre }}</p>
                        <p><span class="font-semibold">Correo:</span> {{ $estudiante->correo }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold text-gray-900">Cursos Asignados</h1>
                    <button wire:click="ShowModal"
                        class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-md shadow">
                        Asignar Curso
                    </button>
                </div>

                <div class="p-6 bg-gray-50 rounded-lg shadow">
                    {{ $this->table }}
                </div>
            </div>
        </div>
    </div>


    <x-filament::modal id="modal-estudiante-curso" alignment="center" width="lg">
        <x-slot name="heading">
            <h2 class="text-2xl font-semibold text-gray-900">Asignar curso:</h2>
        </x-slot>

        <x-slot name="description">
            <p class="text-sm text-gray-600">Asigna un curso al estudiante seleccionado.</p>
        </x-slot>

        <div class="mt-4 space-y-4">
            <div>
                {{ $this->form }}
            </div>
            @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                <strong>Se encontraron errores:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="flex justify-end space-x-4">
                <button wire:click="CloseModal" class="px-4 py-2 text-gray-700 bg-gray-300 hover:bg-gray-400 rounded-md shadow-sm">
                    Cancelar
                </button>
                <button wire:click="SaveCursoEstudiante" class="px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Guardar
                </button>
            </div>
        </div>
    </x-filament::modal>
</div>