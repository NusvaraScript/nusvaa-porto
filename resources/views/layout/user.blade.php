<!DOCTYPE html>
<html lang="en" class="bg-black font-mono">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Nusvaa">
    <meta property="og:description" content="Review My Website Please">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
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

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    @endif
</head>

<body class="antialiased selection:bg-black text-white">
    {{-- Loading Screen --}}
    <div id="loading-screen" class="fixed inset-0 z-[9999] bg-black flex flex-col items-center justify-center gap-6">
        <div class="text-4xl font-bold" style="font-family: monospace">
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
                <h1 class="text-3xl font-bold mb-2">Work in Progress</h1>
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
    <script>
        lucide.createIcons();

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((e, i) => {
                if (e.isIntersecting) {
                    setTimeout(() => e.target.classList.add('visible'), i * 100);
                }
            });
        }, {threshold: 0.1});

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    </script>
    @stack('js')
</body>

</html>
