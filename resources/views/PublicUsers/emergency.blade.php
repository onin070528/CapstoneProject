@extends('layouts.app')

@section('title', 'Emergency Services - iTOUR')

@section('content')
<div class="min-h-screen bg-[#f0f5f7] flex flex-col font-sans">

    <!-- Navigation Bar -->
    <header class="bg-white border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <div class="bg-[#0e4f5c] text-white rounded-md w-8 h-8 flex items-center justify-center font-bold text-xs tracking-tight shrink-0">
                        iT
                    </div>
                    <div class="flex flex-col">
                        <span class="font-extrabold text-base text-[#0e4f5c] tracking-tight leading-none">iTOUR</span>
                        <span class="text-[8px] font-semibold text-[#706f6c] tracking-[0.15em] leading-none mt-0.5">DAVAO ORIENTAL</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="hidden lg:flex items-center gap-7">
                    <a href="/public" class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Home</a>
                    <a href="/public" class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Destinations</a>
                    <a href="/public/establishments" class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Establishments</a>
                    <a href="/public/events" class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Events</a>
                    <a href="/public/travel-guide" class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Travel Guide</a>
                    <a href="/public/emergency" class="text-slate-800 font-semibold text-sm hover:text-[#0e4f5c] transition">Emergency</a>
                </nav>

                <!-- Action Buttons -->
                <div class="flex items-center gap-3">
                    <a href="#" class="border border-slate-300 text-slate-700 px-4 py-1.5 rounded-md font-medium text-sm hover:bg-slate-50 transition">My Profile</a>
                    <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white px-4 py-1.5 rounded-md font-medium text-sm transition">Switch Portal</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Teal accent line -->
    <section class="bg-gradient-to-r from-[#0a3842] via-[#0e5060] to-[#3a8a8e] py-1.5"></section>

    <main class="flex-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Title -->
            <div class="mb-4">
                <h1 class="text-2xl font-bold text-[#0e4f5c]">Emergency Services</h1>
                <p class="text-sm text-slate-400 mt-1">Hotlines and assistance contacts across Davao Oriental.</p>
            </div>
            <hr class="border-slate-200 mb-6">

            <!-- Warning Banner -->
            <div class="bg-[#fef9e7] border border-[#f5d060] rounded-lg px-5 py-3.5 mb-8 flex items-center gap-3">
                <span class="text-amber-500 text-lg">⚠</span>
                <p class="text-sm text-slate-700">
                    <strong>In case of emergency,</strong> call <strong>911</strong> or the Tourism Assistance Hotline first. Save these numbers before your trip.
                </p>
            </div>

            <!-- Emergency Contact Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Police -->
                <div class="bg-white rounded-lg border border-slate-200 p-6 flex items-start gap-4">
                    <div class="bg-[#e0f2f1] rounded-xl w-14 h-14 flex items-center justify-center shrink-0">
                        <span class="text-2xl">🚔</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-teal-600 tracking-wider uppercase mb-1">POLICE</p>
                        <h3 class="font-bold text-slate-800 text-base">Mati City Police Station</h3>
                        <p class="text-xs text-slate-400 mt-1">Rizal Street, Mati City</p>
                        <p class="text-lg font-bold text-slate-800 mt-2">(087) 388-3030</p>
                    </div>
                </div>

                <!-- Hospital -->
                <div class="bg-white rounded-lg border border-slate-200 p-6 flex items-start gap-4">
                    <div class="bg-[#e0f2f1] rounded-xl w-14 h-14 flex items-center justify-center shrink-0">
                        <span class="text-2xl">🏥</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-teal-600 tracking-wider uppercase mb-1">HOSPITAL</p>
                        <h3 class="font-bold text-slate-800 text-base">Davao Oriental Provincial Hospital</h3>
                        <p class="text-xs text-slate-400 mt-1">Dahican Road, Mati City</p>
                        <p class="text-lg font-bold text-slate-800 mt-2">(087) 388-3621</p>
                    </div>
                </div>

                <!-- Fire Station -->
                <div class="bg-white rounded-lg border border-slate-200 p-6 flex items-start gap-4">
                    <div class="bg-[#e0f2f1] rounded-xl w-14 h-14 flex items-center justify-center shrink-0">
                        <span class="text-2xl">🚒</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-teal-600 tracking-wider uppercase mb-1">FIRE STATION</p>
                        <h3 class="font-bold text-slate-800 text-base">Mati City Fire Station</h3>
                        <p class="text-xs text-slate-400 mt-1">City Hall Compound, Mati City</p>
                        <p class="text-lg font-bold text-slate-800 mt-2">160</p>
                    </div>
                </div>

                <!-- Coast Guard -->
                <div class="bg-white rounded-lg border border-slate-200 p-6 flex items-start gap-4">
                    <div class="bg-[#e0f2f1] rounded-xl w-14 h-14 flex items-center justify-center shrink-0">
                        <span class="text-2xl">⚓</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-teal-600 tracking-wider uppercase mb-1">COAST GUARD</p>
                        <h3 class="font-bold text-slate-800 text-base">Philippine Coast Guard - Mati</h3>
                        <p class="text-xs text-slate-400 mt-1">Pujada Port, Mati City</p>
                        <p class="text-lg font-bold text-slate-800 mt-2">(087) 811-1234</p>
                    </div>
                </div>

                <!-- Tourism -->
                <div class="bg-white rounded-lg border border-slate-200 p-6 flex items-start gap-4">
                    <div class="bg-[#e0f2f1] rounded-xl w-14 h-14 flex items-center justify-center shrink-0">
                        <span class="text-2xl text-[#0e4f5c] font-bold">i</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-teal-600 tracking-wider uppercase mb-1">TOURISM</p>
                        <h3 class="font-bold text-slate-800 text-base">Tourism Assistance Hotline</h3>
                        <p class="text-xs text-slate-400 mt-1">Provincial Capitol, Mati City</p>
                        <p class="text-lg font-bold text-slate-800 mt-2">(087) 388-TOUR</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#0e3a40] text-white mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div>
                    <h3 class="font-bold text-base mb-3">iTOUR</h3>
                    <p class="text-sm text-white/60 leading-relaxed">Integrated Tourism Information & Monitoring System of the Provincial Tourism Office of Davao Oriental.</p>
                </div>
                <div>
                    <h3 class="font-bold text-base mb-3">Contact</h3>
                    <div class="text-sm text-white/60 space-y-1">
                        <p>Provincial Capitol, Mati City</p>
                        <p>tourism@davaooriental.gov.ph</p>
                        <p>(087) 388-TOUR</p>
                    </div>
                </div>
                <div>
                    <h3 class="font-bold text-base mb-3">Quick Links</h3>
                    <div class="text-sm text-white/60 space-y-1">
                        <p><a href="#" class="hover:text-white transition">Personnel Portal</a></p>
                        <p><a href="#" class="hover:text-white transition">Establishment Portal</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
                <p class="text-xs text-white/40">&copy; 2026 Provincial Government of Davao Oriental. All rights reserved.</p>
            </div>
        </div>
    </footer>

</div>
@endsection
