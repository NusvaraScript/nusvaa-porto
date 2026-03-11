<footer class="bg-gray-900 border-t border-gray-200 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div>
                <h2 class="text-white text-xl font-bold mb-4">Nusvaa</h2>
                <p class="text-sm leading-relaxed">
                    Selamat datang di web portofolio saya.
                </p>
            </div>
            <div class="flex flex-col space-y-2">
                <h3 class="text-white font-semibold mb-2">Tautan Utama</h3>
                <a href="{{ route('home') }}" class="hover:text-blue-500">[ Beranda ]</a>
                <a href="{{ route('about') }}" class="hover:text-blue-500">[ Projek Saya ]</a>
                <a href="{{ route('blog.index') }}" class="hover:text-blue-500">[ Blog Saya ]</a>
            </div>
            <div>
                <h3 class="text-white font-semibold mb-2">Kontak</h3>
                <p class="text-sm italic">yusufusman11111111@gmail.com</p>
                <div class="flex space-x-4 mt-4 text-2xl">
                    <a href="https://github.com/NusvaraScript" class="hover:text-white"><i
                            class="fab fa-github"></i></a>
                    <a href="#" class="hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-white"><i class="fab fa-discord"></i></a>
                </div>
            </div>
        </div>
        <hr class="border-gray-800">
        <div class="mt-8 text-center text-sm">
            &copy; {{ date('Y') }} NusvaaScript. All rights reserved.
        </div>
    </div>
</footer>
