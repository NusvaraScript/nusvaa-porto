@props([
'route' => '#',
'text' => '',
'variant' => 'solid',
'target' => '_self'
])

@php
$button = match($variant) {
'solid' => 'px-4 py-2 bg-white text-black rounded-lg hover:bg-gray-300 transition',
'outline' => 'px-4 py-2 bg-black rounded-lg border border-gray-500 hover:border-white transition',
'ghost' => 'px-4 py-2 text-white underline decoration-transparent hover:decoration-white transition',
'danger' => 'px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition',
default => 'px-4 py-2 bg-white text-black rounded-lg hover:bg-gray-300 transition'
};
@endphp

<a href="{{ $route }}" target="{{ $target }}" class="{{ $button }}">
    {{ $slot->isEmpty() ? $text : $slot }}
</a>
