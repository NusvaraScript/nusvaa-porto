@props([
'section' => '',
'image' => '',
'title' => '',
'description' => '',
'description2' => '',
'class' => '',
'reverse' => false,
'border' => true
])
<section
    class="{{ $border ? 'border-t border-white/10' : '' }} {{ $image ? 'grid grid-cols-1 md:grid-cols-2 gap-4 items-stretch' : '' }} py-8">
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
        @if($description)
        <p class="text-sm my-4 text-gray-300 leading-relaxed">{{ $description }}</p>
        @endif
        @if($description2)
        <p class="text-sm my-4 text-gray-300 leading-relaxed">{{ $description2 }}</p>
        @endif
    </div>
    @if ($reverse)
    <div class="mt-4 relative flex items-center justify-center">
        <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-auto max-h-80 object-cover rounded-3xl">
    </div>
    @endif
    {{ $slot }}
</section>
