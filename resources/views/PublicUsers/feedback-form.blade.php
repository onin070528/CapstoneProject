@extends('layouts.app')

@section('title', 'iTOUR - Submit Feedback')

@section('content')
<div class="min-h-screen bg-[#f0f5f7] text-slate-700 font-sans flex flex-col justify-between">
    <!-- Navbar / Header -->
    <header class="bg-white border-b border-slate-100 shadow-xs">
        <div class="max-w-4xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-md bg-[#0e4f5c] text-white flex items-center justify-center font-bold text-xs tracking-tight">iT</div>
                <div class="flex flex-col leading-none">
                    <span class="font-extrabold text-base text-[#0e4f5c] tracking-tight">iTOUR</span>
                    <span class="text-[8px] font-semibold text-[#706f6c] tracking-[0.15em] mt-0.5">DAVAO ORIENTAL</span>
                </div>
            </a>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tourist Feedback</span>
        </div>
    </header>

    <!-- Main Container -->
    <main class="flex-1 max-w-xl w-full mx-auto px-4 py-8">
        <div class="bg-white rounded-3xl border border-slate-200/60 shadow-xl overflow-hidden">
            <!-- Header Image or Icon Banner -->
            <div class="relative h-32 bg-[#0e4f5c] flex items-center justify-center text-white px-6">
                <div class="absolute inset-0 bg-gradient-to-br from-[#0c3f4a] to-[#125d6c] opacity-90"></div>
                <div class="relative text-center">
                    <h1 class="text-2xl font-extrabold tracking-tight">Share Your Experience</h1>
                    <p class="text-xs text-teal-200 mt-1 font-medium">Your reviews help improve tourism services across the province.</p>
                </div>
            </div>

            <div class="p-6 sm:p-8 space-y-6">
                <!-- Alerts -->
                @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-2xl flex flex-col items-center text-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">
                        <i class="fas fa-circle-check text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-base">Feedback Submitted!</h4>
                        <p class="text-xs text-slate-500 mt-1">{{ session('success') }}</p>
                    </div>
                    <a href="/" class="mt-2 bg-[#0e4f5c] hover:bg-[#0c3e49] text-white text-xs font-bold px-5 py-2 rounded-xl transition shadow-xs">
                        Return to Home
                    </a>
                </div>
                @else

                <!-- Form -->
                <form action="{{ route('feedback.submit', $establishment->uuid) }}" method="POST" class="space-y-5" x-data="{ rating: 5 }">
                    @csrf

                    <!-- Read-Only Section -->
                    <div class="bg-slate-50 border border-slate-200/80 rounded-2xl p-5 space-y-4">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-200 pb-2">Establishment Info</h3>
                        
                        <!-- Name -->
                        <div class="space-y-1">
                            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Establishment Name</label>
                            <input type="text" value="{{ $establishment->name }}" disabled class="w-full bg-slate-100 border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 cursor-not-allowed">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Location -->
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Location / Municipality</label>
                                <input type="text" value="{{ $establishment->municipality }}" disabled class="w-full bg-slate-100 border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 cursor-not-allowed">
                            </div>

                            <!-- Date -->
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Feedback Date</label>
                                <input type="text" value="{{ date('Y-m-d') }}" disabled class="w-full bg-slate-100 border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 cursor-not-allowed">
                            </div>
                        </div>
                    </div>

                    <!-- Input Section -->
                    <div class="space-y-4 pt-2">
                        <!-- Tourist Name -->
                        <div class="space-y-1">
                            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Your Name <span class="text-slate-400 font-normal">(Optional)</span></label>
                            <input type="text" name="tourist_name" placeholder="e.g. Juan Dela Cruz" class="w-full bg-white border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-medium focus:outline-none focus:border-[#0e4f5c] focus:ring-2 focus:ring-[#0e4f5c]/10 transition-all text-slate-800">
                        </div>

                        <!-- Rating Stars -->
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Overall Rating *</label>
                            <div class="flex items-center gap-2 text-3xl">
                                <input type="hidden" name="rating" x-model="rating">
                                <template x-for="i in 5">
                                    <button type="button" @click="rating = i" class="text-slate-200 hover:text-amber-400 transition-colors focus:outline-none cursor-pointer" :class="i <= rating ? 'text-amber-400' : 'text-slate-200'">
                                        ★
                                    </button>
                                </template>
                            </div>
                        </div>

                        <!-- Comments -->
                        <div class="space-y-1">
                            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Your Comments / Review *</label>
                            <textarea name="feedback_text" rows="4" required placeholder="Tell us about your experience..." maxlength="1000" class="w-full bg-white border border-slate-200 px-4 py-2.5 rounded-xl text-sm focus:outline-none focus:border-[#0e4f5c] focus:ring-2 focus:ring-[#0e4f5c]/10 transition-all resize-none text-slate-800"></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-[#0e4f5c] hover:bg-[#0c3e49] text-white px-6 py-3 rounded-2xl text-sm font-bold transition shadow-md flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fas fa-paper-plane text-xs"></i>
                            Submit Feedback
                        </button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-100 py-4 text-center text-xs text-slate-400 font-semibold">
        iTOUR Davao Oriental &copy; {{ date('Y') }}. All rights reserved.
    </footer>
</div>
@endsection
