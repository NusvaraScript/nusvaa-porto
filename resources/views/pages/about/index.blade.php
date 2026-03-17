@extends('layout.user')
@section('title', 'Nusvaa - About')
@section('content')
<div class="text-white py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-hero title="Who am i?">
            <p>I dont know, i guess i am a web developer.</p>
        </x-hero>
        <x-section image="images/175510726.jpg" section="More About Me" title="Who am i? Really.">
            <p class="text-sm my-4 text-gray-300 leading-relaxed">I am a web developer, i dont know what else to say
                about me at the moment.</p>
        </x-section>
        <x-section class="text-center items-center" section="My Competitions" title="Compettion I Attended To">
            <p class="text-xs my-4 text-gray-400 leading-relaxed text-center">I have none for now :sadge:</p>
        </x-section>
        <x-section section="About This Website" title="This Website is My Personal Space on The Internet">
            <p class="text-sm my-4 text-gray-300 leading-relaxed">This website is my own little personal space on the
                internet. I will try to expand this website based on anything I liked, or when I am trying something
                new.</p>
            <p class="text-sm my-4 text-gray-300 leading-relaxed">This website currently are still a bit messy, you can
                think of it like a children trying new things for the first time. For this website source code you can
                check them out on my Github Account! It's open source.</p>
            <p class="text-sm text-gray-300 leading-relaxed mb-2">In recognotion of the success for me on building
                this
                website, here are
                the sites of someone I
                took inspiration from!</p>
            <x-button route="https://adxxya30.vercel.app/" target="_blank" text="[adxxya30.vercel.app]"
                variant=""></x-button>-
            <x-button route="https://hexaa.sh/" target="_blank" text="[hexaa.sh]" variant=""></x-button>
        </x-section>
        <x-cta></x-cta>
    </div>
</div>
@endsection
