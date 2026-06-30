<div x-data="chatbot" class="relative">
    <!-- Floating Action Button (FAB) -->
    <button 
        @click="toggleChat()" 
        class="fixed bottom-6 right-6 z-50 w-14 h-14 rounded-full bg-gradient-to-tr from-[#0a3f4a] to-[#0e4f5c] hover:from-[#0e4f5c] hover:to-[#126475] text-white shadow-lg shadow-teal-950/20 hover:shadow-xl hover:shadow-teal-950/30 transition-all duration-300 flex items-center justify-center transform hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0e4f5c]"
        aria-label="Toggle chat assistant"
    >
        <!-- Icon toggle -->
        <span x-show="!open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100" class="text-xl">
            <i class="fa-solid fa-robot animate-bounce" style="animation-duration: 3s;"></i>
        </span>
        <span x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100" class="text-xl" style="display: none;">
            <i class="fa-solid fa-xmark"></i>
        </span>

        <!-- Notification dot -->
        <span 
            x-show="unread && !open" 
            class="absolute top-0 right-0 w-3.5 h-3.5 bg-rose-500 rounded-full border-2 border-white animate-pulse"
        ></span>
    </button>

    <!-- Chat Panel Window -->
    <div 
        x-show="open"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 translate-y-8 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-8 scale-95"
        class="fixed bottom-24 right-6 w-96 max-w-[calc(100vw-2rem)] h-[580px] max-h-[calc(100vh-8rem)] bg-white/95 backdrop-blur-md rounded-2xl border border-gray-100 shadow-2xl z-50 flex flex-col overflow-hidden transition-all duration-300"
        style="display: none;"
    >
        <!-- Header -->
        <div class="bg-gradient-to-r from-[#0a3f4a] to-[#0e4f5c] text-white p-4 flex items-center justify-between shadow-md">
            <div class="flex items-center gap-3">
                <div class="relative w-10 h-10 rounded-full bg-white/10 flex items-center justify-center border border-white/20">
                    <i class="fa-solid fa-robot text-teal-200 text-lg"></i>
                    <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-emerald-500 rounded-full border border-white animate-ping"></span>
                    <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-emerald-500 rounded-full border border-white"></span>
                </div>
                <div>
                    <h3 class="font-semibold text-sm leading-tight">iTOUR AI Assistant</h3>
                    <p class="text-xs text-teal-200 flex items-center gap-1.5 mt-0.5">
                        <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                        System Support (Online)
                    </p>
                </div>
            </div>
            <button 
                @click="toggleChat()" 
                class="text-white/80 hover:text-white hover:bg-white/10 w-8 h-8 rounded-full flex items-center justify-center transition-colors focus:outline-none"
            >
                <i class="fa-solid fa-minus"></i>
            </button>
        </div>

        <!-- Warning Disclaimer Header -->
        <div class="bg-amber-50/80 border-b border-amber-100/60 px-4 py-2 flex items-start gap-2.5">
            <i class="fa-solid fa-triangle-exclamation text-amber-600 text-xs mt-0.5"></i>
            <p class="text-[11px] font-medium text-amber-800 leading-relaxed">
                This assistant is programed to only answer questions about the **iTOUR System** (registration, dashboard, QR codes). Unrelated questions will be disregarded.
            </p>
        </div>

        <!-- Messages Area -->
        <div 
            x-ref="messagesContainer"
            class="flex-1 overflow-y-auto p-4 space-y-4 bg-slate-50/50"
        >
            <template x-for="msg in messages" :key="msg.id">
                <div 
                    class="flex items-start gap-2.5 max-w-[85%]"
                    :class="msg.sender === 'user' ? 'ml-auto flex-row-reverse' : ''"
                >
                    <!-- Avatar for AI -->
                    <template x-if="msg.sender === 'ai'">
                        <div class="w-8 h-8 rounded-full bg-teal-50 flex items-center justify-center border border-teal-100 flex-shrink-0">
                            <i class="fa-solid fa-robot text-teal-700 text-xs"></i>
                        </div>
                    </template>

                    <!-- Avatar for User -->
                    <template x-if="msg.sender === 'user'">
                        <div class="w-8 h-8 rounded-full bg-teal-800 flex items-center justify-center flex-shrink-0 text-white font-semibold text-xs shadow-sm">
                            U
                        </div>
                    </template>

                    <div class="flex flex-col">
                        <!-- Message Bubble -->
                        <div 
                            class="p-3 text-xs leading-relaxed transition-all duration-200"
                            :class="msg.sender === 'user' 
                                ? 'bg-gradient-to-tr from-[#0a3f4a] to-[#0e4f5c] text-white rounded-2xl rounded-tr-none shadow-sm' 
                                : 'bg-white text-gray-700 border border-gray-100 rounded-2xl rounded-tl-none shadow-sm'"
                            x-html="renderMessage(msg.text)"
                        ></div>
                        <!-- Timestamp -->
                        <span 
                            class="text-[9px] text-gray-400 mt-1"
                            :class="msg.sender === 'user' ? 'text-right' : 'text-left'"
                            x-text="msg.time"
                        ></span>
                    </div>
                </div>
            </template>

            <!-- Suggestions chips (only show when there is only the welcome message) -->
            <div x-show="messages.length === 1" class="pt-2 space-y-2 pl-10" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0">
                <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider">Suggested Questions</p>
                <div class="flex flex-col gap-1.5">
                    <template x-for="sug in suggestions">
                        <button 
                            @click="selectSuggestion(sug)"
                            class="text-left w-full px-3 py-2 bg-white hover:bg-teal-50/50 border border-gray-100 hover:border-teal-200 text-teal-800 rounded-xl text-xs font-medium shadow-sm transition-all duration-200 hover:-translate-y-0.5 active:translate-y-0"
                            x-text="sug"
                        ></button>
                    </template>
                </div>
            </div>

            <!-- Typing Indicator -->
            <div x-show="isTyping" class="flex items-start gap-2.5 max-w-[85%]" style="display: none;">
                <div class="w-8 h-8 rounded-full bg-teal-50 flex items-center justify-center border border-teal-100 flex-shrink-0">
                    <i class="fa-solid fa-robot text-teal-700 text-xs"></i>
                </div>
                <div class="bg-white border border-gray-100 rounded-2xl rounded-tl-none p-3 shadow-sm">
                    <div class="flex items-center gap-1">
                        <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                        <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 150ms"></div>
                        <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 300ms"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-3 bg-white border-t border-gray-100 flex items-center gap-2">
            <input 
                type="text" 
                x-model="newMessage"
                @keydown.enter="sendMessage()"
                placeholder="Ask me about the system..." 
                class="flex-1 py-2 px-4 bg-gray-50 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-[#0e4f5c] focus:border-transparent text-xs placeholder-gray-400 focus:bg-white transition-all duration-200"
                :disabled="isTyping"
            >
            <button 
                @click="sendMessage()"
                class="w-9 h-9 rounded-full bg-gradient-to-tr from-[#0a3f4a] to-[#0e4f5c] hover:from-[#0e4f5c] hover:to-[#126475] text-white flex items-center justify-center shadow-md shadow-teal-900/10 active:scale-95 transition-all duration-200 disabled:opacity-50"
                :disabled="isTyping || !newMessage.trim()"
            >
                <i class="fa-solid fa-paper-plane text-xs"></i>
            </button>
        </div>

        <!-- Small Branding Footer -->
        <div class="bg-gray-50 border-t border-gray-100 py-1.5 text-center">
            <span class="text-[9px] text-gray-400 uppercase tracking-widest font-semibold flex items-center justify-center gap-1">
                Powered by iTOUR Intelligence
            </span>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('chatbot', () => ({
        open: false,
        unread: true,
        messages: [
            {
                id: 1,
                sender: 'ai',
                text: "Hello! I am the **iTOUR AI Assistant**. 🤖\n\nI am programmed to only assist with questions regarding the **iTOUR Davao Oriental Tourism Intelligence System** (such as registration, login, dashboards, visitor QR codes, or reports).\n\nHow can I help you with the system today?",
                time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
            }
        ],
        suggestions: [
            "How do I register an establishment?",
            "What is the QR code for?",
            "What features does the PTO Admin dashboard have?",
            "How is tourism data monitored?"
        ],
        newMessage: '',
        isTyping: false,
        
        init() {
            // Keep content scrolled down as messages are added
            this.$watch('messages', () => {
                this.scrollToBottom();
            });
            this.$watch('isTyping', () => {
                this.scrollToBottom();
            });
        },
        
        toggleChat() {
            this.open = !this.open;
            if (this.open) {
                this.unread = false;
                this.scrollToBottom();
            }
        },
        
        scrollToBottom() {
            this.$nextTick(() => {
                const container = this.$refs.messagesContainer;
                if (container) {
                    container.scrollTop = container.scrollHeight;
                }
            });
        },
        
        selectSuggestion(suggestion) {
            this.newMessage = suggestion;
            this.sendMessage();
        },
        
        async sendMessage() {
            if (!this.newMessage.trim()) return;
            
            const userText = this.newMessage.trim();
            this.newMessage = '';
            
            // Add user message to UI
            this.messages.push({
                id: Date.now(),
                sender: 'user',
                text: userText,
                time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
            });
            
            this.isTyping = true;
            this.scrollToBottom();
            
            try {
                const response = await fetch("{{ route('chatbot.query') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message: userText })
                });
                
                const data = await response.json();
                this.isTyping = false;
                
                if (data.status === 'success') {
                    this.messages.push({
                        id: Date.now() + 1,
                        sender: 'ai',
                        text: data.reply,
                        time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
                    });
                } else {
                    this.messages.push({
                        id: Date.now() + 1,
                        sender: 'ai',
                        text: "I encountered an issue processing that query. Please try again.",
                        time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
                    });
                }
            } catch (error) {
                console.error("Chatbot request error:", error);
                this.isTyping = false;
                this.messages.push({
                    id: Date.now() + 1,
                    sender: 'ai',
                    text: "Sorry, I couldn't reach the server. Please check your internet connection.",
                    time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
                });
            }
        },

        renderMessage(text) {
            if (!text) return '';
            // Escape HTML
            let escaped = text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
            
            // Format bold text (**text**)
            escaped = escaped.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            
            // Convert newlines to <br>
            return escaped.replace(/\n/g, '<br>');
        }
    }));
});
</script>
