@extends('layout.user')
@section('title', 'Home')
@section('content')
<div class="text-white py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-hero title="Hi, I'm Nusvara">
            <p>I build web applications and create simple yet accurate prediction models.</p>
            <div class="flex space-x-4 items-center mt-4">
                <x-button route="{{ route('projects.index') }}" variant="solid" text="My Projects"></x-button>
                <x-button route="{{ route('contact.index') }}" variant="outline" text="Contact Me"></x-button>
            </div>
        </x-hero>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-stretch py-6 border-t border-white/10">
            <div class="relative flex items-center justify-center">
                <img src="{{ asset('images/175510726.jpg') }}" alt="Nusvara"
                    class="w-auto max-h-96 object-cover rounded-3xl">
            </div>
            <x-section section="About Me" title="I'm deeply interested in the growth of technology"
                description="My name is Nusvaa, also known as Nusvara. But my real name is Yusuf. I am a 17 y/o high school student and also a developer from Indonesia. I am currently interested on webdev and machine learning models."
                description2="Outside of tech, I also have other hobbies. Like playing chess, taking random pictures and occasionally try my hand at random sketches."
                :border="false">
            </x-section>
        </div>
        <x-section class="text-center" section="Skills" title="Tech I work with"
            description="Tools and technologies I use across my projects.">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <x-card logo="devicon-html5-plain" title="HTML" description="Markup language."
                    level="Intermediate"></x-card>
                <x-card logo="devicon-css3-plain" title="CSS" description="Styling language."
                    level="Intermediate"></x-card>
                <x-card logo="devicon-javascript-plain" title="JavaScript" description="Programming language."
                    level="Newbie"></x-card>
                <x-card logo="devicon-python-plain" title="Python" description="Programming language."
                    level="Intermediate"></x-card>
                <x-card logo="devicon-java-plain" title="Java" description="Programming language."
                    level="Intermediate"></x-card>
                <x-card logo="devicon-laravel-plain" title="Laravel" description="Backend framework."
                    level="Intermediate"></x-card>
                <x-card logo="devicon-php-plain" title="PHP" description="Programming language."
                    level="Intermediate"></x-card>
                <x-card logo="devicon-tailwindcss-plain" title="Tailwind" description="Frontend framework."
                    level="Newbie"></x-card>
                <x-card logo="devicon-bootstrap-plain" title="Bootstrap" description="Frontend framework."
                    level="Intermediate"></x-card>
                <x-card logo="devicon-mysql-plain" title="MySQL" description="Database." level="Intermediate"></x-card>
                <x-card logo="devicon-sqlite-plain" title="SQLite" description="Database."
                    level="Intermediate"></x-card>
            </div>
        </x-section>
        <x-section section="Projects" title="Some of my projects">
            <x-button route="{{ route('projects.index') }}" variant="outline" text="View All"></x-button>
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-card type='detail' title='Nusaman Website' description="Company profile website for Nusaman."
                    :tags="['HTML', 'CSS', 'PHP', 'Laravel']"
                    url="https://nusvarascript.github.io/project-nusaman/website/"
                    source="https://github.com/NusvaraScript/project-nusaman"></x-card>
            </div>
        </x-section>

        <x-cta></x-cta>
    </div>
</div>
@endsection
