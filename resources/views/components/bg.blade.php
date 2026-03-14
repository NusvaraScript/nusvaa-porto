{{-- Grid — bergerak pelan --}}
<div class="fixed inset-0 pointer-events-none z-0" style="
    background-image: linear-gradient(rgba(255,255,255,0.09) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(255,255,255,0.09) 1px, transparent 1px);
    background-size: 60px 60px;
    opacity: 0.3;
    animation: gridMove 8s linear infinite;">
</div>

{{-- Glow kiri atas --}}
<div class="fixed pointer-events-none z-0 rounded-full" style="
    width: 400px; height: 400px;
    background: rgba(100,100,100,0.15);
    filter: blur(100px);
    top: 5%; left: -10%;
    animation: drift1 12s ease-in-out infinite;">
</div>

{{-- Glow kanan bawah --}}
<div class="fixed pointer-events-none z-0 rounded-full" style="
    width: 300px; height: 300px;
    background: rgba(100,100,100,0.15);
    filter: blur(100px);
    bottom: 5%; right: -5%;
    animation: drift2 15s ease-in-out infinite;">
</div>
