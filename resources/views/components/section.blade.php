@props([
'section' => '',
'image' => '',
'title' => '',
'description' => '',
'class' => '',
'reverse' => false,
'border' => true
])

<section class="border border-white py-8 my-6 reveal">
    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 {{ $image ? 'grid grid-cols-1 md:grid-cols-3 gap-4 items-stretch' : '' }}">

        @if ($image && !$reverse)
        <div class="relative flex items-center justify-center">
            <img src="{{ asset($image) }}" alt="{{ $title }}"
                class="w-auto max-h-80 object-cover border-2 border-white/10">
        </div>
        @endif

        <div class="md:col-span-2">
            <div class="{{ $class }}">
                <p
                    class="{{ $image && !$reverse ? 'sm:mt-4' : '' }} text-xs md:text-sm text-blue-500 uppercase tracking-widest">
                    > {{ $section }}
                </p>
                <h1 class="text-3xl sm:text-4xl font-bold mt-2">{{ $title }}</h1>
                <p class="text-sm sm:text-base my-4 text-gray-300 leading-relaxed">{{ $description }}</p>
            </div>
            {{ $slot }}
        </div>

        @if ($image && $reverse)
        <div class="relative flex items-center justify-center">
            <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-auto max-h-80 object-cover rounded-3xl">
        </div>
        @endif

    </div>
</section>
