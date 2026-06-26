@extends('layouts.app')

@section('title', 'Accredited Establishments - iTOUR')

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
                    <a href="/public/establishments" class="text-slate-800 font-semibold text-sm hover:text-[#0e4f5c] transition">Establishments</a>
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

    <!-- Page Header -->
    <section class="bg-gradient-to-r from-[#0a3842] via-[#0e5060] to-[#3a8a8e] py-1.5"></section>

    <main class="flex-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Title -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-[#0e4f5c]">Accredited Establishments</h1>
                <p class="text-sm text-slate-400 mt-1">Browse verified tourism establishments across the province.</p>
            </div>
            <hr class="border-slate-200 mb-6">

            <!-- Search & Filter -->
            <div class="flex flex-wrap items-center gap-4 mb-6">
                <input type="text" placeholder="Search establishments..." class="border border-slate-300 rounded-md px-4 py-2 text-sm w-72 focus:outline-none focus:border-[#0e4f5c] transition">
                <select class="border border-slate-300 rounded-md px-4 py-2 text-sm focus:outline-none focus:border-[#0e4f5c] transition">
                    <option>All</option>
                    <option>Resort</option>
                    <option>Hotel</option>
                    <option>Lodge</option>
                    <option>Tour Operator</option>
                    <option>Restaurant</option>
                </select>
                <span class="ml-auto text-xs text-slate-400">6 establishments</span>
            </div>

            <!-- Establishments Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <!-- Blue Bless Resort -->
                <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                    <div class="relative h-40 bg-[#b3d4d8] flex items-center justify-center">
                        <span class="text-[#5a9aa0] text-sm font-medium">Blue Bless Resort</span>
                        <span class="absolute top-3 left-3 bg-[#0e4f5c] text-white text-[10px] font-bold px-2.5 py-1 rounded">RESORT</span>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-bold text-slate-800 text-sm">Blue Bless Resort</h3>
                            <span class="text-[10px] font-bold text-teal-600 border border-teal-200 bg-teal-50 px-2 py-0.5 rounded">VERIFIED</span>
                        </div>
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
                    <div class="relative h-40 bg-[#b3d4d8] flex items-center justify-center">
                        <span class="text-[#5a9aa0] text-sm font-medium">Botona Beach Resort</span>
                        <span class="absolute top-3 left-3 bg-[#0e4f5c] text-white text-[10px] font-bold px-2.5 py-1 rounded">RESORT</span>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-bold text-slate-800 text-sm">Botona Beach Resort</h3>
                            <span class="text-[10px] font-bold text-teal-600 border border-teal-200 bg-teal-50 px-2 py-0.5 rounded">VERIFIED</span>
                        </div>
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
                    <div class="relative h-40 bg-[#b3d4d8] flex items-center justify-center">
                        <span class="text-[#5a9aa0] text-sm font-medium">Mati Marina Hotel</span>
                        <span class="absolute top-3 left-3 bg-[#455a64] text-white text-[10px] font-bold px-2.5 py-1 rounded">HOTEL</span>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-bold text-slate-800 text-sm">Mati Marina Hotel</h3>
                            <span class="text-[10px] font-bold text-teal-600 border border-teal-200 bg-teal-50 px-2 py-0.5 rounded">VERIFIED</span>
                        </div>
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

                <!-- Aliwagwag Eco Lodge -->
                <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                    <div class="relative h-40 bg-[#b3d4d8] flex items-center justify-center">
                        <span class="text-[#5a9aa0] text-sm font-medium">Aliwagwag Eco Lodge</span>
                        <span class="absolute top-3 left-3 bg-[#2e7d32] text-white text-[10px] font-bold px-2.5 py-1 rounded">LODGE</span>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-bold text-slate-800 text-sm">Aliwagwag Eco Lodge</h3>
                            <span class="text-[10px] font-bold text-teal-600 border border-teal-200 bg-teal-50 px-2 py-0.5 rounded">VERIFIED</span>
                        </div>
                        <p class="text-xs text-slate-400 flex items-center gap-1 mt-1">
                            <span class="text-red-400">📍</span> Cateel
                        </p>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">Eco-friendly lodge near Aliwagwag Falls with nature trails.</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm text-slate-700 flex items-center gap-1">
                                <span class="text-amber-400">★</span> 4.8
                            </span>
                            <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-1.5 rounded-md transition">Register Visit</a>
                        </div>
                    </div>
                </div>

                <!-- Pujada Bay Diving Center -->
                <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                    <div class="relative h-40 bg-[#b3d4d8] flex items-center justify-center">
                        <span class="text-[#5a9aa0] text-sm font-medium">Pujada Bay Diving Center</span>
                        <span class="absolute top-3 left-3 bg-[#6a1b9a] text-white text-[10px] font-bold px-2.5 py-1 rounded">TOUR OPERATOR</span>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-bold text-slate-800 text-sm">Pujada Bay Diving Center</h3>
                            <span class="text-[10px] font-bold text-teal-600 border border-teal-200 bg-teal-50 px-2 py-0.5 rounded">VERIFIED</span>
                        </div>
                        <p class="text-xs text-slate-400 flex items-center gap-1 mt-1">
                            <span class="text-red-400">📍</span> Mati City
                        </p>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">PADI-certified diving and island-hopping tours around Pujada Bay.</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm text-slate-700 flex items-center gap-1">
                                <span class="text-amber-400">★</span> 4.9
                            </span>
                            <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-1.5 rounded-md transition">Register Visit</a>
                        </div>
                    </div>
                </div>

                <!-- Cateel Heritage Café -->
                <div class="bg-white rounded-lg border border-slate-200 overflow-hidden">
                    <div class="relative h-40 bg-[#b3d4d8] flex items-center justify-center">
                        <span class="text-[#5a9aa0] text-sm font-medium">Cateel Heritage Café</span>
                        <span class="absolute top-3 left-3 bg-[#e65100] text-white text-[10px] font-bold px-2.5 py-1 rounded">RESTAURANT</span>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-bold text-slate-800 text-sm">Cateel Heritage Café</h3>
                            <span class="text-[10px] font-bold text-teal-600 border border-teal-200 bg-teal-50 px-2 py-0.5 rounded">VERIFIED</span>
                        </div>
                        <p class="text-xs text-slate-400 flex items-center gap-1 mt-1">
                            <span class="text-red-400">📍</span> Cateel
                        </p>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">Local cuisine and specialty coffee in restored heritage house.</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="text-sm text-slate-700 flex items-center gap-1">
                                <span class="text-amber-400">★</span> 4.4
                            </span>
                            <a href="#" class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white text-xs font-medium px-4 py-1.5 rounded-md transition">Register Visit</a>
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
