{{-- 
    Background Music Player Component
    Usage: <x-music-player />
    
    Persists playback state across page navigation using localStorage.
    Tracks can be customized via the $tracks prop.
--}}

@props([
    'tracks' => [
        [
            'title' => 'Lofi Chill Vibes',
            'artist' => 'Nusvaa Playlist',
            'src' => 'z',
        ],
        [
            'title' => 'Calm Ambient',
            'artist' => 'Nusvaa Playlist',
            'src' => 'https://cdn.pixabay.com/audio/2024/09/10/audio_6e1d0b02e0.mp3',
        ],
        [
            'title' => 'Dreamy Piano',
            'artist' => 'Nusvaa Playlist',
            'src' => 'https://cdn.pixabay.com/audio/2025/03/10/audio_d00fba5155.mp3',
        ],
    ]
])

<style>
    #mpVolume {
        -webkit-appearance: none;
        appearance: none;
        width: 100%;
        height: 4px;
        background: rgba(148, 163, 184, 0.18);
        border-radius: 9999px;
        outline: none;
        cursor: pointer;
    }

    #mpVolume::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 14px;
        height: 14px;
        border-radius: 9999px;
        background: #38bdf8;
        box-shadow: 0 0 8px rgba(56, 189, 248, 0.35);
        cursor: pointer;
    }

    #mpVolume::-moz-range-thumb {
        width: 14px;
        height: 14px;
        border-radius: 9999px;
        background: #38bdf8;
        border: none;
        box-shadow: 0 0 8px rgba(56, 189, 248, 0.35);
        cursor: pointer;
    }
</style>

{{-- Music Player HTML --}}
<div id="musicPlayerRoot" class="fixed bottom-6 right-6 z-[1000]">
    <button id="mpToggle" title="Music Player" aria-label="Toggle music player"
            class="group relative flex h-14 w-14 items-center justify-center rounded-full border border-sky-500/20 bg-slate-950/95 text-sky-400 shadow-[0_16px_40px_rgba(15,23,42,0.55)] transition duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-sky-400/40">
        <span id="mpPulseRing" class="absolute inset-[-5px] rounded-full border border-sky-400/25 opacity-0 animate-ping"></span>
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="relative z-10 text-sky-400">
            <path d="M9 18V5l12-2v13"/>
            <circle cx="6" cy="18" r="3"/>
            <circle cx="18" cy="16" r="3"/>
        </svg>
    </button>

    <x-card id="mpPanel" type="basic" class="absolute right-0 bottom-16 w-80 max-w-[22rem] transform rounded-[1.5rem] bg-black/95 opacity-0 invisible translate-y-3 pointer-events-none transition-all duration-300 ease-out shadow-2xl shadow-slate-950/60 backdrop-blur-xl">
        <div class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-full border border-sky-500/15 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 shadow-[0_10px_30px_rgba(15,23,42,0.65)]">
            <div id="mpVinyl"
                 class="flex h-16 w-16 items-center justify-center rounded-full border border-sky-400/20 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 transition duration-300">
                <div class="h-6 w-6 rounded-full bg-gradient-to-br from-sky-500 to-blue-600 shadow-[0_0_18px_rgba(56,189,248,0.35)]"></div>
            </div>
        </div>

        <div class="text-center mb-4">
            <div class="text-xs uppercase tracking-[0.35em] text-sky-400/70">Now Playing</div>
            <div id="mpTrackTitle" class="mt-2 truncate text-sm font-semibold text-white">—</div>
            <div id="mpTrackArtist" class="mt-1 text-[11px] uppercase tracking-[0.25em] text-slate-500">—</div>
        </div>

        <div class="mb-4">
            <div id="mpProgressBar" class="relative h-2 rounded-full bg-slate-800 cursor-pointer overflow-hidden">
                <div id="mpProgressFill" class="h-full w-0 rounded-full bg-gradient-to-r from-sky-500 to-sky-300 transition-all duration-100"></div>
            </div>
            <div class="mt-2 flex justify-between text-[11px] text-slate-500">
                <span id="mpCurrentTime">0:00</span>
                <span id="mpDuration">0:00</span>
            </div>
        </div>

        <div class="mb-4 flex items-center justify-center gap-3">
            <button id="mpPrev" title="Previous" aria-label="Previous track"
                    class="inline-flex h-11 w-11 items-center justify-center bg-black border-2 border-white/10 hover:border-white hover:shadow-[5px_5px_0px_#fff] hover:scale-105 active:scale-95 transition-all text-slate-300 hover:text-white">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/>
                </svg>
            </button>
            <button id="mpPlayPause" title="Play" aria-label="Play or pause"
                    class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-sky-500 to-blue-600 text-white shadow-lg shadow-sky-500/20 transition duration-200 hover:scale-105 active:scale-95">
                <svg id="mpIconPlay" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M8 5v14l11-7z"/>
                </svg>
                <svg id="mpIconPause" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="hidden">
                    <path d="M6 4h4v16H6zM14 4h4v16h-4z"/>
                </svg>
            </button>
            <button id="mpNext" title="Next" aria-label="Next track"
                    class="inline-flex h-11 w-11 items-center justify-center bg-black border-2 border-white/10 hover:border-white hover:shadow-[5px_5px_0px_#fff] hover:scale-105 active:scale-95 transition-all text-slate-300 hover:text-white">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/>
                </svg>
            </button>
        </div>

        <div class="mb-4 flex items-center gap-3">
            <button id="mpVolumeIcon" type="button" class="text-slate-500 transition duration-200 hover:text-sky-400">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/>
                    <path d="M15.54 8.46a5 5 0 0 1 0 7.07" id="mpVolWave1"/>
                    <path d="M19.07 4.93a10 10 0 0 1 0 14.14" id="mpVolWave2"/>
                </svg>
            </button>
            <input id="mpVolume" type="range" min="0" max="100" value="50" aria-label="Volume"
                   class="h-2 w-full cursor-pointer bg-slate-800" />
        </div>

        <div id="mpTrackList" class="space-y-2 overflow-y-auto border-t border-slate-700/50 pt-3 max-h-44"></div>
    </x-card>
</div>

{{-- Audio Element --}}
<audio id="mpAudio" preload="auto"></audio>

@push('js')
<script>
(function() {
    // ── Track Data ──
    const tracks = @json($tracks);

    // ── State Keys ──
    const STORAGE_KEY = 'nusvaa_music_player';

    // ── DOM Elements ──
    const audio       = document.getElementById('mpAudio');
    const toggle      = document.getElementById('mpToggle');
    const panel       = document.getElementById('mpPanel');
    const pulseRing   = document.getElementById('mpPulseRing');
    const vinyl       = document.getElementById('mpVinyl');
    const titleEl     = document.getElementById('mpTrackTitle');
    const artistEl    = document.getElementById('mpTrackArtist');
    const progressBar = document.getElementById('mpProgressBar');
    const progressFill= document.getElementById('mpProgressFill');
    const currentTimeEl = document.getElementById('mpCurrentTime');
    const durationEl  = document.getElementById('mpDuration');
    const playPauseBtn= document.getElementById('mpPlayPause');
    const iconPlay    = document.getElementById('mpIconPlay');
    const iconPause   = document.getElementById('mpIconPause');
    const prevBtn     = document.getElementById('mpPrev');
    const nextBtn     = document.getElementById('mpNext');
    const volumeSlider= document.getElementById('mpVolume');
    const volumeIcon  = document.getElementById('mpVolumeIcon');
    const trackListEl = document.getElementById('mpTrackList');

    let currentIndex = 0;
    let isPlaying = false;

    // ── Helper: Format Time ──
    function formatTime(sec) {
        if (isNaN(sec) || !isFinite(sec)) return '0:00';
        const m = Math.floor(sec / 60);
        const s = Math.floor(sec % 60);
        return m + ':' + (s < 10 ? '0' : '') + s;
    }

    // ── Save State to localStorage ──
    function saveState() {
        const state = {
            index: currentIndex,
            time: audio.currentTime || 0,
            volume: audio.volume,
            playing: isPlaying,
        };
        try { localStorage.setItem(STORAGE_KEY, JSON.stringify(state)); } catch(e) {}
    }

    // ── Load State from localStorage ──
    function loadState() {
        try {
            const raw = localStorage.getItem(STORAGE_KEY);
            if (raw) return JSON.parse(raw);
        } catch(e) {}
        return null;
    }

    // ── Render Track List ──
    function renderTrackList() {
        trackListEl.innerHTML = '';
        tracks.forEach((t, i) => {
            const active = i === currentIndex;
            const item = document.createElement('div');
            item.className = `flex items-center gap-3 rounded-2xl border px-3 py-2 transition duration-200 cursor-pointer ${active ? 'border-sky-500/20 bg-slate-800/80' : 'border-transparent hover:bg-slate-800 hover:border-slate-700'}`;
            item.innerHTML = `
                <span class="flex h-7 w-7 items-center justify-center rounded-full text-[11px] font-semibold ${active ? 'text-sky-400' : 'text-slate-500'}">
                    ${active && isPlaying
                        ? '<span class="flex items-end gap-1"><span class="h-2 w-1 rounded-full bg-sky-400 animate-pulse"></span><span class="h-3 w-1 rounded-full bg-sky-400 animate-pulse"></span><span class="h-2 w-1 rounded-full bg-sky-400 animate-pulse"></span></span>'
                        : (i + 1)}
                </span>
                <div class="min-w-0">
                    <div class="truncate text-sm font-medium ${active ? 'text-white' : 'text-slate-300'}">${t.title}</div>
                    <div class="truncate text-xs text-slate-500">${t.artist}</div>
                </div>
            `;
            item.addEventListener('click', () => {
                if (i === currentIndex) {
                    togglePlay();
                } else {
                    loadTrack(i);
                    play();
                }
            });
            trackListEl.appendChild(item);
        });
    }

    // ── Load Track ──
    function loadTrack(index, seekTime) {
        currentIndex = index;
        const track = tracks[currentIndex];
        audio.src = track.src;
        titleEl.textContent = track.title;
        artistEl.textContent = track.artist;
        if (seekTime && seekTime > 0) {
            audio.currentTime = seekTime;
        }
        renderTrackList();
        saveState();
    }

    // ── Play / Pause ──
    function play() {
        const promise = audio.play();
        if (promise) promise.catch(() => {});
        isPlaying = true;
        iconPlay.classList.add('hidden');
        iconPause.classList.remove('hidden');
        vinyl.classList.add('animate-spin');
        vinyl.style.animationDuration = '3s';
        vinyl.style.animationTimingFunction = 'linear';
        pulseRing.classList.add('opacity-100');
        renderTrackList();
        saveState();
    }

    function pause() {
        audio.pause();
        isPlaying = false;
        iconPlay.classList.remove('hidden');
        iconPause.classList.add('hidden');
        vinyl.classList.remove('animate-spin');
        vinyl.style.animationDuration = '';
        vinyl.style.animationTimingFunction = '';
        pulseRing.classList.remove('opacity-100');
        renderTrackList();
        saveState();
    }

    function togglePlay() {
        if (isPlaying) pause(); else play();
    }

    // ── Next / Prev ──
    function nextTrack() {
        const idx = (currentIndex + 1) % tracks.length;
        loadTrack(idx);
        play();
    }

    function prevTrack() {
        if (audio.currentTime > 3) {
            audio.currentTime = 0;
            return;
        }
        const idx = (currentIndex - 1 + tracks.length) % tracks.length;
        loadTrack(idx);
        play();
    }

    // ── Progress ──
    audio.addEventListener('timeupdate', () => {
        if (audio.duration) {
            const pct = (audio.currentTime / audio.duration) * 100;
            progressFill.style.width = pct + '%';
            currentTimeEl.textContent = formatTime(audio.currentTime);
            durationEl.textContent = formatTime(audio.duration);
        }
        // Periodically save state
        if (Math.floor(audio.currentTime) % 3 === 0) saveState();
    });

    audio.addEventListener('ended', () => {
        nextTrack();
    });

    // Click on progress bar to seek
    progressBar.addEventListener('click', (e) => {
        const rect = progressBar.getBoundingClientRect();
        const pct = (e.clientX - rect.left) / rect.width;
        audio.currentTime = pct * audio.duration;
        saveState();
    });

    // ── Volume ──
    volumeSlider.addEventListener('input', () => {
        audio.volume = volumeSlider.value / 100;
        saveState();
    });

    volumeIcon.addEventListener('click', () => {
        if (audio.volume > 0) {
            audio.dataset.prevVol = audio.volume;
            audio.volume = 0;
            volumeSlider.value = 0;
        } else {
            audio.volume = parseFloat(audio.dataset.prevVol || 0.5);
            volumeSlider.value = Math.round(audio.volume * 100);
        }
        saveState();
    });

    function setPanelOpen(open) {
        panel.classList.toggle('opacity-100', open);
        panel.classList.toggle('opacity-0', !open);
        panel.classList.toggle('visible', open);
        panel.classList.toggle('invisible', !open);
        panel.classList.toggle('translate-y-0', open);
        panel.classList.toggle('translate-y-3', !open);
        panel.classList.toggle('pointer-events-auto', open);
        panel.classList.toggle('pointer-events-none', !open);
    }

    // ── Panel Toggle ──
    toggle.addEventListener('click', () => {
        setPanelOpen(panel.classList.contains('invisible'));
    });

    // Close panel when clicking outside
    document.addEventListener('click', (e) => {
        const root = document.getElementById('musicPlayerRoot');
        if (!root.contains(e.target)) {
            setPanelOpen(false);
        }
    });

    // ── Controls Event Listeners ──
    playPauseBtn.addEventListener('click', togglePlay);
    nextBtn.addEventListener('click', nextTrack);
    prevBtn.addEventListener('click', prevTrack);

    // ── Save state before page unload ──
    window.addEventListener('beforeunload', saveState);

    // ── Initialize ──
    const saved = loadState();
    if (saved) {
        currentIndex = saved.index || 0;
        audio.volume = saved.volume ?? 0.5;
        volumeSlider.value = Math.round(audio.volume * 100);
        loadTrack(currentIndex);

        // Wait for metadata then seek
        audio.addEventListener('loadedmetadata', function onMeta() {
            if (saved.time > 0) {
                audio.currentTime = saved.time;
            }
            audio.removeEventListener('loadedmetadata', onMeta);
        });

        // Auto-resume playback if it was playing before
        if (saved.playing) {
            // Small delay to let audio buffer
            setTimeout(() => play(), 300);
        }
    } else {
        audio.volume = 0.5;
        volumeSlider.value = 50;
        loadTrack(0);
    }

    // ── Keyboard Shortcuts ──
    document.addEventListener('keydown', (e) => {
        // Don't intercept when typing in inputs
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;

        if (e.code === 'Space' && panel.classList.contains('visible')) {
            e.preventDefault();
            togglePlay();
        }
    });
})();
</script>
@endpush
