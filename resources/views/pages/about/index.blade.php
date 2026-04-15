@extends('layout.user')
@section('title', 'Nusvaa - About')
@section('content')
    <div class="text-white py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-hero title="Who am i?" description="I dont know, i guess i am a web developer.">
            </x-hero>
            <x-section image="images/175510726.jpg" section="More About Me" title="Who am i? Really.">
                <p class="text-sm my-4 text-gray-300 leading-relaxed">I am a web developer, i dont know what else to say
                    about me at the moment.</p>
            </x-section>
            <section class="reveal bg-black">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch">
                    <div class="grid grid-rows-2 gap-6">
                        <div class="flex flex-col bg-white/5 p-4 border border-white">
                            <h3 class="text-xs md:text-sm text-blue-500 uppercase tracking-widest">> Coding Activity</h3>
                            <div class="flex-grow flex items-center justify-center">
                                <img src="https://github-readme-streak-stats.herokuapp.com/?user=NusvaraScript&theme=transparent&hide_border=true" class="w-full object-contain">
                            </div>
                        </div>
                        
                        <div class="flex flex-col bg-white/5 p-4 border border-white">
                             <h3 class="text-xs md:text-sm text-blue-500 uppercase tracking-widest">> Top Languages</h3>
                             <p class="text-sm sm:text-base my-4 text-gray-300 leading-relaxed">idk</p>
                        </div>
                    </div>
                
                    <div class="flex flex-col bg-white/5 p-4 border border-white justify-between">
                        <h3 class="text-xs md:text-sm text-blue-500 uppercase tracking-widest mb-4">> Music Activity</h3>
                        
                        <div class="flex-grow flex flex-col justify-center">
                            <div id="spotify-container" class="hidden mb-6 p-3 bg-white/5 rounded-lg border border-green-500/30">
                                <p class="text-sm text-green-500 font-bold mb-2 uppercase">Now Playing</p>
                                <div class="flex items-center gap-4">
                                    <img id="track-art" src="" class="w-12 h-12 rounded shadow-lg">
                                    <div class="overflow-hidden">
                                        <p id="track-name" class="text-white font-bold truncate text-sm"></p>
                                        <p id="track-artist" class="text-gray-400 text-xs truncate"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="mt-auto">
                            <p class="text-[10px] text-gray-500 font-bold mb-2 text-center uppercase tracking-widest">Previously Played</p>
                            <img src="https://spotify-recently-played-readme.vercel.app/api?user=31aapco5xeqdt32exhkaafdvpmxm&count=5" class="w-full opacity-80">
                        </div>
                    </div>
                </div>
            </section>
            <x-section class="text-center items-center" section="My Competitions <" title="Compettion I Attended To">
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
@push('js')
    <script>
        async function updateSpotify() {
            const DISCORD_ID = "836841973595897877";

            try {
                const response = await fetch(`https://api.lanyard.rest/v1/users/${DISCORD_ID}`);
                const { data } = await response.json();

                const container = document.getElementById('spotify-container');
                const offline = document.getElementById('spotify-offline');

                if (data.listening_to_spotify && data.spotify) {
                    // Update Data
                    document.getElementById('track-art').src = data.spotify.album_art_url;
                    document.getElementById('track-name').innerText = data.spotify.track;
                    document.getElementById('track-artist').innerText = data.spotify.artist;

                    // Tampilkan container, sembunyikan pesan offline
                    container.classList.remove('hidden');
                    offline.classList.add('hidden');
                } else {
                    container.classList.add('hidden');
                    offline.classList.remove('hidden');
                }
            } catch (error) {
                console.error("Lanyard Error:", error);
            }
        }
        updateSpotify();
        setInterval(updateSpotify, 30000);
    </script>
@endpush