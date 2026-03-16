<!DOCTYPE html>
<html lang="en" class="bg-black font-mono">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Nusvaa">
    <meta property="og:description" content="Review My Website Please">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Website Saya')</title>
    <!-- Devicons — untuk logo tech stack -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    @if(app()->environment('local'))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes drift1 {

            0%,
            100% {
                transform: translate(0px, 0px);
            }

            33% {
                transform: translate(30px, -20px);
            }

            66% {
                transform: translate(-20px, 15px);
            }
        }

        @keyframes drift2 {

            0%,
            100% {
                transform: translate(0px, 0px);
            }

            33% {
                transform: translate(-25px, 20px);
            }

            66% {
                transform: translate(20px, -15px);
            }
        }

        @keyframes gridMove {
            0% {
                background-position: 0px 0px;
            }

            100% {
                background-position: 60px 60px;
            }
        }
    </style>
    @endif
</head>

<body class="antialiased selection:bg-black">
    {{-- Loading Screen --}}
    <div id="loading-screen" class="fixed inset-0 z-[9999] bg-black flex flex-col items-center justify-center gap-6">
        <div class="text-4xl font-bold text-white" style="font-family: monospace">
            Nusvaa<span class="text-blue-500 animate-pulse">.</span>
        </div>

        <div class="w-48 h-0.5 bg-gray-800 rounded-full overflow-hidden">
            <div id="progress-bar" class="h-full bg-blue-500 rounded-full w-0 transition-all duration-700"></div>
        </div>

        <p class="text-gray-600 text-xs tracking-widest uppercase">Initializing...</p>
    </div>

    {{-- Background Animation --}}
    <x-bg></x-bg>

    {{-- Main Content --}}
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

    <script>
        // Animasi progress bar
        const bar = document.getElementById('progress-bar');
        const loader = document.getElementById('loading-screen');

        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.random() * 20;
            if (progress >= 90) {progress = 90; clearInterval(interval);}
            bar.style.width = progress + '%';
        }, 200);

        window.addEventListener('load', function () {
            bar.style.width = '100%';
            clearInterval(interval);
            setTimeout(() => {
                loader.style.transition = 'opacity 0.5s ease';
                loader.style.opacity = '0';
                setTimeout(() => loader.style.display = 'none', 500);
            }, 300);
        });
    </script>
    <!-- Lucide / Heroicons — untuk UI icons (jauh lebih ringan dari Font Awesome) -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script>lucide.createIcons();</script>
</body>

</html>
