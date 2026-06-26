@extends('layouts.app')

@section('title', 'Events & Festivals - iTOUR')

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
                    <a href="/public/events" class="text-slate-800 font-semibold text-sm hover:text-[#0e4f5c] transition">Events</a>
                    <a href="/public/travel-guide" class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Travel Guide</a>
                    <a href="/public/emergency" class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Emergency</a>
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
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-[#0e4f5c]">Events & Festivals</h1>
                <p class="text-sm text-slate-400 mt-1">Don't miss the celebrations that make Davao Oriental unforgettable.</p>
            </div>

            <!-- Events Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Sambuokan Festival -->
                <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-[#0a3842] via-[#0e5060] to-[#3a8a8e] p-6 min-h-[120px] flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Sambuokan Festival</h3>
                        <p class="text-sm text-white/70 mt-1">Mati City · Thursday, October 29, 2026</p>
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-slate-500 leading-relaxed">Annual unity festival celebrating Mati's tribes and cultural heritage with street dancing, parades, and trade fairs.</p>
                        <div class="flex items-center gap-3 mt-4">
                            <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-2 rounded-md transition">View Details</a>
                            <a href="#" class="border border-slate-300 text-slate-600 text-xs font-medium px-4 py-2 rounded-md hover:bg-slate-50 transition">Add to Calendar</a>
                        </div>
                    </div>
                </div>

                <!-- Pujada Bay Regatta -->
                <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-[#0a3842] via-[#0e5060] to-[#3a8a8e] p-6 min-h-[120px] flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Pujada Bay Regatta</h3>
                        <p class="text-sm text-white/70 mt-1">Mati City · Wednesday, July 15, 2026</p>
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-slate-500 leading-relaxed">Sailing competition featuring local fishermen and international participants across Pujada Bay.</p>
                        <div class="flex items-center gap-3 mt-4">
                            <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-2 rounded-md transition">View Details</a>
                            <a href="#" class="border border-slate-300 text-slate-600 text-xs font-medium px-4 py-2 rounded-md hover:bg-slate-50 transition">Add to Calendar</a>
                        </div>
                    </div>
                </div>

                <!-- Aliwagwag Eco-Adventure Run -->
                <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-[#0a3842] via-[#0e5060] to-[#3a8a8e] p-6 min-h-[120px] flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Aliwagwag Eco-Adventure Run</h3>
                        <p class="text-sm text-white/70 mt-1">Cateel · Thursday, August 20, 2026</p>
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-slate-500 leading-relaxed">Trail run through the Aliwagwag Falls Protected Landscape with 5K, 10K, and 21K categories.</p>
                        <div class="flex items-center gap-3 mt-4">
                            <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-2 rounded-md transition">View Details</a>
                            <a href="#" class="border border-slate-300 text-slate-600 text-xs font-medium px-4 py-2 rounded-md hover:bg-slate-50 transition">Add to Calendar</a>
                        </div>
                    </div>
                </div>

                <!-- Pawikan Conservation Week -->
                <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-[#0a3842] via-[#0e5060] to-[#3a8a8e] p-6 min-h-[120px] flex flex-col justify-end">
                        <h3 class="text-xl font-bold text-white">Pawikan Conservation Week</h3>
                        <p class="text-sm text-white/70 mt-1">Mati City · Saturday, September 5, 2026</p>
                    </div>
                    <div class="p-5">
                        <p class="text-sm text-slate-500 leading-relaxed">Week-long celebration of marine turtle conservation in Dahican with educational tours and hatchling release.</p>
                        <div class="flex items-center gap-3 mt-4">
                            <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-2 rounded-md transition">View Details</a>
                            <a href="#" class="border border-slate-300 text-slate-600 text-xs font-medium px-4 py-2 rounded-md hover:bg-slate-50 transition">Add to Calendar</a>
                        </div>
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
