<!DOCTYPE html>
<html lang="en" class="bg-black font-mono">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Saya')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-icons-font@9/font/simple-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased selection:bg-black">
    <x-bg></x-bg>

    @include('components.navbar')
    <main class="flex flex-col md:flex-row gap-6">
        @if (Route::is('blog') || Route::is('projects'))
        @include('components.sidebar')
        @endif

        <div class="flex-1 w-full">
            @if(View::hasSection('content'))
            @yield('content')
            @else
            <div class="flex flex-col items-center justify-center min-h-screen text-center px-6 ">
                <h1 class="text-3xl font-bold text-white mb-2">Work in Progress</h1>
                <p class="text-gray-400 text-sm">Halaman ini lagi dalam pengerjaan. Nantikan updatenya!</p>
            </div>
            @endif
        </div>
    </main>
    @include('components.footer')
</body>

</html>
