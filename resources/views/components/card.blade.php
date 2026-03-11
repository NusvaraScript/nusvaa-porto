@props([
'title' => '',
'description' => '',
'logo' => '',
'level' => '' {{-- Newbie, Expert, Intermediate, Newbie --}}
])

@php
$dotColor = match($level) {
'Expert' => 'bg-green-500',
'Intermediate' => 'bg-yellow-500',
'Newbie' => 'bg-blue-500',
default => ''
};
@endphp

<div class="p-6 rounded-lg border border-gray-500 hover:border-white transition text-white flex flex-col">
    <i class="{{ $logo }}" style="font-size: 50px"></i>
    <h1 class="text-lg mt-4 font-bold">{{ $title }}</h1><br>
    <p class="text-sm">{{ $description }}</p>
    <div class="flex items-center gap-2 mt-auto pt-4 border-t border-gray-700">
        <span class="w-2 h-2 rounded-full {{ $dotColor }}"></span>
        <span class="text-xs text-gray-400">{{ $level }}</span>
    </div>
</div>
