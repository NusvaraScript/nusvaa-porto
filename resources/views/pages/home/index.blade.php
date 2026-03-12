@extends('layout.user')
@section('title', 'Home')
@section('content')
<div class="text-white py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-hero title="Halo, Saya Nusvara">
            <p>Saya membangun sebuah aplikasi web dan dapat membuat model prediksi sederhana yang akurat.</p>
            <div class="flex space-x-4 items-center mt-4">
                <x-button route="{{ route('projects.index') }}" variant="solid" text="Project Saya"></x-button>
                <x-button route="{{ route('contact.index') }}" variant="outline" text="Hubungi Saya"></x-button>
            </div>
        </x-hero>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-stretch py-6 border-t border-white/10">
            <div class="relative flex items-center justify-center">
                <img src="{{ asset('images/175510726.jpg') }}" alt="Nusvara"
                    class="w-auto max-h-96 object-cover rounded-3xl">
            </div>
            <x-section section="About Me" title="Saya sangat tertarik dengan perkembangan teknologi"
                description="Saya adalah seorang programmer yang mengulik dalam bidang web developer dan juga pada bidang machine learning. Nama asli saya adalah Yusuf Usman, tapi juga sering dikenal dengan nama Nusvara. Saya adalah developer yang bertempat tinggal di Indonesia."
                description2="Diluar bidang teknologi saya memiliki hobi catur, dan kadang kadang juga mencoba gambar random."
                :border="false">
            </x-section>
        </div>
        <x-section class="text-center" section="skills" title="Tech yang saya kuasai"
            description="Tools dan teknologi yang saya gunakan pada project saya." :border=false>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <x-card logo="fab fa-js" title="JavaScript" description="Bahasa Pemrograman." level="Newbie"></x-card>
                <x-card logo="fab fa-python" title="Python" description="Bahasa pemrograman."
                    level="Intermediate"></x-card>
                <x-card logo="fab fa-java" title="Java" description="Bahasa pemrograman." level="Intermediate"></x-card>
                <x-card logo="fab fa-laravel" title="Laravel" description="Framework Backend."
                    level="Intermediate"></x-card>
                <x-card logo="fab fa-php" title="PHP" description="Bahasa pemrograman." level="Intermediate"></x-card>
                <x-card logo="si si-tailwindcss" title="Tailwind" description="Framework Frontend."
                    level="Newbie"></x-card>
                <x-card logo="fab fa-bootstrap" title="Bootstrap" description="Framework Frontend."
                    level="Intermediate"></x-card>
                <x-card logo="si si-mysql" title="MySQL" description="Database." level="Intermediate"></x-card>
                <x-card logo="si si-sqlite" title="SQLite" description="Database." level="Intermediate"></x-card>

            </div>
        </x-section>
        <x-section section="projects" title="Beberapa projek saya">
            <x-button route="{{ route('projects.index') }}" variant="outline" text="Lihat Semua"></x-button>
            <div class="flex flex-row flex-wrap justify-center">
            </div>
        </x-section>

        <x-cta></x-cta>
    </div>
</div>
@endsection
