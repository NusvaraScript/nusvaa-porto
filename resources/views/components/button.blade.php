@props([
'route' => '#',
'text' => '',
'variant' => 'solid',
'target' => '_self',
'class' => ''
])

@php
$button = match($variant) {
'solid' => 'px-4 py-1.5 bg-white text-black border-2 border-black hover:shadow-[5px_5px_0px_#fff] hover:scale-105
active:scale-95
transition-all',
'outline' => 'px-4 py-1.5 bg-black border-2 border-white/10 hover:border-white hover:shadow-[5px_5px_0px_#fff]
hover:scale-105
active:scale-95
transition-all',
'ghost' => 'px-4 py-1.5 text-white underline decoration-transparent hover:decoration-white hover:scale-105
active:scale-95
transition-all',
'danger' => 'px-4 py-1.5 bg-red-600 text-white rounded-lg hover:bg-red-700 hover:scale-105 active:scale-95
transition-all',
default => 'leading-relaxed text-blue-500 hover:underline'
};
@endphp

<a href="{{ $route }}" target="{{ $target }}" class="text-sm md:text-base {{ $button }} {{ $class }}">
    {{ $slot->isEmpty() ? $text : $slot }}
</a>
