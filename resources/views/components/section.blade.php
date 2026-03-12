@props([
'section' => '',
'title' => '',
'description' => '',
'description2' => '',
'class' => '',
'border' => true
])
<section class="{{ $border ? 'border-t border-white/10' : '' }} py-8">
    <div class="mb-6 {{ $class }}">
        <p class="text-sm text-blue-500 uppercase tracking-widest">> {{ $section }}</p>
        <h1 class="text-3xl font-bold mt-2">{{ $title }}</h1>
        @if($description)
        <p class="text-sm my-4 text-gray-300 leading-relaxed">{{ $description }}</p>
        @endif
        @if($description2)
        <p class="text-sm my-4 text-gray-300 leading-relaxed">{{ $description2 }}</p>
        @endif
    </div>
    {{ $slot }}
</section>
