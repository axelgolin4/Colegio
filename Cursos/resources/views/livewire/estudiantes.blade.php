<div>
    <x-navbar />

    <div class="min-h-screen bg-gray-100 flex flex-col items-center py-10 pt-20">
        <div class="bg-white p-8 shadow-lg rounded-lg w-[80%] h-full">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-2">
                    <x-heroicon-o-users class="w-7 h-7text-gray-900" alt="email icon" />
                    <h1 class="text-2xl font-bold text-gray-900">Estudiantes</h1>
                </div>
                <button wire:click="ShowModal" class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-md shadow">
                    Crear Nuevo Estudiante
                </button>
            </div>

            <div class="p-6 bg-gray-50 rounded-lg shadow">
                {{ $this->table }}
            </div>
        </div>

        <x-filament::modal id="modal-estudiante" alignment="center" width="lg">
            <x-slot name="heading">
                <h2 class="text-2xl font-semibold text-gray-900">Estudiante Nuevo</h2>
            </x-slot>

            <x-slot name="description">
                <p class="text-sm text-gray-600">Crear un estudiante nuevo desde aquí, completa los detalles a continuación.</p>
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
                    <button wire:click="SaveEstudiante" class="px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Guardar
                    </button>
                </div>
            </div>
        </x-filament::modal>
    </div>
</div>