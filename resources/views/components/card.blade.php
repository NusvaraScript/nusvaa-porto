@props([
'type' => 'basic', {{-- Tipe card, ada basic | detail --}}
'title' => '',
'description' => '',
'logo' => '', {{-- Untuk devicon logo --}}
'level' => '', {{-- Newbie, Advanced, Intermediate --}}
'image' => '', {{-- Untuk gambar di tipe project --}}
'tags' => [], {{-- Tags untuk di tipe project --}}
'url' => '#', {{-- URL untuk tipe project --}}
'source' => '#' {{-- Source untuk tipe project --}}
])

@php
$dotColor = match($level) {
'Advanced' => 'bg-green-500',
'Intermediate' => 'bg-yellow-500',
'Newbie' => 'bg-blue-500',
default => ''
};
@endphp

<div class="border-2 border-white/10 hover:shadow-[6px_6px_0px_#fff] hover:border-white hover:scale-102 active:scale-95
transition-all text-white overflow-hidden">
    {{-- Basic Card --}}
    @if ($type == 'basic')
    <div class="p-6 flex flex-col flex-1 bg-black">
        @if ($logo)
        <i class="{{ $logo }}" style="font-size: 50px"></i>
        @endif
        <h1 class="text-lg mt-4 font-bold">{{ $title }}</h1>
        <p class="text-sm mt-2">{{ $description }}</p>
        <div class="flex items-center gap-2 mt-auto pt-4 border-t border-gray-700">
            @if ($level)
            <span class="w-2 h-2 rounded-full {{ $dotColor }}"></span>
            <span class="text-xs text-gray-400">{{ $level }}</span>
            @endif
        </div>
    </div>
    {{-- Detailed Card --}}
    @elseif ($type == 'detail')
    <div class="w-full aspect-video bg-black border-b border-gray-500 overflow-hidden">
        @if ($image)
        <img src="{{ asset($image) }}" alt="{{ $title }}"
            class="w-full h-full object-cover hover:scale-105 transition duration-500">
        @else
        <div class="w-full h-full flex items-center justify-center text-4lg md:text-2xl lg:text-4xl text-blue-500">[{{
            $title }}]
        </div>
        @endif
    </div>
    <div class="p-6 flex flex-col flex-1 bg-black">
        @if (count($tags))
        <div class="flex flex-wrap gap-2 mb-3">
            @foreach ($tags as $tag)
            <span class="text-xs px-2 py-1 rounded-lg bg-black border border-gray-500">{{ $tag
                }}</span>
            @endforeach
        </div>
        @endif
        <h3 class="font-bold text-base">{{ $title }}</h3>
        <p class="text-sm text-gray-400 mt-1 leading-relaxed">{{ $description }}</p>

        <div class="flex gap-4 mt-auto pt-4 border-t border-gray-700">
            @if ($url !== '#')
            <a href="{{ $url }}" target="_blank"
                class="text-xs text-blue-400 hover:text-blue-300 flex items-center gap-1 transition">
                <i data-lucide="external-link" class="w-3 h-3"></i> Live Demo
            </a>
            @endif
            @if ($source !== '#')
            <a href="{{ $source }}" target="_blank"
                class="text-xs text-gray-400 hover:text-white flex items-center gap-1 transition">
                <i data-lucide="github" class="w-3 h-3"></i> Source
            </a>
            @endif
        </div>
    </div>
    @endif
</div>
