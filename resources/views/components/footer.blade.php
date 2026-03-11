<footer class="bg-black border-t border-gray-200 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">

            {{-- KIRI: Info + Kontak --}}
            <div>
                <h2 class="text-white text-xl font-bold mb-4">Nusvaa</h2>
                <p class="text-sm leading-relaxed">Selamat datang di web portofolio saya.</p>
                <div class="flex space-x-4 mt-4 text-2xl">
                    <a href="https://github.com/NusvaraScript" class="hover:text-white"><i
                            class="fab fa-github"></i></a>
                    <a href="#" class="hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-white"><i class="fab fa-discord"></i></a>
                </div>
                <p class="text-sm italic mt-4 text-gray-400">yusufusman11111111@gmail.com</p>
            </div>

            {{-- KANAN: Navigasi --}}
            <div class="flex gap-12 md:justify-end">
                <div class="flex flex-col space-y-2">
                    <h3 class="text-white font-semibold mb-2">Personal</h3>
                    <a href="{{ route('home') }}" class="text-blue-500 hover:underline">[Beranda]</a>
                    <a href="{{ route('about') }}" class="text-blue-500 hover:underline">[Tentang Saya]</a>
                    <a href="{{ route('blog.index') }}" class="text-blue-500 hover:underline">[Blog Saya]</a>
                </div>
                <div class="flex flex-col space-y-2">
                    <h3 class="text-white font-semibold mb-2">Explore</h3>
                    <a href="{{ route('projects.index') }}" class="text-blue-500 hover:underline">[Projek Saya]</a>
                    <a href="{{ route('contact.index') }}" class="text-blue-500 hover:underline">[Kontak Saya]</a>
                </div>
            </div>

        </div>
        <hr class="border-gray-800">
        <div class="mt-8 text-center text-sm">
            &copy; 2026 NusvaraScript. All rights reserved.
        </div>
    </div>
</footer>
