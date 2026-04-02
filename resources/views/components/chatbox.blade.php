<section class="py-8 my-6 reveal">
    <div class="">
        <div class="flex flex-col gap-10">
            {{-- Header --}}
            <div class="text-center">
                <p class="text-xs md:text-sm text-blue-500 uppercase tracking-widest">
                    > My Assistant &lt;</p>
                <h2 class="text-3xl sm:text-4xl font-bold text-white mt-2 mb-3">Ask Me Anything</h2>
                <p class="text-gray-400 text-base max-w-md mx-auto">
                    Have questions about my work or experience? My AI assistant knows everything about me.
                </p>
            </div>

            {{-- Chat Card --}}
            <div class="bg-black border border-white overflow-hidden flex flex-col shadow-2xl">

                {{-- Card Header --}}
                <div class="flex items-center gap-3 px-5 py-4 border-b border-gray-800">
                    <div class="relative flex-shrink-0">
                        <div
                            class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-black font-bold text-sm select-none">
                            NY
                        </div>
                        <span
                            class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-400 border-2 border-gray-900 rounded-full"></span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-100">Nusvara's Assistant</p>
                        <p class="text-xs text-blue-500">Always online · Powered by Groq AI</p>
                    </div>
                    <div class="ml-auto flex gap-1.5">
                        <span class="w-3 h-3 rounded-full bg-gray-700"></span>
                        <span class="w-3 h-3 rounded-full bg-gray-700"></span>
                        <span class="w-3 h-3 rounded-full bg-gray-700"></span>
                    </div>
                </div>

                {{-- Messages --}}
                <div id="chat-messages" class="flex flex-col h-96 overflow-y-auto px-5 py-5 gap-4">

                    {{-- Empty State --}}
                    <div id="chat-empty" class="flex flex-col items-center justify-center h-full gap-6">
                        <div class="text-center">
                            <div
                                class="w-14 h-14 rounded-2xl bg-white border border-white/10 flex items-center justify-center mx-auto mb-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" stroke="#000000"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <p class="text-gray-400 text-sm">Start by picking a question below, or type your own.</p>
                        </div>
                        <div id="suggestions-empty" class="flex flex-wrap gap-2 justify-center"></div>
                    </div>

                </div>

                {{-- Suggestions (after chat starts) --}}
                <div id="suggestions-bar" class="hidden px-5 pb-3 pt-3 flex gap-2 flex-wrap border-t border-gray-800 ">
                </div>

                {{-- Input --}}
                <div class="px-5 py-4 border-t border-white/10 bg-black">
                    <div id="input-wrapper"
                        class="flex items-end gap-3 bg-white/10 border border-white/10 rounded-xl px-4 py-3 transition-colors focus-within:border-white">
                        <textarea id="chat-input" rows="1" placeholder="Type your question..."
                            class="flex-1 bg-transparent text-sm text-gray-100 placeholder-gray-500 resize-none outline-none leading-relaxed"
                            style="max-height:100px"></textarea>
                        <button id="send-btn" disabled
                            class="flex-shrink-0 w-9 h-9 flex items-center justify-center rounded-lg bg-white transition-all cursor-not-allowed">
                            <svg id="send-icon" width="15" height="15" viewBox="0 0 24 24" fill="none">
                                <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" stroke="#000000" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-center text-gray-600 text-xs mt-2 tracking-wide">Enter to send · Shift+Enter for new
                        line
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

@push('js')
<script>
    (function () {
        // ── Config ───────────────────────────────────────────────
        // GANTI dengan route proxy Laravel!
        // Contoh: '/api/chat'
        // Untuk sementara bisa langsung ke Anthropic, tapi tidak disarankan untuk production
        const API_URL = '/api/chat';
        const SUGGESTIONS = [
            'What are your main skills?',
            'Tell me about your projects',
            'Are you available for freelance?',
            'What\'s your tech stack?',
        ];

        // ── State ─────────────────────────────────────────────────
        let messages = [];
        let loading = false;

        // ── Elements ──────────────────────────────────────────────
        const messagesEl = document.getElementById('chat-messages');
        const emptyEl = document.getElementById('chat-empty');
        const suggestEmpty = document.getElementById('suggestions-empty');
        const suggestBar = document.getElementById('suggestions-bar');
        const inputEl = document.getElementById('chat-input');
        const sendBtn = document.getElementById('send-btn');
        const sendIcon = document.getElementById('send-icon');

        // ── Render suggestion chips ───────────────────────────────
        function renderSuggestions(container) {
            container.innerHTML = '';
            SUGGESTIONS.forEach(s => {
                const btn = document.createElement('button');
                btn.textContent = s;
                btn.className = 'text-xs px-4 py-1.5 mx-1 bg-white text-black border-2 border-black hover:shadow-[5px_5px_0px_#fff] hover:scale-105 active: scale - 95 transition - all';
                btn.addEventListener('click', () => sendMessage(s));
                container.appendChild(btn);
            });
        }

        renderSuggestions(suggestEmpty);

        // ── Send button state ─────────────────────────────────────
        function setSendEnabled(enabled) {
            sendBtn.disabled = !enabled;
            sendBtn.className = `flex-shrink-0 w-9 h-9 flex items-center justify-center rounded-lg transition-all ${enabled
                ? 'bg-white hover:bg-white/10 cursor-pointer hover:scale-105 active:scale-95'
                : 'bg-gray-700 cursor-not-allowed'
                }`;
            sendIcon.querySelector('path').setAttribute('stroke', enabled ? '#0d1117' : '#4b5563');
        }

        inputEl.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = Math.min(this.scrollHeight, 100) + 'px';
            setSendEnabled(this.value.trim().length > 0 && !loading);
        });

        inputEl.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });

        sendBtn.addEventListener('click', () => sendMessage());

        // ── Append bubble ─────────────────────────────────────────
        function appendBubble(role, text) {
            const row = document.createElement('div');
            row.className = `flex items-end gap-2 ${role === 'user' ? 'justify-end' : 'justify-start'} animate-fade`;

            if (role === 'assistant') {
                const avatar = document.createElement('div');
                avatar.className = 'w-7 h-7 rounded-full bg-white flex items-center justify-center text-black font-bold text-xs flex-shrink-0 mb-0.5';
                avatar.textContent = 'NY';
                row.appendChild(avatar);
            }

            const bubble = document.createElement('div');
            bubble.className = `max-w-xs sm:max-w-sm px-4 py-2.5 rounded-2xl text-sm leading-relaxed ${role === 'user'
                ? 'bg-white text-black rounded-br-sm'
                : 'bg-white/10 text-white rounded-bl-sm'
                }`;
            bubble.textContent = text;
            row.appendChild(bubble);
            messagesEl.appendChild(row);
            messagesEl.scrollTop = messagesEl.scrollHeight;
            return row;
        }

        // ── Typing indicator ──────────────────────────────────────
        let typingEl = null;
        function showTyping() {
            const row = document.createElement('div');
            row.className = 'flex items-end gap-2 justify-start';
            row.innerHTML = `
      <div class="w-7 h-7 rounded-full bg-white flex items-center justify-center text-black font-bold text-xs flex-shrink-0 mb-0.5">NY</div>
      <div class="bg-white/10 rounded-2xl rounded-bl-sm px-4 py-3 flex gap-1 items-center">
        <span class="w-2 h-2 rounded-full bg-white animate-bounce" style="animation-duration:.9s;animation-delay:0s"></span>
        <span class="w-2 h-2 rounded-full bg-white animate-bounce" style="animation-duration:.9s;animation-delay:.15s"></span>
        <span class="w-2 h-2 rounded-full bg-white animate-bounce" style="animation-duration:.9s;animation-delay:.3s"></span>
      </div>`;
            messagesEl.appendChild(row);
            messagesEl.scrollTop = messagesEl.scrollHeight;
            typingEl = row;
        }
        function hideTyping() {
            if (typingEl) {typingEl.remove(); typingEl = null;}
        }

        // ── Send message ──────────────────────────────────────────
        async function sendMessage(preset) {
            const text = preset ?? inputEl.value.trim();
            if (!text || loading) return;

            // Hide empty state, show suggestions bar
            emptyEl.classList.add('hidden');
            suggestBar.classList.remove('hidden');
            suggestBar.classList.add('flex');
            renderSuggestions(suggestBar);

            inputEl.value = '';
            inputEl.style.height = 'auto';
            setSendEnabled(false);

            messages.push({role: 'user', content: text});
            appendBubble('user', text);

            loading = true;
            showTyping();

            try {
                const res = await fetch(API_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '',
                    },
                    body: JSON.stringify({messages}),
                });

                const data = await res.json();
                // Sesuaikan dengan response dari proxy controller kamu
                const reply = data.reply ?? data.content?.[0]?.text ?? 'Sorry, I could not process that.';
                messages.push({role: 'assistant', content: reply});
                hideTyping();
                appendBubble('assistant', reply);
            } catch {
                hideTyping();
                appendBubble('assistant', '⚠️ Connection error. Please try again.');
            } finally {
                loading = false;
            }
        }
    })();
</script>
@endpush
