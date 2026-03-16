<nav class="bg-black border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/home" class="text-2xl font-bold text-white">
                    Nusvaa<span class="text-blue-500">.</span>
                </a>
            </div>

            {{-- Desktop menu --}}
            <div class="hidden md:flex items-center space-x-8 text-white">
                <x-button route="{{ route('home') }}" variant="" text="[Home]"></x-button>
                <x-button route="{{ route('about') }}" variant="" text="[About]"></x-button>
                <x-button route="{{ route('projects.index') }}" variant="" text="[Projects]"></x-button>
                <x-button route="{{ route('blog.index') }}" variant="" text="[Blog]"></x-button>
                <x-button route="{{ route('contact.index') }}" variant="solid" text="Contact Me"></x-button>
            </div>

            {{-- Hamburger button (mobile only) --}}
            <div class="flex md:hidden items-center">
                <button onclick="toggleMenu()" class="text-white p-2 rounded-lg hover:bg-gray-800 transition">
                    <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

{{-- Overlay --}}
<div id="menu-overlay" onclick="toggleMenu()" class="fixed inset-0 bg-black/60 z-40 hidden backdrop-blur-sm"></div>

{{-- Mobile Sidebar --}}
<div id="mobile-menu"
    class="fixed top-0 right-0 h-full w-76 bg-black border-l border-white z-50 transform translate-x-full transition-transform duration-300 flex flex-col">

    {{-- Header sidebar --}}
    <div class="flex items-center justify-between px-6 py-5 border-b border-gray-800">
        <span class="text-white font-bold text-2xl" style="font-family:monospace">Nusvaa<span
                class="text-blue-500">.</span></span>
        <button onclick="toggleMenu()" class="text-gray-400 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- Links --}}
    <div class="flex flex-col px-4 py-6 gap-1 flex-1">
        <a href="{{ route('home') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl text-blue-500 hover:underline text-sm">
            [ Home Page ]
        </a>
        <a href="{{ route('about') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl text-blue-500 hover:underline text-sm">
            [ About Me ]
        </a>
        <a href="{{ route('projects.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl text-blue-500 hover:underline text-sm">
            [ My Projects ]
        </a>
        <a href="{{ route('blog.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl text-blue-500 hover:underline text-sm">
            [ Blog Post ]
        </a>
        <p class="text-xs text-center text-gray-400 my-4 leading-relaxed">
            "Face the Fear, Build the Future."
        </p>
        <div class="mt-auto pt-6 border-t border-gray-800">
            <a href="{{ route('contact.index') }}"
                class="flex items-center justify-center gap-2 w-full px-4 py-3 bg-white text-black rounded-xl font-semibold text-sm hover:bg-gray-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,12 2,6" />
                </svg>
                Contact Me
            </a>
        </div>
    </div>
</div>

<script>
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        const overlay = document.getElementById('menu-overlay');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');
        const isOpen = !menu.classList.contains('translate-x-full');

        if (isOpen) {
            menu.classList.add('translate-x-full');
            overlay.classList.add('hidden');
            iconOpen.classList.remove('hidden');
            iconClose.classList.add('hidden');
        } else {
            menu.classList.remove('translate-x-full');
            overlay.classList.remove('hidden');
            iconOpen.classList.add('hidden');
            iconClose.classList.remove('hidden');
        }
    }
</script>
