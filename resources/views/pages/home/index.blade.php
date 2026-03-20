@extends('layout.user')
@section('title', 'Nusvaa - Home')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <x-hero title="Hi, I'm Nusvara"
        description="I build web applications and create simple yet accurate prediction models.">
        <div class="flex space-x-4 items-center mt-4">
            <x-button route="{{ route('projects.index') }}" variant="solid" text="[My Projects]"></x-button>
            <x-button route="{{ route('contact.index') }}" variant="outline" text="[Contact Me]"></x-button>
        </div>
    </x-hero>
    <x-section image="images/175510726.jpg" section="About Me"
        title="I'm deeply interested in the growth of technology">
        <p class="text-sm my-4 text-gray-300 leading-relaxed">My name is <span class="font-bold">Nusvaa</span>, also
            known as <span class="font-bold">Nusvara</span>. But my real
            name is <span class="font-bold">Yusuf</span>. I am a 17 y/o high school student and also a developer
            from <span class="font-bold">Indonesia</span>. I am currently
            interested on webdev and machine learning models.</p>
        <p class="text-sm my-4 text-gray-300 leading-relaxed">Outside of tech, I also have other hobbies. Like
            playing chess, taking random pictures and occasionally try my hand at random sketches.</p>
    </x-section>
    <x-chatbox></x-chatbox>
    <x-section section="Expectations" title="What I Can Do For You">
        <div class="pt-3 grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-card logo="devicon-laravel-plain" title="Laravel Developer"
                description="Can build a web application from zero to deployment."></x-card>
            <x-card logo="devicon-python-plain" title="Python / Machine Learning"
                description="Can build a simple machine leaarning model for businesses."></x-card>
        </div>
        <p class="text-md md:text-lg text-gray-400 mt-6 text-center">Wanna know more? You can read more about me here
            <x-button route="{{ route('about') }}" variant="" text="[About]"></x-button>
        </p>
    </x-section>
    <x-section class="text-center" section="Skills <" title="Tech I work with"
        description="Tool and technologies I use across my projects.">
        <div class="pt-3 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <x-card logo="devicon-html5-plain" title="HTML" description="Markup language." level="Advanced"></x-card>
            <x-card logo="devicon-css3-plain" title="CSS" description="Styling language." level="Intermediate"></x-card>
            <x-card logo="devicon-javascript-plain" title="JavaScript" description="Programming language."
                level="Newbie"></x-card>
            <x-card logo="devicon-python-plain" title="Python" description="Programming language."
                level="Intermediate"></x-card>
            <x-card logo="devicon-java-plain" title="Java" description="Programming language."
                level="Intermediate"></x-card>
            <x-card logo="devicon-laravel-plain" title="Laravel" description="Backend framework."
                level="Advanced"></x-card>
            <x-card logo="devicon-nodejs-plain" title="Node.js" description="Backend framework."
                level="Newbie"></x-card>
            <x-card logo="devicon-php-plain" title="PHP" description="Programming language." level="Advanced"></x-card>
            <x-card logo="devicon-tailwindcss-plain" title="Tailwind" description="Frontend framework."
                level="Intermediate"></x-card>
            <x-card logo="devicon-bootstrap-plain" title="Bootstrap" description="Frontend framework."
                level="Intermediate"></x-card>
            <x-card logo="devicon-mysql-plain" title="MySQL" description="Database." level="Intermediate"></x-card>
            <x-card logo="devicon-sqlite-plain" title="SQLite" description="Database." level="Newbie"></x-card>
        </div>
    </x-section>
    <x-section section="Projects" title="Projects I've worked on">
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-card type='detail' title='Nusaman Website' description="Company profile website for Nusaman."
                :tags="['HTML', 'CSS', 'PHP', 'Laravel']" url="https://nusvarascript.github.io/project-nusaman/website/"
                source="https://github.com/NusvaraScript/project-nusaman"></x-card>
            <x-card type='detail' title='Nusvaa Portofolio' description="My personal portofolio."
                :tags="['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel']" url="https://nusvaa.rf.gd/"
                source="https://github.com/NusvaraScript/Nusvaa-Porto"></x-card>
        </div>
        <p class="text-md md:text-lg text-gray-400 mt-6 text-center">See more on
            <x-button route="{{ route('projects.index') }}" variant="" text="[Projects]"></x-button>
        </p>
    </x-section>

    <x-cta></x-cta>
</div>
@endsection
