<nav class="fixed top-0 left-0 w-full z-1 bg-white shadow-md flex items-center justify-between p-4" aria-label="Global">
    <div class="flex lg:flex-1">
        <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
            <img class="h-8 w-auto" src="{{ asset('img/logo_orbe.png') }}" alt="Logo Orbe">
        </a>
    </div>
    <div class="hidden lg:flex lg:gap-x-12">
        @foreach([
        ['route' => 'home', 'icon' => 'heroicon-o-home', 'label' => 'Home'],
        ['route' => 'profesores', 'icon' => 'heroicon-o-academic-cap', 'label' => 'Maestros'],
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