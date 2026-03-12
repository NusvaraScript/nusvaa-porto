<nav class="bg-black border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/home" class="text-2xl font-bold text-white">
                    Nusvaa.
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-8 text-white">
                <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a>
                <a href="{{ route('about') }}" class="hover:text-blue-600 transition">Tentang</a>
                <a href="{{ route('projects.index')}}" class="hover:text-blue-600 transition">Projek Saya</a>
                <a href="{{ route('blog.index') }}" class="hover:text-blue-600 transition">Blog</a>
                <x-button route="{{ route('contact.index') }}" variant="solid" text="Kontak Saya"></x-button>
            </div>
        </div>
    </div>
</nav>
