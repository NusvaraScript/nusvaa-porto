@props([
'section' => '',
'image' => '',
'title' => '',
'class' => '',
'reverse' => false,
'border' => true
])
<section
    class="{{ $border ? 'border-t border-white/10' : '' }} {{ $image ? 'grid grid-cols-1 md:grid-cols-2 gap-4 items-stretch' : '' }} py-8 px-2">
    @if ($image && !$reverse)
    <div class="relative flex items-center justify-center">
        <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-auto max-h-80 object-cover rounded-3xl">
    </div>
    @endif
    <div class="mb-6 {{ $class }}">
        <p
            class="{{ $image && !$reverse ? 'sm:mt-4' : '' }} text-xs md:text-sm text-blue-500 uppercase tracking-widest">
            > {{ $section }}</p>
        <h1 class="text-2xl md:text-3xl font-bold mt-2">{{ $title }}</h1>
        {{ $slot }}
    </div>
    @if ($reverse)
    <div class="mt-4 relative flex items-center justify-center">
        <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-auto max-h-80 object-cover rounded-3xl">
    </div>
    @endif
</section>
