@extends('layouts.app')

@section('title', 'iTOUR - Public Home')

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
                    <a href="/public" class="text-slate-800 font-semibold text-sm hover:text-[#0e4f5c] transition">Home</a>
                    <a href="/public" class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Destinations</a>
                    <a href="/public/establishments" class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Establishments</a>
                    <a href="/public/events" class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Events</a>
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

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-[#0a3842] via-[#0e5060] to-[#3a8a8e] py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="max-w-2xl">
                <h1 class="text-3xl sm:text-4xl lg:text-[2.6rem] font-bold text-white leading-tight mb-4">
                    Discover the eastern frontier of Mindanao
                </h1>
                <p class="text-white/80 text-base leading-relaxed mb-8">
                    Pristine beaches, world-class diving, towering waterfalls, and warm Mandayan culture await across Davao Oriental.
                </p>

                <!-- Search Bar -->
                <div class="flex items-center gap-3">
                    <input type="text" placeholder="Search destinations, establishments, or events..." class="flex-1 bg-white/10 border border-white/20 text-white placeholder-white/50 rounded-md px-4 py-2.5 text-sm focus:outline-none focus:border-white/40 backdrop-blur-sm">
                    <button class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white px-6 py-2.5 rounded-md font-medium text-sm transition border border-white/20">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- Destinations -->
            <div class="bg-white rounded-lg border border-slate-200 p-5">
                <p class="text-[10px] font-bold text-slate-500 tracking-wider uppercase mb-1">DESTINATIONS</p>
                <p class="text-3xl font-bold text-slate-800">42</p>
                <p class="text-xs text-slate-400 mt-1">across 11 municipalities</p>
            </div>
            <!-- Accredited Establishments -->
            <div class="bg-white rounded-lg border border-slate-200 p-5">
                <p class="text-[10px] font-bold text-slate-500 tracking-wider uppercase mb-1">ACCREDITED ESTABLISHMENTS</p>
                <p class="text-3xl font-bold text-slate-800">87</p>
                <p class="text-xs text-slate-400 mt-1">74 verified</p>
            </div>
            <!-- Tourist Arrivals -->
            <div class="bg-white rounded-lg border border-slate-200 p-5">
                <p class="text-[10px] font-bold text-slate-500 tracking-wider uppercase mb-1">TOURIST ARRIVALS (YTD)</p>
                <p class="text-3xl font-bold text-slate-800">12,847</p>
                <p class="text-xs text-green-600 mt-1 flex items-center gap-1">
                    <span>▲</span> 12%
                </p>
            </div>
            <!-- Satisfaction Rate -->
            <div class="bg-white rounded-lg border border-slate-200 p-5">
                <p class="text-[10px] font-bold text-slate-500 tracking-wider uppercase mb-1">SATISFACTION RATE</p>
                <p class="text-3xl font-bold text-slate-800">92%</p>
                <p class="text-xs text-slate-400 mt-1">from 1,920 reviews</p>
            </div>
        </div>
    </section>

    <!-- Featured Destinations Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        <div class="flex items-end justify-between mb-5">
            <div>
                <h2 class="text-xl font-bold text-[#0e4f5c]">Featured Destinations</h2>
                <p class="text-sm text-slate-400 mt-0.5">Top-rated places to visit this season</p>
            </div>
            <a href="#" class="border border-slate-300 text-slate-600 px-4 py-1.5 rounded-md text-xs font-medium hover:bg-slate-50 transition">View all</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <!-- Dahican Beach -->
            <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                <div class="relative h-44 bg-[#b3d4d8] flex items-center justify-center">
                    <span class="text-[#5a9aa0] text-sm font-medium">Dahican Beach</span>
                    <span class="absolute top-3 left-3 bg-[#0e4f5c] text-white text-[10px] font-bold px-2.5 py-1 rounded">BEACH</span>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-slate-800 text-base">Dahican Beach</h3>
                    <p class="text-xs text-slate-400 flex items-center gap-1 mt-1">
                        <span class="text-red-400">📍</span> Mati City
                    </p>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">A 7-kilometer stretch of white sand cove famous for skimboarding, surfing, and pawikan (sea turtle) sightings.</p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-sm text-slate-700 flex items-center gap-1">
                            <span class="text-amber-400">★</span> 4.8
                        </span>
                        <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-1.5 rounded-md transition">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Sleeping Dinosaur -->
            <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                <div class="relative h-44 bg-[#b3d4d8] flex items-center justify-center">
                    <span class="text-[#5a9aa0] text-sm font-medium">Sleeping Dinosaur</span>
                    <span class="absolute top-3 left-3 bg-[#2e7d32] text-white text-[10px] font-bold px-2.5 py-1 rounded">LANDMARK</span>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-slate-800 text-base">Sleeping Dinosaur</h3>
                    <p class="text-xs text-slate-400 flex items-center gap-1 mt-1">
                        <span class="text-red-400">📍</span> Mati City
                    </p>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">Iconic rock formation along Pujada Bay that resembles a sleeping dinosaur — a must-see Mati landmark.</p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-sm text-slate-700 flex items-center gap-1">
                            <span class="text-amber-400">★</span> 4.6
                        </span>
                        <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-1.5 rounded-md transition">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Pujada Bay -->
            <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                <div class="relative h-44 bg-[#b3d4d8] flex items-center justify-center">
                    <span class="text-[#5a9aa0] text-sm font-medium">Pujada Bay</span>
                    <span class="absolute top-3 left-3 bg-[#455a64] text-white text-[10px] font-bold px-2.5 py-1 rounded">BAY</span>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-slate-800 text-base">Pujada Bay</h3>
                    <p class="text-xs text-slate-400 flex items-center gap-1 mt-1">
                        <span class="text-red-400">📍</span> Mati City
                    </p>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">One of the world's most beautiful bays, recognized for its calm, emerald waters and rich marine biodiversity.</p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-sm text-slate-700 flex items-center gap-1">
                            <span class="text-amber-400">★</span> 4.7
                        </span>
                        <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-1.5 rounded-md transition">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Establishments Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        <div class="flex items-end justify-between mb-5">
            <div>
                <h2 class="text-xl font-bold text-[#0e4f5c]">Featured Establishments</h2>
                <p class="text-sm text-slate-400 mt-0.5">Accredited by the Provincial Tourism Office</p>
            </div>
            <a href="#" class="border border-slate-300 text-slate-600 px-4 py-1.5 rounded-md text-xs font-medium hover:bg-slate-50 transition">View all</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <!-- Blue Bless Resort -->
            <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                <div class="relative h-44 bg-[#b3d4d8] flex items-center justify-center">
                    <span class="text-[#5a9aa0] text-sm font-medium">Blue Bless Resort</span>
                    <span class="absolute top-3 left-3 bg-[#0e4f5c] text-white text-[10px] font-bold px-2.5 py-1 rounded">RESORT</span>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-slate-800 text-base">Blue Bless Resort</h3>
                    <p class="text-xs text-slate-400 flex items-center gap-1 mt-1">
                        <span class="text-red-400">📍</span> Mati City
                    </p>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">Beachfront resort along Dahican with private cottages, pool, and surf school.</p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-sm text-slate-700 flex items-center gap-1">
                            <span class="text-amber-400">★</span> 4.7
                        </span>
                        <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-1.5 rounded-md transition">Register Visit</a>
                    </div>
                </div>
            </div>

            <!-- Botona Beach Resort -->
            <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                <div class="relative h-44 bg-[#b3d4d8] flex items-center justify-center">
                    <span class="text-[#5a9aa0] text-sm font-medium">Botona Beach Resort</span>
                    <span class="absolute top-3 left-3 bg-[#0e4f5c] text-white text-[10px] font-bold px-2.5 py-1 rounded">RESORT</span>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-slate-800 text-base">Botona Beach Resort</h3>
                    <p class="text-xs text-slate-400 flex items-center gap-1 mt-1">
                        <span class="text-red-400">📍</span> Mati City
                    </p>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">Family-friendly resort with cabanas, restaurant, and event hall.</p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-sm text-slate-700 flex items-center gap-1">
                            <span class="text-amber-400">★</span> 4.5
                        </span>
                        <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-1.5 rounded-md transition">Register Visit</a>
                    </div>
                </div>
            </div>

            <!-- Mati Marina Hotel -->
            <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                <div class="relative h-44 bg-[#b3d4d8] flex items-center justify-center">
                    <span class="text-[#5a9aa0] text-sm font-medium">Mati Marina Hotel</span>
                    <span class="absolute top-3 left-3 bg-[#455a64] text-white text-[10px] font-bold px-2.5 py-1 rounded">HOTEL</span>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-slate-800 text-base">Mati Marina Hotel</h3>
                    <p class="text-xs text-slate-400 flex items-center gap-1 mt-1">
                        <span class="text-red-400">📍</span> Mati City
                    </p>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">Modern hotel in the city center, walking distance to Subangan Museum.</p>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-sm text-slate-700 flex items-center gap-1">
                            <span class="text-amber-400">★</span> 4.6
                        </span>
                        <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-1.5 rounded-md transition">Register Visit</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Events & Announcements Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Upcoming Events -->
            <div>
                <h2 class="text-xl font-bold text-slate-800 mb-5">Upcoming Events</h2>
                <div class="space-y-4">
                    <!-- Event 1 -->
                    <div class="bg-white rounded-lg border border-slate-200 p-4 flex items-start gap-4">
                        <div class="bg-[#e8f4f0] rounded-lg w-16 h-16 flex flex-col items-center justify-center shrink-0">
                            <span class="text-2xl font-bold text-[#0e4f5c] leading-none">29</span>
                            <span class="text-[10px] font-bold text-[#0e4f5c] uppercase">OCT</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 text-sm">Sambuokan Festival</h3>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Mati City · Annual unity festival celebrating Mati's tribes and cultural heritage with street dancing, parades, and trade fairs.</p>
                        </div>
                    </div>
                    <!-- Event 2 -->
                    <div class="bg-white rounded-lg border border-slate-200 p-4 flex items-start gap-4">
                        <div class="bg-[#e8f4f0] rounded-lg w-16 h-16 flex flex-col items-center justify-center shrink-0">
                            <span class="text-2xl font-bold text-[#0e4f5c] leading-none">15</span>
                            <span class="text-[10px] font-bold text-[#0e4f5c] uppercase">JUL</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 text-sm">Pujada Bay Regatta</h3>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Mati City · Sailing competition featuring local fishermen and international participants across Pujada Bay.</p>
                        </div>
                    </div>
                    <!-- Event 3 -->
                    <div class="bg-white rounded-lg border border-slate-200 p-4 flex items-start gap-4">
                        <div class="bg-[#e8f4f0] rounded-lg w-16 h-16 flex flex-col items-center justify-center shrink-0">
                            <span class="text-2xl font-bold text-[#0e4f5c] leading-none">20</span>
                            <span class="text-[10px] font-bold text-[#0e4f5c] uppercase">AUG</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 text-sm">Aliwagwag Eco-Adventure Run</h3>
                            <p class="text-xs text-slate-500 mt-1 leading-relaxed">Cateel · Trail run through the Aliwagwag Falls Protected Landscape with 5K, 10K, and 21K categories.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Announcements -->
            <div>
                <h2 class="text-xl font-bold text-slate-800 mb-5">Announcements</h2>
                <div class="space-y-4">
                    <!-- Announcement 1 -->
                    <div class="bg-white rounded-lg border border-slate-200 p-4">
                        <h3 class="font-bold text-slate-800 text-sm">Sambuokan Festival 2026 schedule released</h3>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">2026-06-20 · The Provincial Tourism Office has finalized the schedule for the 22nd Sambuokan Festival.</p>
                    </div>
                    <!-- Announcement 2 -->
                    <div class="bg-white rounded-lg border border-slate-200 p-4">
                        <h3 class="font-bold text-slate-800 text-sm">New accreditation cycle now open</h3>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">2026-06-18 · Establishments may now apply for the 2026-2027 accreditation cycle until August 31.</p>
                    </div>
                    <!-- Announcement 3 -->
                    <div class="bg-white rounded-lg border border-slate-200 p-4">
                        <h3 class="font-bold text-slate-800 text-sm">Pawikan nesting season advisory</h3>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">2026-06-10 · Tourists visiting Dahican are reminded to follow the pawikan protection guidelines.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Services Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-xl font-bold text-slate-800">Emergency Services</h2>
            <a href="#" class="border border-slate-300 text-slate-600 px-4 py-1.5 rounded-md text-xs font-medium hover:bg-slate-50 transition">All contacts</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Police -->
            <div class="bg-white rounded-lg border border-slate-200 p-4">
                <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase mb-1">POLICE</p>
                <p class="font-bold text-slate-800 text-sm">Mati City Police Station</p>
                <p class="text-xs text-slate-500 mt-1">(087) 388-3030</p>
            </div>
            <!-- Hospital -->
            <div class="bg-white rounded-lg border border-slate-200 p-4">
                <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase mb-1">HOSPITAL</p>
                <p class="font-bold text-slate-800 text-sm">Davao Oriental Provincial Hospital</p>
                <p class="text-xs text-slate-500 mt-1">(087) 388-3621</p>
            </div>
            <!-- Fire Station -->
            <div class="bg-white rounded-lg border border-slate-200 p-4">
                <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase mb-1">FIRE STATION</p>
                <p class="font-bold text-slate-800 text-sm">Mati City Fire Station</p>
                <p class="text-xs text-slate-500 mt-1">160</p>
            </div>
            <!-- Coast Guard -->
            <div class="bg-white rounded-lg border border-slate-200 p-4">
                <p class="text-[10px] font-bold text-slate-400 tracking-wider uppercase mb-1">COAST GUARD</p>
                <p class="font-bold text-slate-800 text-sm">Philippine Coast Guard - Mati</p>
                <p class="text-xs text-slate-500 mt-1">(087) 811-1234</p>
            </div>
        </div>
    </section>

    <!-- Interactive Map Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-14">
        <h2 class="text-xl font-bold text-slate-800 mb-5">Interactive Map</h2>
        <div class="bg-[#b3d4d8] rounded-xl h-80 flex flex-col items-center justify-center">
            <div class="text-[#5a9aa0] text-5xl mb-3">🌍</div>
            <p class="text-[#3a7a80] font-semibold text-sm">Mapbox integration placeholder</p>
            <p class="text-[#5a9aa0] text-xs mt-1">Interactive map of Davao Oriental destinations and establishments</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#0e3a40] text-white mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- iTOUR Info -->
                <div>
                    <h3 class="font-bold text-base mb-3">iTOUR</h3>
                    <p class="text-sm text-white/60 leading-relaxed">Integrated Tourism Information & Monitoring System of the Provincial Tourism Office of Davao Oriental.</p>
                </div>
                <!-- Contact -->
                <div>
                    <h3 class="font-bold text-base mb-3">Contact</h3>
                    <div class="text-sm text-white/60 space-y-1">
                        <p>Provincial Capitol, Mati City</p>
                        <p>tourism@davaooriental.gov.ph</p>
                        <p>(087) 388-TOUR</p>
                    </div>
                </div>
                <!-- Quick Links -->
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
