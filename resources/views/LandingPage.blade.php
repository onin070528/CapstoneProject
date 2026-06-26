@extends('layouts.app')

@section('title', 'iTOUR - Davao Oriental')

@section('content')
<div class="min-h-screen bg-slate-50 flex flex-col font-sans">
    <!-- Navigation Bar -->
    <header class="bg-white border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <div class="bg-[#004e5b] text-white rounded-[6px] w-9 h-9 flex items-center justify-center font-bold text-base tracking-tight shrink-0 shadow-sm">
                        iT
                    </div>
                    <div class="flex flex-col">
                        <span class="font-extrabold text-xl text-[#004e5b] tracking-tight leading-none">iTOUR</span>
                        <span class="text-[9px] font-bold text-[#706f6c] tracking-[0.18em] leading-none mt-1">DAVAO ORIENTAL</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="/" class="text-slate-800 font-semibold text-sm hover:text-[#004e5b] transition">Home</a>
                    <a href="/public" class="text-slate-600 font-medium text-sm hover:text-[#004e5b] transition">Destinations</a>
                    <a href="/public/establishments" class="text-slate-600 font-medium text-sm hover:text-[#004e5b] transition">Services</a>
                    <a href="/public" class="text-slate-600 font-medium text-sm hover:text-[#004e5b] transition">Portals</a>
                    <a href="#" class="text-slate-600 font-medium text-sm hover:text-[#004e5b] transition">Announcements</a>
                    <a href="#" class="text-slate-600 font-medium text-sm hover:text-[#004e5b] transition">Contact</a>
                </nav>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-6">
                    <a href="#" class="text-[#004e5b] hover:text-[#003842] font-semibold text-sm transition">Login</a>
                    <a href="#" class="bg-[#004e5b] hover:bg-[#003842] text-white px-6 py-2.5 rounded-[6px] font-semibold text-sm transition shadow-sm">Register</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="flex-1 relative flex items-center min-h-[calc(100vh-5rem)] overflow-hidden">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?q=80&w=2070&auto=format&fit=crop');">
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#03373f]/95 via-[#0e5c6a]/85 to-[#0b6477]/70 mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#002f37]/95 via-[#054b57]/80 to-transparent"></div>
        </div>

        <!-- Hero Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 w-full relative z-10">
            <div class="max-w-3xl">
                <!-- Office Pill -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border border-white/20 bg-white/10 text-white text-[11px] font-semibold tracking-wider uppercase mb-6 backdrop-blur-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#52ebd3]"></span>
                    Provincial Tourism Office - Davao Oriental
                </div>

                <!-- Main Heading -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.1] mb-6">
                    Explore, Experience, and Discover <span class="text-[#52ebd3]">Davao Oriental</span> with iTOUR
                </h1>

                <!-- Subtitle / Description -->
                <p class="text-base sm:text-lg text-white/85 leading-relaxed mb-8 max-w-2xl font-light">
                    An Integrated Tourism Information and Monitoring System that connects tourists, accredited establishments, and the Provincial Tourism Office through tourism information, visitor monitoring, and experience analytics.
                </p>

                <!-- Hero Action Buttons -->
                <div class="flex flex-wrap items-center gap-4 mb-16">
                    <a href="/public" class="bg-[#10b981] hover:bg-[#059669] text-white px-6 py-3.5 rounded-[6px] font-semibold text-sm tracking-wide transition flex items-center gap-2 shadow-lg shadow-emerald-950/20">
                        Explore Destinations
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <a href="#" class="bg-white hover:bg-slate-100 text-[#004e5b] px-6 py-3.5 rounded-[6px] font-semibold text-sm tracking-wide transition shadow-md">
                        Register as Tourist
                    </a>
                    <a href="/public/establishments" class="border border-white/35 hover:border-white text-white bg-white/5 hover:bg-white/10 px-6 py-3.5 rounded-[6px] font-semibold text-sm tracking-wide transition backdrop-blur-sm">
                        View Establishments
                    </a>
                </div>

                <!-- Stats Box -->
                <div class="grid grid-cols-2 md:grid-cols-4 border border-white/15 bg-white/5 backdrop-blur-[6px] rounded-xl p-6 md:p-7 gap-6 md:gap-2 max-w-2xl">
                    <!-- Stat 1 -->
                    <div class="flex flex-col justify-center">
                        <span class="text-3xl font-extrabold text-white leading-none mb-1.5">12.8K+</span>
                        <span class="text-[10px] font-bold text-white/60 tracking-wider uppercase">ARRIVALS</span>
                    </div>
                    <!-- Stat 2 -->
                    <div class="flex flex-col justify-center md:border-l border-white/10 md:pl-6">
                        <span class="text-3xl font-extrabold text-white leading-none mb-1.5">87</span>
                        <span class="text-[10px] font-bold text-white/60 tracking-wider uppercase">ESTABLISHMENTS</span>
                    </div>
                    <!-- Stat 3 -->
                    <div class="flex flex-col justify-center border-l border-white/10 pl-6">
                        <span class="text-3xl font-extrabold text-white leading-none mb-1.5">25</span>
                        <span class="text-[10px] font-bold text-white/60 tracking-wider uppercase">DESTINATIONS</span>
                    </div>
                    <!-- Stat 4 -->
                    <div class="flex flex-col justify-center border-l border-white/10 pl-6">
                        <span class="text-3xl font-extrabold text-white leading-none mb-1.5">92%</span>
                        <span class="text-[10px] font-bold text-white/60 tracking-wider uppercase">SATISFACTION</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
