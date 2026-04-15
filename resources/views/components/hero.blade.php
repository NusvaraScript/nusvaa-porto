@props([
'title' => '',
'description' => ''
])

<section class="my-12 reveal">
    <div>
        <h1 class="text-4xl md:text-5xl font-bold">{{ $title }}</h1>
        <p class="text-lg mt-4">{{ $description }}</p>
        {{ $slot }}
    </div>
</section>
