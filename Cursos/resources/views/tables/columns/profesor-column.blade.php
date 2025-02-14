@php
    $data = $getState();
@endphp

<div class="flex items-center gap-2">
    @if ($data)
        @php
            $nombre = $data['nombre'] ?? 'Sin nombre';
            $avatar = $data['avatar'] ?? 'default-avatar.png';
        @endphp
        <img src="{{ $avatar }}" alt="Avatar" class="h-6 w-6 rounded-full border border-gray-300 shadow-sm">
        <p class="text-sm font-medium text-gray-700">{{ $nombre }}</p>
    @else
        <p class="text-gray-500">--</p>
    @endif
</div>
