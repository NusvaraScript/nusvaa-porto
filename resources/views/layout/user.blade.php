<!DOCTYPE html>
<html lang="en" class="bg-black font-mono">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Saya')</title>
    <!-- Devicons — untuk logo tech stack -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased selection:bg-black">
    <x-bg></x-bg>

    @include('components.navbar')
    <main class="flex flex-col md:flex-row gap-6 relative z-10">
        @if (Route::is('blog') || Route::is('projects'))
        @include('components.sidebar')
        @endif

        <div class="flex-1 w-full">
            @if(View::hasSection('content'))
            @yield('content')
            @else
            <div class="flex flex-col items-center justify-center min-h-screen text-center px-6 ">
                <h1 class="text-3xl font-bold text-white mb-2">Work in Progress</h1>
                <p class="text-gray-400 text-sm">This page is still being work on, stay tuned!</p>
            </div>
            @endif
        </div>
    </main>
    @include('components.footer')

    <!-- Lucide / Heroicons — untuk UI icons (jauh lebih ringan dari Font Awesome) -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>

</html>
