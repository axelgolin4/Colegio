<div>
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

    <div class="min-h-screen bg-gray-100 flex flex-col items-center py-10">
        <div class="max-w-screen-lg w-full mt-8 space-y-8">
          
            <div class="bg-white p-6 shadow-lg rounded-lg gap-5 mb-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Estudiante</h1>
                <div class="text-gray-700">
                    <p><span class="font-semibold">Nombre:</span> {{ $estudiante->nombre }}</p>
                    <p><span class="font-semibold">Correo:</span> {{ $estudiante->correo }}</p>
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

                <div class="p-6 bg-gray-50 rounded-lg shadow min-h-[100px] flex items-center justify-center text-gray-500">
                    <p>No hay cursos asignados aún.</p>
                </div>
            </div>
        </div>
    </div>
</div>