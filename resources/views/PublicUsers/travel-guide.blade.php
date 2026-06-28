@extends('layouts.app')

@section('title', 'Travel Guide - iTOUR')

@section('content')
    <div class="min-h-screen bg-[#f0f5f7] flex flex-col font-sans">

        <!-- Navigation Bar -->
        <header class="bg-white border-b border-slate-100 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <div class="flex items-center gap-2">
                        <div
                            class="bg-[#0e4f5c] text-white rounded-md w-8 h-8 flex items-center justify-center font-bold text-xs tracking-tight shrink-0">
                            iT
                        </div>
                        <div class="flex flex-col">
                            <span class="font-extrabold text-base text-[#0e4f5c] tracking-tight leading-none">iTOUR</span>
                            <span
                                class="text-[8px] font-semibold text-[#706f6c] tracking-[0.15em] leading-none mt-0.5">DAVAO
                                ORIENTAL</span>
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <nav class="hidden lg:flex items-center gap-7">
                        <a href="/public"
                            class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Home</a>
                        <a href="/public"
                            class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Destinations</a>
                        <a href="/public/establishments"
                            class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Establishments</a>
                        <a href="/public/events"
                            class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Events</a>
                        <a href="/public/travel-guide"
                            class="text-slate-800 font-semibold text-sm hover:text-[#0e4f5c] transition">Travel Guide</a>
                        <a href="/public/emergency"
                            class="text-slate-500 font-medium text-sm hover:text-[#0e4f5c] transition">Emergency</a>
                    </nav>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-3">
                        <a href="#"
                            class="border border-slate-300 text-slate-700 px-4 py-1.5 rounded-md font-medium text-sm hover:bg-slate-50 transition">My
                            Profile</a>
                        <a href="#"
                            class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white px-4 py-1.5 rounded-md font-medium text-sm transition">Switch
                            Portal</a>
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
                    <h1 class="text-2xl font-bold text-[#0e4f5c]">Travel Guide</h1>
                    <p class="text-sm text-slate-400 mt-1">Everything you need to know before visiting Davao Oriental.</p>
                </div>

                <!-- Info Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-10">
                    <!-- Transportation -->
                    <div class="bg-white rounded-lg border border-slate-200 p-6">
                        <h3 class="font-bold text-slate-800 text-base flex items-center gap-2 mb-4">
                            <i class="fas fa-bus-simple text-[#0e4f5c]"></i> Transportation
                        </h3>
                        <ul class="space-y-2.5 text-sm text-slate-500">
                            <li class="flex items-start gap-2">
                                <span class="text-slate-400 mt-0.5">•</span>
                                <span>Davao Airport → Mati: bus, van, or rental car (3h)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-slate-400 mt-0.5">•</span>
                                <span>Local: tricycles, jeepneys, motorbike rentals</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-slate-400 mt-0.5">•</span>
                                <span>Boats for island hopping at Pujada Bay</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Travel Tips -->
                    <div class="bg-white rounded-lg border border-slate-200 p-6">
                        <h3 class="font-bold text-slate-800 text-base flex items-center gap-2 mb-4">
                            <i class="fas fa-suitcase-rolling text-[#0e4f5c]"></i> Travel Tips
                        </h3>
                        <ul class="space-y-2.5 text-sm text-slate-500">
                            <li class="flex items-start gap-2">
                                <span class="text-slate-400 mt-0.5">•</span>
                                <span>Bring reef-safe sunscreen for beaches</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-slate-400 mt-0.5">•</span>
                                <span>Respect pawikan (sea turtle) protected zones</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-slate-400 mt-0.5">•</span>
                                <span>Cash for smaller establishments</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-slate-400 mt-0.5">•</span>
                                <span>Light rain jacket for waterfall hikes</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Where to Stay -->
                    <div class="bg-white rounded-lg border border-slate-200 p-6">
                        <h3 class="font-bold text-slate-800 text-base flex items-center gap-2 mb-4">
                            <i class="fas fa-hotel text-[#0e4f5c]"></i> Where to Stay
                        </h3>
                        <ul class="space-y-2.5 text-sm text-slate-500">
                            <li class="flex items-start gap-2">
                                <span class="text-slate-400 mt-0.5">•</span>
                                <span>Mati City — most options, near beaches</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-slate-400 mt-0.5">•</span>
                                <span>Cateel — closest to Aliwagwag Falls</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-slate-400 mt-0.5">•</span>
                                <span>Gov. Generoso — Cape San Agustin lighthouse</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Frequently Asked Questions -->
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-slate-800 mb-5">Frequently Asked Questions</h2>
                    <div class="space-y-3">
                        <!-- FAQ 1 -->
                        <details class="bg-white rounded-lg border border-slate-200 group">
                            <summary
                                class="px-5 py-4 cursor-pointer font-semibold text-sm text-slate-700 flex items-center gap-3 list-none">
                                <span class="text-slate-400 group-open:rotate-90 transition-transform">▶</span>
                                What is the best time to visit Davao Oriental?
                            </summary>
                            <div class="px-5 pb-4 text-sm text-slate-500 leading-relaxed ml-7">
                                The best time to visit is during the dry season from March to May. However, Davao Oriental
                                is generally pleasant year-round with warm tropical weather.
                            </div>
                        </details>
                        <!-- FAQ 2 -->
                        <details class="bg-white rounded-lg border border-slate-200 group">
                            <summary
                                class="px-5 py-4 cursor-pointer font-semibold text-sm text-slate-700 flex items-center gap-3 list-none">
                                <span class="text-slate-400 group-open:rotate-90 transition-transform">▶</span>
                                How do I get to Mati City?
                            </summary>
                            <div class="px-5 pb-4 text-sm text-slate-500 leading-relaxed ml-7">
                                You can take a bus or van from Davao City to Mati City, which takes approximately 3 hours.
                                Rental cars are also available at the Davao Airport.
                            </div>
                        </details>
                        <!-- FAQ 3 -->
                        <details class="bg-white rounded-lg border border-slate-200 group">
                            <summary
                                class="px-5 py-4 cursor-pointer font-semibold text-sm text-slate-700 flex items-center gap-3 list-none">
                                <span class="text-slate-400 group-open:rotate-90 transition-transform">▶</span>
                                Is registration required at every establishment?
                            </summary>
                            <div class="px-5 pb-4 text-sm text-slate-500 leading-relaxed ml-7">
                                Yes, accredited establishments require tourist registration through the iTOUR system for
                                monitoring and safety purposes.
                            </div>
                        </details>
                        <!-- FAQ 4 -->
                        <details class="bg-white rounded-lg border border-slate-200 group">
                            <summary
                                class="px-5 py-4 cursor-pointer font-semibold text-sm text-slate-700 flex items-center gap-3 list-none">
                                <span class="text-slate-400 group-open:rotate-90 transition-transform">▶</span>
                                Are there ATMs and card payments?
                            </summary>
                            <div class="px-5 pb-4 text-sm text-slate-500 leading-relaxed ml-7">
                                ATMs are available in Mati City center. Larger establishments accept card payments, but it's
                                advisable to carry cash for smaller shops and rural areas.
                            </div>
                        </details>
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
                        <p class="text-sm text-white/60 leading-relaxed">Integrated Tourism Information & Monitoring System
                            of the Provincial Tourism Office of Davao Oriental.</p>
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
                    <p class="text-xs text-white/40">&copy; 2026 Provincial Government of Davao Oriental. All rights
                        reserved.</p>
                </div>
            </div>
        </footer>

    </div>
@endsection