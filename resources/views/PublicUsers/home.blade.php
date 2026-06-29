@extends('layouts.app')

@section('title', 'iTOUR - Davao Oriental')

@section('content')
<div class="min-h-screen bg-[#f0f5f7] text-slate-700 font-sans">
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-16 flex items-center justify-between gap-4">
                <a href="#home" class="flex items-center gap-2 shrink-0 js-scroll-link" data-scroll-target="home">
                    <div class="w-8 h-8 rounded-md bg-[#0e4f5c] text-white flex items-center justify-center font-bold text-xs tracking-tight">iT</div>
                    <div class="flex flex-col leading-none">
                        <span class="font-extrabold text-base text-[#0e4f5c] tracking-tight">iTOUR</span>
                        <span class="text-[8px] font-semibold text-[#706f6c] tracking-[0.15em] mt-0.5">DAVAO ORIENTAL</span>
                    </div>
                </a>
                <nav class="hidden lg:flex items-center gap-7">
                    <a href="#home" class="js-scroll-link text-sm font-medium text-[#0e4f5c] transition" data-scroll-target="home">Home</a>
                    <a href="#explore" class="js-scroll-link text-sm font-medium text-slate-500 hover:text-[#0e4f5c] transition" data-scroll-target="explore">Explore</a>
                    <a href="#plan" class="js-scroll-link text-sm font-medium text-slate-500 hover:text-[#0e4f5c] transition" data-scroll-target="plan">Plan Your Trip</a>
                    <a href="#reviews" class="js-scroll-link text-sm font-medium text-slate-500 hover:text-[#0e4f5c] transition" data-scroll-target="reviews">Reviews</a>
                    <a href="#about" class="js-scroll-link text-sm font-medium text-slate-500 hover:text-[#0e4f5c] transition" data-scroll-target="about">About</a>
                </nav>

                {{-- Profile Dropdown --}}
                <div class="relative" id="profileDropdownWrapper">
                    <button type="button" id="profileDropdownBtn"
                        class="flex items-center gap-2 px-3 py-1.5 rounded-full border border-slate-200 bg-white hover:bg-slate-50 transition-all duration-150 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#0e4f5c]/30"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="w-7 h-7 rounded-full bg-[#0e4f5c] text-white flex items-center justify-center shrink-0">
                            <i class="fas fa-user text-[11px]"></i>
                        </span>
                        <span class="hidden sm:inline text-sm font-semibold text-slate-700 max-w-[110px] truncate">{{ Auth::user()->name ?? 'Profile' }}</span>
                        <i class="fas fa-chevron-down text-[10px] text-slate-400" id="profileChevron"
                           style="transition: transform 0.2s ease;"></i>
                    </button>

                    {{-- Dropdown Menu --}}
                    <div id="profileDropdownMenu"
                        class="absolute right-0 top-full mt-2 w-56 bg-white border border-slate-200 rounded-2xl shadow-2xl z-[999] overflow-hidden"
                        role="menu"
                        style="display:none; opacity:0; transform: translateY(-6px); transition: opacity 0.18s ease, transform 0.18s ease;">

                        {{-- Avatar + user info --}}
                        <div class="px-4 pt-4 pb-3 border-b border-slate-100 bg-gradient-to-br from-[#f0f9fa] to-white">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-[#0e4f5c] text-white flex items-center justify-center shrink-0">
                                    <i class="fas fa-user text-sm"></i>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name ?? 'Guest' }}</p>
                                    <p class="text-[11px] text-slate-400 truncate">{{ Auth::user()->email ?? '' }}</p>
                                </div>
                            </div>
                            <span class="mt-2 inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-teal-50 text-teal-700 text-[10px] font-bold tracking-wide uppercase">
                                <i class="fas fa-circle-check text-[9px]"></i> Public Tourist
                            </span>
                        </div>

                        {{-- Menu items --}}
                        <div class="p-2 space-y-0.5">
                            {{-- Logout --}}
                            <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                                @csrf
                                <button type="submit" id="logoutBtn"
                                    class="w-full flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-sm font-semibold text-red-600 hover:bg-red-50 active:bg-red-100 transition-colors duration-100"
                                    role="menuitem">
                                    <i class="fas fa-arrow-right-from-bracket w-4 text-center"></i>
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <button type="button" id="navToggle" class="lg:hidden inline-flex items-center justify-center w-10 h-10 rounded-md border border-slate-200 text-slate-600"><i class="fas fa-bars" id="navToggleIcon"></i></button>
            </div>
        </div>
        <div id="mobileNav" class="lg:hidden hidden border-t border-slate-100 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 grid grid-cols-1 gap-1">
                <a href="#home" class="js-scroll-link px-3 py-2 rounded-md text-sm font-medium text-slate-600 hover:bg-slate-50" data-scroll-target="home">Home</a>
                <a href="#explore" class="js-scroll-link px-3 py-2 rounded-md text-sm font-medium text-slate-600 hover:bg-slate-50" data-scroll-target="explore">Explore</a>
                <a href="#plan" class="js-scroll-link px-3 py-2 rounded-md text-sm font-medium text-slate-600 hover:bg-slate-50" data-scroll-target="plan">Plan Your Trip</a>
                <a href="#reviews" class="js-scroll-link px-3 py-2 rounded-md text-sm font-medium text-slate-600 hover:bg-slate-50" data-scroll-target="reviews">Reviews</a>
                <a href="#about" class="js-scroll-link px-3 py-2 rounded-md text-sm font-medium text-slate-600 hover:bg-slate-50" data-scroll-target="about">About</a>
                <div class="mt-1 pt-2 border-t border-slate-100">
                    <div class="px-3 py-2">
                        <p class="text-xs font-semibold text-slate-400">{{ Auth::user()->name ?? 'Guest' }}</p>
                        <p class="text-[11px] text-slate-400">{{ Auth::user()->email ?? '' }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2.5 rounded-xl text-sm font-semibold text-red-600 hover:bg-red-50 transition">
                            <i class="fas fa-arrow-right-from-bracket"></i>
                            Sign out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="h-1.5 bg-gradient-to-r from-[#0a3842] via-[#0e5060] to-[#3a8a8e]"></div>

    <main>
        <section id="home" class="relative overflow-hidden scroll-mt-24">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#06242b]/95 via-[#0e4f5c]/85 to-[#0e4f5c]/50"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
                <div class="max-w-3xl">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border border-white/20 bg-white/10 text-[11px] font-bold tracking-[0.14em] text-white uppercase mb-5 backdrop-blur">
                        <span class="w-1.5 h-1.5 rounded-full bg-teal-300"></span>
                        Prototype tourism portal
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-[1.05] max-w-2xl">Discover Davao Oriental</h1>
                    <p class="mt-5 text-base sm:text-lg text-slate-100/85 leading-7 max-w-2xl">Explore destinations, accredited services, visitor reviews, and trip-planning ideas in one prototype interface built for quick public browsing.</p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <button type="button" class="js-scroll-link inline-flex items-center gap-2 px-5 py-3 rounded-md bg-white text-[#0e4f5c] font-semibold text-sm shadow-sm hover:bg-slate-50 transition" data-scroll-target="explore"><i class="fas fa-compass"></i> Explore tourism directory</button>
                        <button type="button" class="js-scroll-link inline-flex items-center gap-2 px-5 py-3 rounded-md border border-white/25 bg-white/10 text-white font-semibold text-sm backdrop-blur hover:bg-white/15 transition" data-scroll-target="plan"><i class="fas fa-route"></i> Plan your trip</button>
                    </div>
                </div>
            </div>
        </section>

        {{-- ── Nearby for You (Home) ───────────────────────────────────── --}}
        <section id="nearby-home" class="pt-10 pb-2 scroll-mt-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{-- Section header --}}
                <div class="flex items-end justify-between gap-4 flex-wrap mb-5">
                    <div>
                        <div class="inline-flex items-center gap-2 text-[11px] font-bold uppercase tracking-[0.16em] text-teal-600 mb-1">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-teal-500"></span>
                            </span>
                            Location-aware
                        </div>
                        <h2 class="text-2xl font-extrabold text-slate-900">Nearby for You</h2>
                        <p class="mt-1 text-sm text-slate-500">Simulated proximity — based on Mati City center</p>
                    </div>
                    <button type="button" id="seeAllNearbyBtn"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-[#0e4f5c] text-white text-sm font-semibold hover:bg-[#0a3f48] transition shadow-sm">
                        <i class="fas fa-location-dot"></i> See all in Explore
                    </button>
                </div>

                {{-- Horizontal scroll strip --}}
                <div class="flex gap-4 overflow-x-auto pb-4 snap-x snap-mandatory -mx-1 px-1" id="nearbyHomeStrip">
                    {{-- Cards injected by JS --}}
                </div>
            </div>
        </section>

        {{-- ── Interactive Map — Davao Oriental ───────────────────────────── --}}
        <section id="nearby-map" class="pt-6 pb-2 scroll-mt-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{-- Map card container --}}
                <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">
                    {{-- Map toolbar --}}
                    <div class="flex items-center justify-between gap-3 px-5 sm:px-6 py-4 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-teal-500 to-[#0e4f5c] flex items-center justify-center shadow-sm">
                                <i class="fas fa-map-location-dot text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-800">Explore the Map</h3>
                                <p class="text-[11px] text-slate-400 mt-0.5">Tourism spots across Davao Oriental · Click markers for details</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button type="button" id="mapFitAllBtn"
                                class="hidden sm:inline-flex items-center gap-1.5 text-xs font-semibold text-slate-600 hover:text-[#0e4f5c] transition px-3 py-2 rounded-xl hover:bg-slate-50 border border-slate-200">
                                <i class="fas fa-expand"></i> Fit all
                            </button>
                            <button type="button" id="mapToggleStyleBtn"
                                class="hidden sm:inline-flex items-center gap-1.5 text-xs font-semibold text-slate-600 hover:text-[#0e4f5c] transition px-3 py-2 rounded-xl hover:bg-slate-50 border border-slate-200">
                                <i class="fas fa-layer-group"></i> Satellite
                            </button>
                        </div>
                    </div>

                    {{-- Map container --}}
                    <div id="nearbyMapContainer" style="height: 420px; width: 100%; position: relative;">
                        {{-- Fallback if token is not set --}}
                        <div id="mapFallback" class="absolute inset-0 flex flex-col items-center justify-center bg-gradient-to-br from-slate-50 to-slate-100 z-10" style="display:none;">
                            <div class="w-16 h-16 rounded-2xl bg-slate-200 flex items-center justify-center mb-4">
                                <i class="fas fa-map text-slate-400 text-2xl"></i>
                            </div>
                            <p class="text-sm font-semibold text-slate-600">Map requires a Mapbox public token</p>
                            <p class="text-xs text-slate-400 mt-1">Add your <code class="bg-slate-200 px-1.5 py-0.5 rounded text-[11px]">pk.</code> token to <code class="bg-slate-200 px-1.5 py-0.5 rounded text-[11px]">VITE_MAPBOX_TOKEN</code> in .env</p>
                        </div>
                    </div>

                    {{-- Map legend bar --}}
                    <div class="flex items-center gap-4 flex-wrap px-5 sm:px-6 py-3 bg-slate-50/80 border-t border-slate-100">
                        <span class="text-[10px] font-bold uppercase tracking-[0.16em] text-slate-400">Legend</span>
                        <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-teal-500"></span><span class="text-[11px] text-slate-500">Destination</span></div>
                        <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-indigo-500"></span><span class="text-[11px] text-slate-500">Hotel</span></div>
                        <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span><span class="text-[11px] text-slate-500">Food & Souvenir</span></div>
                        <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-sky-500"></span><span class="text-[11px] text-slate-500">Transport & Guide</span></div>
                        <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span><span class="text-[11px] text-slate-500">Emergency</span></div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Stats snapshot row --}}
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-2">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="rounded-2xl bg-white border border-slate-200 p-5 shadow-sm"><p class="text-xs font-semibold tracking-[0.16em] uppercase text-slate-400">Updated Today</p><p class="mt-2 text-lg font-bold text-slate-800">Public travel snapshot</p><p class="text-sm text-slate-500 mt-1">Prototype content for tourism browsing.</p></div>
                <div class="rounded-2xl bg-white border border-slate-200 p-5 shadow-sm"><p class="text-xs font-semibold tracking-[0.16em] uppercase text-slate-400">Verified</p><p class="mt-2 text-lg font-bold text-slate-800">Accredited establishments</p><p class="text-sm text-slate-500 mt-1">Cards use front-end badges only.</p></div>
                <div class="rounded-2xl bg-white border border-slate-200 p-5 shadow-sm"><p class="text-xs font-semibold tracking-[0.16em] uppercase text-slate-400">Open Now</p><p class="mt-2 text-lg font-bold text-slate-800">Live-style indicators</p><p class="text-sm text-slate-500 mt-1">No database or persistence is used.</p></div>
                <div class="rounded-2xl bg-white border border-slate-200 p-5 shadow-sm"><p class="text-xs font-semibold tracking-[0.16em] uppercase text-slate-400">Accredited</p><p class="mt-2 text-lg font-bold text-slate-800">Public-facing demos</p><p class="text-sm text-slate-500 mt-1">Designed for clean mobile and desktop browsing.</p></div>
            </div>
        </section>

        <section id="explore" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 scroll-mt-24">
            <div class="flex items-end justify-between gap-4 flex-wrap mb-5">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-600">Tourism Directory</p>
                    <h2 class="mt-2 text-2xl font-extrabold text-slate-900">Explore destinations and services</h2>
                </div>
                <div class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 bg-white border border-slate-200 px-3 py-2 rounded-full shadow-sm"><i class="fas fa-circle-info text-teal-600"></i> Verified, accredited, and public-facing demo content</div>
            </div>
            <div class="grid grid-cols-1 xl:grid-cols-[280px_1fr] gap-6 items-start">

                {{-- ── Sidebar ─────────────────────────────────────────────── --}}
                <aside class="bg-white rounded-3xl border border-slate-200 shadow-sm p-5 sm:p-6 sticky top-24">
                    <h3 class="text-lg font-bold text-slate-900">Explore menus</h3>
                    <div class="mt-4 space-y-2">
                        <button type="button" class="explore-side w-full text-left px-4 py-3 rounded-xl border transition bg-[#e8f4f5] border-[#9ccfd3] text-[#0e4f5c] font-semibold" data-category="destination">Destinations</button>
                        <button type="button" class="explore-side w-full text-left px-4 py-3 rounded-xl border transition bg-slate-50 border-slate-200 text-slate-600 hover:bg-slate-100" data-category="hotel">Hotels</button>
                        <button type="button" class="explore-side w-full text-left px-4 py-3 rounded-xl border transition bg-slate-50 border-slate-200 text-slate-600 hover:bg-slate-100" data-category="transportation">Transportation Guides</button>
                        <button type="button" class="explore-side w-full text-left px-4 py-3 rounded-xl border transition bg-slate-50 border-slate-200 text-slate-600 hover:bg-slate-100" data-category="tour-guide">Tour Guides</button>
                        <button type="button" class="explore-side w-full text-left px-4 py-3 rounded-xl border transition bg-slate-50 border-slate-200 text-slate-600 hover:bg-slate-100" data-category="delicacy">Delicacies</button>
                        <button type="button" class="explore-side w-full text-left px-4 py-3 rounded-xl border transition bg-slate-50 border-slate-200 text-slate-600 hover:bg-slate-100" data-category="pasalubong">Pasalubong</button>
                        <button type="button" class="explore-side w-full text-left px-4 py-3 rounded-xl border transition bg-slate-50 border-slate-200 text-slate-600 hover:bg-slate-100" data-category="emergency">Emergency Hotlines</button>
                    </div>

                    {{-- Current filter / Near You status --}}
                    <div class="mt-6 rounded-2xl bg-slate-50 border border-slate-200 p-4">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Current filter</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800" id="selectedCategoryLabel">All categories</p>
                        <p class="text-sm text-slate-500 mt-1 hidden" id="searchEcho">Search: <span class="font-medium text-slate-700" id="searchEchoValue"></span></p>
                    </div>

                    {{-- Near You status panel (hidden by default) --}}
                    <div id="nearYouSidePanel" class="hidden mt-4 rounded-2xl border border-teal-200 bg-teal-50 p-4">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="relative flex h-2.5 w-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-teal-500"></span>
                            </span>
                            <p class="text-xs font-bold uppercase tracking-[0.14em] text-teal-700">Location active</p>
                        </div>
                        <p class="text-xs text-teal-600 font-semibold">Mati City, Davao Oriental</p>
                        <p class="text-[11px] text-teal-500 mt-1">Showing nearest results first</p>
                        <p class="text-[11px] text-slate-400 mt-2 italic">Simulated · No GPS used</p>
                    </div>

                    {{-- Results count --}}
                    <p class="mt-4 text-xs text-slate-400"><span id="visibleExploreCount">0</span> results shown</p>
                </aside>

                {{-- ── Main content column ─────────────────────────────────── --}}
                <div class="space-y-5">

                    {{-- Search + filters row --}}
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-5 sm:p-6">
                        <div class="grid grid-cols-1 md:grid-cols-[1fr_auto_auto_auto] gap-3">
                            <label class="relative block">
                                <i class="fas fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <input id="searchInput" type="text" placeholder="Search destinations, hotels, guides, food, and services"
                                    class="w-full h-12 pl-11 pr-4 rounded-xl border border-slate-300 bg-white text-sm focus:outline-none focus:border-[#0e4f5c] focus:ring-2 focus:ring-[#0e4f5c]/10">
                            </label>
                            <select id="categorySelect" class="h-12 rounded-xl border border-slate-300 bg-white px-4 text-sm focus:outline-none focus:border-[#0e4f5c] focus:ring-2 focus:ring-[#0e4f5c]/10">
                                <option value="all">All categories</option>
                                <option value="destination">Destinations</option>
                                <option value="hotel">Hotels</option>
                                <option value="transportation">Transportation</option>
                                <option value="tour-guide">Tour Guides</option>
                                <option value="delicacy">Delicacies</option>
                                <option value="pasalubong">Pasalubong</option>
                                <option value="emergency">Emergency Hotlines</option>
                            </select>
                            <button type="button" id="resetExplore"
                                class="h-12 inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 px-4 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition">
                                <i class="fas fa-rotate-right text-teal-600"></i> Reset
                            </button>
                            {{-- Near You toggle --}}
                            <button type="button" id="nearYouToggle"
                                class="h-12 inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 px-4 text-sm font-semibold text-slate-700 hover:bg-teal-50 hover:border-teal-300 hover:text-teal-700 transition"
                                aria-pressed="false" title="Toggle Near You mode">
                                <i class="fas fa-location-dot text-slate-400" id="nearYouIcon"></i>
                                <span id="nearYouLabel">Near You</span>
                            </button>
                        </div>
                    </div>

                    {{-- ── Mapbox map panel (hidden by default, shown in Near You mode) ── --}}
                    <div id="exploreMapPanel" class="hidden rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                        {{-- Map toolbar --}}
                        <div class="flex items-center justify-between gap-3 px-5 py-3 bg-white border-b border-slate-100">
                            <div class="flex items-center gap-2">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-teal-500"></span>
                                </span>
                                <span class="text-xs font-bold text-slate-700 uppercase tracking-[0.14em]">Interactive Map</span>
                                <span class="text-[10px] text-slate-400 font-medium ml-1">· Simulated location · Mati City</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <button type="button" id="mapResetViewBtn"
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-600 hover:text-[#0e4f5c] transition px-2.5 py-1.5 rounded-lg hover:bg-slate-100">
                                    <i class="fas fa-compress-arrows-alt"></i> Reset view
                                </button>
                                <button type="button" id="hideMapBtn"
                                    class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:text-slate-700 transition px-2.5 py-1.5 rounded-lg hover:bg-slate-100">
                                    <i class="fas fa-chevron-up"></i> Hide map
                                </button>
                            </div>
                        </div>
                        {{-- Map container --}}
                        <div id="exploreMap" style="height: 360px; width: 100%;"></div>
                        {{-- Marker click info bar --}}
                        <div id="mapInfoBar" class="hidden flex items-center gap-3 px-5 py-3 bg-teal-50 border-t border-teal-100 text-sm">
                            <i class="fas fa-location-dot text-teal-600"></i>
                            <div class="flex-1 min-w-0">
                                <span class="font-bold text-slate-800" id="mapInfoName">—</span>
                                <span class="text-teal-600 text-xs font-semibold ml-2" id="mapInfoDist"></span>
                            </div>
                            <button type="button" id="mapInfoScrollBtn"
                                class="shrink-0 inline-flex items-center gap-1.5 text-xs font-semibold text-[#0e4f5c] hover:text-[#083a44] transition">
                                View card <i class="fas fa-arrow-down"></i>
                            </button>
                        </div>
                    </div>

                    {{-- Listing grid --}}
                    <div id="exploreGrid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5"></div>

                    {{-- Empty state --}}
                    <div id="emptyState" class="hidden rounded-3xl border border-dashed border-slate-300 bg-white p-10 text-center">
                        <div class="mx-auto w-14 h-14 rounded-full bg-slate-100 flex items-center justify-center text-slate-400"><i class="fas fa-magnifying-glass"></i></div>
                        <h3 class="mt-4 text-lg font-bold text-slate-900">No results found</h3>
                        <p class="mt-2 text-sm text-slate-500 max-w-md mx-auto">Try removing a keyword or switching to another Explore category.</p>
                        <button type="button" id="clearEmptyFilters" class="mt-5 inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#0e4f5c] text-white text-sm font-semibold hover:bg-[#0a3f48] transition"><i class="fas fa-rotate-left"></i> Clear filters</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="plan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 scroll-mt-24">
            <div class="grid grid-cols-1 lg:grid-cols-[1.15fr_0.85fr] gap-6 items-start">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8">
                    <div class="flex items-end justify-between gap-4 flex-wrap mb-6">
                        <div><p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-600">Plan Your Trip</p><h2 class="mt-2 text-2xl font-extrabold text-slate-900">Suggested itinerary-style planning</h2></div>
                        <div class="flex flex-wrap gap-2">
                            <button type="button" class="plan-tab px-3 py-2 rounded-full text-xs font-semibold border bg-[#0e4f5c] text-white border-[#0e4f5c]" data-tab="1-day">1 Day</button>
                            <button type="button" class="plan-tab px-3 py-2 rounded-full text-xs font-semibold border bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100" data-tab="2-day">2 Day</button>
                            <button type="button" class="plan-tab px-3 py-2 rounded-full text-xs font-semibold border bg-slate-50 text-slate-600 border-slate-200 hover:bg-slate-100" data-tab="family">Family</button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4" id="planSteps"></div>
                </div>
                <div class="rounded-3xl bg-[#0e4f5c] text-white p-6 sm:p-7 relative overflow-hidden">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(255,255,255,0.12),transparent_35%)]"></div>
                    <div class="relative">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-100/75">Trip suggestions</p>
                        <h3 class="mt-2 text-xl font-extrabold">Easy, scanable planning for first-time visitors</h3>
                        <ul class="mt-5 space-y-3 text-sm text-teal-50/85">
                            <li class="flex gap-3"><i class="fas fa-circle-check mt-0.5 text-teal-200"></i><span>Start with a beach stop, then move to local food and sunset viewpoints.</span></li>
                            <li class="flex gap-3"><i class="fas fa-circle-check mt-0.5 text-teal-200"></i><span>Use the Explore filters to compare hotels, guides, transportation, and emergency contacts.</span></li>
                            <li class="flex gap-3"><i class="fas fa-circle-check mt-0.5 text-teal-200"></i><span>Keep the itinerary flexible; this prototype only demonstrates front-end planning behavior.</span></li>
                        </ul>
                        <button type="button" id="openTripModalBtn2" class="mt-6 inline-flex items-center gap-2 rounded-xl bg-white text-[#0e4f5c] px-4 py-3 text-sm font-semibold hover:bg-slate-50 transition"><i class="fas fa-calendar-days"></i> Open itinerary demo</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="reviews" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 scroll-mt-24">
            <div class="flex items-end justify-between gap-4 flex-wrap mb-6">
                <div><p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-600">Visitor Reviews</p><h2 class="mt-2 text-2xl font-extrabold text-slate-900">Public feedback snapshots</h2></div>
                <div class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 bg-white border border-slate-200 px-3 py-2 rounded-full shadow-sm"><i class="fas fa-comment-dots text-teal-600"></i> Scrolling and section focus only</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <article class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6"><div class="flex items-center gap-1 text-amber-400 text-sm"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div><p class="mt-4 text-sm text-slate-600 leading-6">The layout is easy to scan, and the destination cards are grouped clearly by category and travel purpose.</p><div class="mt-5 pt-5 border-t border-slate-100 flex items-center justify-between gap-4"><div><h3 class="font-bold text-slate-900">A. Santos</h3><p class="text-xs text-slate-400">Visitor from Davao City</p></div><span class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-[0.12em] uppercase bg-teal-50 text-teal-700">Verified</span></div></article>
                <article class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6"><div class="flex items-center gap-1 text-amber-400 text-sm"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div><p class="mt-4 text-sm text-slate-600 leading-6">The planning section makes the itinerary flow simple to follow without adding unnecessary steps.</p><div class="mt-5 pt-5 border-t border-slate-100 flex items-center justify-between gap-4"><div><h3 class="font-bold text-slate-900">M. Rivera</h3><p class="text-xs text-slate-400">Weekend traveler</p></div><span class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-[0.12em] uppercase bg-teal-50 text-teal-700">Updated Today</span></div></article>
                <article class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6"><div class="flex items-center gap-1 text-amber-400 text-sm"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div><p class="mt-4 text-sm text-slate-600 leading-6">The Explore filters and badges are enough for a prototype and still keep the interface clean.</p><div class="mt-5 pt-5 border-t border-slate-100 flex items-center justify-between gap-4"><div><h3 class="font-bold text-slate-900">J. Cruz</h3><p class="text-xs text-slate-400">Local guide user</p></div><span class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-[0.12em] uppercase bg-teal-50 text-teal-700">Accredited</span></div></article>
            </div>
        </section>

        <section id="about" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pb-16 scroll-mt-24">
            <div class="grid grid-cols-1 lg:grid-cols-[0.9fr_1.1fr] gap-6">
                <div class="rounded-3xl bg-[#0e4f5c] text-white p-6 sm:p-8 relative overflow-hidden"><div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.12),transparent_32%)]"></div><div class="relative"><p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-100/75">About</p><h2 class="mt-2 text-2xl font-extrabold">iTOUR for Davao Oriental tourism</h2><p class="mt-4 text-sm text-teal-50/85 leading-7">This public prototype presents a clean tourism portal concept for Davao Oriental. It highlights destinations, accredited services, visitor reviews, emergency guidance, and trip planning in a format that is easy to scan on mobile or desktop.</p></div></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4"><div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5"><h3 class="font-bold text-slate-900">Prototype scope</h3><p class="mt-2 text-sm text-slate-500 leading-6">Front-end interactions only, with no CRUD, no booking flow, no payments, and no persistence.</p></div><div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5"><h3 class="font-bold text-slate-900">Public structure</h3><p class="mt-2 text-sm text-slate-500 leading-6">Uses the same lightweight public-user layout style already present in the repo.</p></div><div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5"><h3 class="font-bold text-slate-900">Interaction model</h3><p class="mt-2 text-sm text-slate-500 leading-6">Scrolling, filtering, tab switching, modal open/close, and section focus only.</p></div><div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5"><h3 class="font-bold text-slate-900">Visual system</h3><p class="mt-2 text-sm text-slate-500 leading-6">Teal, white, slate, and light gray with rounded cards and sticky navigation.</p></div></div>
            </div>
        </section>
    </main>

    <div id="tripModal" class="fixed inset-0 z-50 hidden items-center justify-center px-4 py-6 bg-slate-950/55">
        <div class="w-full max-w-2xl rounded-3xl bg-white shadow-2xl border border-slate-200 overflow-hidden">
            <div class="flex items-center justify-between gap-4 px-6 py-4 border-b border-slate-100">
                <div><p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-600">Itinerary demo</p><h3 class="mt-1 text-lg font-bold text-slate-900">Suggested tourism flow</h3></div>
                <button type="button" id="closeTripModal" class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 hover:bg-slate-200 transition"><i class="fas fa-xmark"></i></button>
            </div>
            <div class="p-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="rounded-2xl bg-slate-50 border border-slate-200 p-4"><p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Morning</p><p class="mt-2 font-semibold text-slate-900">Beach or scenic stop</p><p class="mt-1 text-sm text-slate-500">Begin with a destination card in Explore.</p></div>
                <div class="rounded-2xl bg-slate-50 border border-slate-200 p-4"><p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Midday</p><p class="mt-2 font-semibold text-slate-900">Food and services</p><p class="mt-1 text-sm text-slate-500">Compare delicacies, pasalubong, or transport.</p></div>
                <div class="rounded-2xl bg-slate-50 border border-slate-200 p-4"><p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Evening</p><p class="mt-2 font-semibold text-slate-900">Review and plan</p><p class="mt-1 text-sm text-slate-500">Use reviews and trip suggestions to finalize a demo route.</p></div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const exploreItems = [
        { id: 1, name: 'Dahican Beach', location: 'Mati City', category: 'destination', categoryLabel: 'Destination', tag: 'Beach', badges: ['Verified', 'Open Now'], opening: 'Updated Today', status: 'Featured', rating: '4.8', description: 'A popular coastal stop known for surfing, wide shoreline views, and easy access from Mati City.', image: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1200&auto=format&fit=crop' },
        { id: 2, name: 'Aliwagwag Falls', location: 'Cateel', category: 'destination', categoryLabel: 'Destination', tag: 'Waterfall', badges: ['Accredited', 'Updated Today'], opening: 'Open Now', status: 'Featured', rating: '4.9', description: 'A multi-tier waterfall destination with scenic trails and a strong nature-focused tourism identity.', image: 'https://images.unsplash.com/photo-1439066615861-d1af74d74000?q=80&w=1200&auto=format&fit=crop' },
        { id: 3, name: 'Mt. Hamiguitan Scenic Area', location: 'San Isidro', category: 'destination', categoryLabel: 'Destination', tag: 'Mountain', badges: ['Verified', 'Updated Today'], opening: 'Open Now', status: 'Featured', rating: '4.9', description: 'Mountain landscapes and protected nature areas suited for a planned day trip or overnight route.', image: 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1200&auto=format&fit=crop' },
        { id: 4, name: 'Mati Marina Hotel', location: 'Mati City', category: 'hotel', categoryLabel: 'Hotel', tag: 'Stay', badges: ['Verified', 'Accredited'], opening: 'Open Now', status: 'Nearby', rating: '4.6', description: 'A city-center stay option for visitors who want easy access to food, transport, and local attractions.', image: 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200&auto=format&fit=crop' },
        { id: 5, name: 'Davao Oriental Van Service', location: 'Province-wide', category: 'transportation', categoryLabel: 'Transportation', tag: 'Transport', badges: ['Accredited', 'Updated Today'], opening: 'Open Now', status: 'Available', rating: '4.5', description: 'Front-end demo card for vans and transfers that can be filtered alongside destination listings.', image: 'https://images.unsplash.com/photo-1507878866276-a947ef722fee?q=80&w=1200&auto=format&fit=crop' },
        { id: 6, name: 'Marang and Local Sweets', location: 'Mati Public Market', category: 'delicacy', categoryLabel: 'Delicacy', tag: 'Food', badges: ['Updated Today'], opening: 'Open Now', status: 'Local favorite', rating: '4.7', description: 'Sample local delicacy listing for a scanable prototype food stop inside the Explore directory.', image: 'https://images.unsplash.com/photo-1498837167922-ddd27525d352?q=80&w=1200&auto=format&fit=crop' },
        { id: 7, name: 'Carved Souvenir Crafts', location: 'Mati City', category: 'pasalubong', categoryLabel: 'Pasalubong', tag: 'Souvenir', badges: ['Verified'], opening: 'Open Now', status: 'Popular', rating: '4.6', description: 'Gift and souvenir demo listing for easy scanning in a tourism shopping context.', image: 'https://images.unsplash.com/photo-1513885535751-8b9238bd345a?q=80&w=1200&auto=format&fit=crop' },
        { id: 8, name: 'Tourism Assistance Hotline', location: 'Provincial Capitol, Mati City', category: 'emergency', categoryLabel: 'Emergency Services', tag: 'Help', badges: ['Accredited', 'Updated Today'], opening: 'Open Now', status: 'Contact', rating: '24/7', description: 'Emergency and assistance information shown as a front-end reference item only.', image: 'https://images.unsplash.com/photo-1584515933487-779824d29309?q=80&w=1200&auto=format&fit=crop' },
        { id: 9, name: 'Licensed Tour Guide Desk', location: 'Mati City', category: 'tour-guide', categoryLabel: 'Tour Guide', tag: 'Guide', badges: ['Verified', 'Accredited'], opening: 'Open Now', status: 'Book demo', rating: '4.8', description: 'Sample guide profile for prototype filtering, search, and section browsing.', image: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1200&auto=format&fit=crop' }
    ];

    const planSteps = {
        '1-day': [
            { time: '08:00', title: 'Arrive and orient', type: 'Check-in', description: 'Start in Mati City, review the Explore directory, and identify a beach or city stop.' },
            { time: '11:00', title: 'Scenic visit', type: 'Outdoor', description: 'Use a featured attraction card for a beach, waterfall, or mountain destination.' },
            { time: '15:00', title: 'Food stop', type: 'Local taste', description: 'Add a delicacy or pasalubong stop to keep the itinerary simple and factual.' }
        ],
        '2-day': [
            { time: 'Day 1', title: 'Mati City and coast', type: 'Route', description: 'Use the first day for a beach or city itinerary and a hotel check-in.' },
            { time: 'Day 2', title: 'Nature and culture', type: 'Route', description: 'Add a waterfall or mountain stop, then close with food and souvenir browsing.' },
            { time: 'Night', title: 'Review and adjust', type: 'Planning', description: 'Use the visitor reviews section and Explore filters to refine the demo route.' }
        ],
        family: [
            { time: 'Morning', title: 'Easy-access destinations', type: 'Family', description: 'Keep the route short and choose cards that are easy to scan for families with kids.' },
            { time: 'Afternoon', title: 'Food and rest', type: 'Family', description: 'Select a hotel or restaurant-style listing for a low-effort midday stop.' },
            { time: 'Evening', title: 'Emergency and guidance', type: 'Family', description: 'Finish with emergency services and a short about section for practical reference.' }
        ]
    };

    const state = { category: 'all', query: '', tab: '1-day', section: 'home' };
    const searchInput = document.getElementById('searchInput');
    const categorySelect = document.getElementById('categorySelect');
    const resetExplore = document.getElementById('resetExplore');
    const exploreGrid = document.getElementById('exploreGrid');
    const emptyState = document.getElementById('emptyState');
    const visibleExploreCount = document.getElementById('visibleExploreCount');
    const selectedCategoryLabel = document.getElementById('selectedCategoryLabel');
    const searchEcho = document.getElementById('searchEcho');
    const searchEchoValue = document.getElementById('searchEchoValue');
    const mobileNav = document.getElementById('mobileNav');
    const navToggle = document.getElementById('navToggle');
    const navToggleIcon = document.getElementById('navToggleIcon');
    const tripModal = document.getElementById('tripModal');
    const openTripModalBtn2 = document.getElementById('openTripModalBtn2');
    const closeTripModal = document.getElementById('closeTripModal');
    const planStepsContainer = document.getElementById('planSteps');
    const clearEmptyFilters = document.getElementById('clearEmptyFilters');

    function scrollToSection(id) { const target = document.getElementById(id); if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' }); if (mobileNav) { mobileNav.classList.add('hidden'); navToggleIcon.className = 'fas fa-bars'; } state.section = id; updateNavState(); }
    function updateNavState() { document.querySelectorAll('.js-scroll-link').forEach((link) => { const active = link.dataset.scrollTarget === state.section; link.classList.toggle('text-[#0e4f5c]', active); link.classList.toggle('font-semibold', active); if (!active && link.closest('nav')) link.classList.add('text-slate-500'); }); }
    function renderPlanSteps() { const steps = planSteps[state.tab] || []; planStepsContainer.innerHTML = steps.map((step) => `<div class="flex gap-4 rounded-2xl border border-slate-200 p-4 sm:p-5 bg-slate-50/60"><div class="w-20 shrink-0"><div class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-white border border-slate-200 text-xs font-bold text-[#0e4f5c]">${step.time}</div></div><div class="flex-1"><div class="flex items-start justify-between gap-3 flex-wrap"><h3 class="text-base font-bold text-slate-900">${step.title}</h3><span class="text-xs font-semibold uppercase tracking-[0.14em] text-slate-400">${step.type}</span></div><p class="mt-2 text-sm text-slate-500 leading-6">${step.description}</p></div></div>`).join(''); }
    function updatePlanTabs() { document.querySelectorAll('.plan-tab').forEach((button) => { const active = button.dataset.tab === state.tab; button.classList.toggle('bg-[#0e4f5c]', active); button.classList.toggle('text-white', active); button.classList.toggle('border-[#0e4f5c]', active); button.classList.toggle('bg-slate-50', !active); button.classList.toggle('text-slate-600', !active); button.classList.toggle('border-slate-200', !active); }); renderPlanSteps(); }
    function setCategory(category) { state.category = category; categorySelect.value = category; const labelMap = { all: 'All categories', destination: 'Destinations', hotel: 'Hotels', transportation: 'Transportation', 'tour-guide': 'Tour Guides', delicacy: 'Delicacies', pasalubong: 'Pasalubong', emergency: 'Emergency Services' }; selectedCategoryLabel.textContent = labelMap[category] ?? 'All categories'; document.querySelectorAll('.explore-side').forEach((button) => { const active = button.dataset.category === category; button.classList.toggle('bg-[#e8f4f5]', active); button.classList.toggle('border-[#9ccfd3]', active); button.classList.toggle('text-[#0e4f5c]', active); button.classList.toggle('font-semibold', active); button.classList.toggle('bg-slate-50', !active); button.classList.toggle('border-slate-200', !active); button.classList.toggle('text-slate-600', !active); }); applyFilters(); }
    function applyFilters() { const query = state.query.trim().toLowerCase(); const filtered = exploreItems.filter((item) => { const matchesCategory = state.category === 'all' || item.category === state.category; const matchesQuery = !query || [item.name, item.location, item.categoryLabel, item.tag, item.description, item.status, item.opening].some((value) => value.toLowerCase().includes(query)); return matchesCategory && matchesQuery; }); exploreGrid.innerHTML = filtered.map((item) => `<article id="explore-card-${item.id}" data-explore-card class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col scroll-mt-24"><div class="relative h-48 bg-slate-100"><div class="absolute inset-0 bg-cover bg-center" style="background-image: linear-gradient(to bottom, rgba(8, 30, 35, 0.12), rgba(8, 30, 35, 0.42)), url('${item.image}')"></div><div class="absolute top-4 left-4 flex flex-wrap gap-2"><span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold tracking-[0.12em] uppercase text-white bg-[#0e4f5c]">${item.tag}</span>${item.badges.map((badge) => `<span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold tracking-[0.12em] uppercase bg-white text-slate-700 shadow-sm">${badge}</span>`).join('')}</div><div class="absolute bottom-4 left-4 right-4"><p class="text-white text-sm font-medium">${item.location}</p><h3 class="text-white text-2xl font-extrabold tracking-tight mt-1">${item.name}</h3></div></div><div class="p-5 flex-1 flex flex-col"><div class="flex items-center justify-between gap-3"><span class="text-xs font-semibold uppercase tracking-[0.16em] text-teal-600">${item.categoryLabel}</span><span class="text-sm text-slate-500 inline-flex items-center gap-1"><i class="fas fa-star text-amber-400"></i> ${item.rating}</span></div><p class="mt-3 text-sm text-slate-500 leading-6">${item.description}</p><div class="mt-4 flex flex-wrap gap-2"><span class="px-2.5 py-1 rounded-full bg-teal-50 text-teal-700 text-[11px] font-semibold">Updated Today</span><span class="px-2.5 py-1 rounded-full bg-slate-100 text-slate-600 text-[11px] font-semibold">${item.opening}</span></div><div class="mt-5 pt-5 border-t border-slate-100 flex items-center justify-between gap-3"><button type="button" class="js-focus-card inline-flex items-center gap-2 text-sm font-semibold text-[#0e4f5c] hover:text-[#083a44]" data-card-id="${item.id}"><i class="fas fa-arrow-up-right-from-square"></i> Focus card</button><span class="text-xs font-semibold uppercase tracking-[0.14em] text-slate-400">${item.status}</span></div></div></article>`).join(''); visibleExploreCount.textContent = String(filtered.length); emptyState.classList.toggle('hidden', filtered.length !== 0); searchEcho.classList.toggle('hidden', query.length === 0); searchEchoValue.textContent = state.query.trim(); }

    // ── Profile Dropdown ─────────────────────────────────────────
    const profileDropdownBtn  = document.getElementById('profileDropdownBtn');
    const profileDropdownMenu = document.getElementById('profileDropdownMenu');
    const profileDropdownWrapper = document.getElementById('profileDropdownWrapper');
    const profileChevron      = document.getElementById('profileChevron');
    const logoutForm          = document.getElementById('logoutForm');
    const logoutBtn           = document.getElementById('logoutBtn');
    let dropdownOpen = false;

    function openProfileDropdown() {
        if (dropdownOpen) return;
        dropdownOpen = true;
        profileDropdownMenu.style.display = 'block';
        requestAnimationFrame(() => {
            profileDropdownMenu.style.opacity = '1';
            profileDropdownMenu.style.transform = 'translateY(0)';
        });
        profileDropdownBtn.setAttribute('aria-expanded', 'true');
        if (profileChevron) profileChevron.style.transform = 'rotate(180deg)';
    }

    function closeProfileDropdown() {
        if (!dropdownOpen) return;
        dropdownOpen = false;
        profileDropdownMenu.style.opacity = '0';
        profileDropdownMenu.style.transform = 'translateY(-6px)';
        profileDropdownBtn.setAttribute('aria-expanded', 'false');
        if (profileChevron) profileChevron.style.transform = 'rotate(0deg)';
        setTimeout(() => { if (!dropdownOpen) profileDropdownMenu.style.display = 'none'; }, 200);
    }

    if (profileDropdownBtn && profileDropdownMenu) {
        profileDropdownBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdownOpen ? closeProfileDropdown() : openProfileDropdown();
        });
        document.addEventListener('click', (e) => {
            if (dropdownOpen && profileDropdownWrapper && !profileDropdownWrapper.contains(e.target)) {
                closeProfileDropdown();
            }
        });
    }

    if (logoutBtn && logoutForm) {
        logoutBtn.addEventListener('click', (e) => {
            e.preventDefault();
            logoutBtn.disabled = true;
            logoutBtn.innerHTML = '<i class="fas fa-spinner fa-spin w-4 text-center"></i> Signing out…';
            setTimeout(() => logoutForm.submit(), 400);
        });
    }

    document.querySelectorAll('.js-scroll-link').forEach((link) => link.addEventListener('click', (event) => { event.preventDefault(); scrollToSection(link.dataset.scrollTarget); }));
    navToggle.addEventListener('click', () => { mobileNav.classList.toggle('hidden'); navToggleIcon.className = mobileNav.classList.contains('hidden') ? 'fas fa-bars' : 'fas fa-xmark'; });
    document.querySelectorAll('.explore-side').forEach((button) => button.addEventListener('click', () => { setCategory(button.dataset.category); scrollToSection('explore'); }));
    categorySelect.addEventListener('change', () => setCategory(categorySelect.value));
    searchInput.addEventListener('input', () => { state.query = searchInput.value; applyFilters(); });
    resetExplore.addEventListener('click', () => { state.category = 'all'; state.query = ''; searchInput.value = ''; categorySelect.value = 'all'; setCategory('all'); });
    clearEmptyFilters.addEventListener('click', () => resetExplore.click());
    document.addEventListener('click', (event) => { const focusButton = event.target.closest('.js-focus-card'); if (focusButton) { const card = document.getElementById(`explore-card-${focusButton.dataset.cardId}`); if (card) { document.querySelectorAll('[data-explore-card]').forEach((el) => el.classList.remove('ring-2', 'ring-[#0e4f5c]', 'ring-offset-2', 'ring-offset-[#f0f5f7]')); card.classList.add('ring-2', 'ring-[#0e4f5c]', 'ring-offset-2', 'ring-offset-[#f0f5f7]'); card.scrollIntoView({ behavior: 'smooth', block: 'center' }); } return; } const tab = event.target.closest('.plan-tab'); if (tab) { state.tab = tab.dataset.tab; updatePlanTabs(); } });
    openTripModalBtn2.addEventListener('click', () => tripModal.classList.remove('hidden'));
    closeTripModal.addEventListener('click', () => tripModal.classList.add('hidden'));
    tripModal.addEventListener('click', (event) => { if (event.target === tripModal) tripModal.classList.add('hidden'); });
    document.addEventListener('keydown', (event) => { if (event.key === 'Escape') { tripModal.classList.add('hidden'); mobileNav.classList.add('hidden'); navToggleIcon.className = 'fas fa-bars'; closeProfileDropdown(); } });
    const sections = ['home', 'explore', 'plan', 'reviews', 'about'].map((id) => document.getElementById(id)).filter(Boolean);
    const observer = new IntersectionObserver((entries) => { entries.forEach((entry) => { if (entry.isIntersecting) { state.section = entry.target.id; updateNavState(); } }); }, { rootMargin: '-35% 0px -45% 0px', threshold: 0.15 });
    sections.forEach((section) => observer.observe(section));
    setCategory('all'); updatePlanTabs(); updateNavState();

    // ── Mapbox Interactive Map ──────────────────────────────────────
    (function initNearbyMap() {
        const MAPBOX_TOKEN = '{{ env("VITE_MAPBOX_TOKEN", "") }}';
        const mapContainer = document.getElementById('nearbyMapContainer');
        const mapFallback  = document.getElementById('mapFallback');

        if (!MAPBOX_TOKEN || MAPBOX_TOKEN.indexOf('pk.') !== 0 || MAPBOX_TOKEN === 'pk.YOUR_PUBLIC_TOKEN_HERE') {
            if (mapFallback) mapFallback.style.display = 'flex';
            return;
        }

        mapboxgl.accessToken = MAPBOX_TOKEN;

        // Mati City center
        const MATI_CENTER = [126.2168, 6.9553];

        const map = new mapboxgl.Map({
            container: 'nearbyMapContainer',
            style: 'mapbox://styles/mapbox/light-v11',
            center: MATI_CENTER,
            zoom: 9.5,
            pitch: 15,
            bearing: 0,
            antialias: true,
            attributionControl: false
        });

        map.addControl(new mapboxgl.NavigationControl({ showCompass: true }), 'top-right');
        map.addControl(new mapboxgl.AttributionControl({ compact: true }), 'bottom-right');

        // Color map for categories
        const categoryColors = {
            destination:    '#14b8a6',
            hotel:          '#6366f1',
            transportation: '#0ea5e9',
            'tour-guide':   '#0ea5e9',
            delicacy:       '#f59e0b',
            pasalubong:     '#f59e0b',
            emergency:      '#f43f5e'
        };

        // Marker data — real Davao Oriental coordinates
        const mapMarkers = [
            { id: 1,  name: 'Dahican Beach',              category: 'destination',    lat: 6.9370, lng: 126.2450, rating: '4.8', location: 'Mati City',           tag: 'Beach' },
            { id: 2,  name: 'Aliwagwag Falls',             category: 'destination',    lat: 7.7833, lng: 126.4500, rating: '4.9', location: 'Cateel',              tag: 'Waterfall' },
            { id: 3,  name: 'Mt. Hamiguitan',              category: 'destination',    lat: 6.7414, lng: 126.1647, rating: '4.9', location: 'San Isidro',          tag: 'Mountain' },
            { id: 4,  name: 'Mati Marina Hotel',           category: 'hotel',          lat: 6.9553, lng: 126.2168, rating: '4.6', location: 'Mati City',           tag: 'Stay' },
            { id: 5,  name: 'Davao Oriental Van Service',  category: 'transportation', lat: 6.9500, lng: 126.2200, rating: '4.5', location: 'Province-wide',       tag: 'Transport' },
            { id: 6,  name: 'Marang and Local Sweets',     category: 'delicacy',       lat: 6.9520, lng: 126.2130, rating: '4.7', location: 'Mati Public Market',  tag: 'Food' },
            { id: 7,  name: 'Carved Souvenir Crafts',      category: 'pasalubong',     lat: 6.9560, lng: 126.2190, rating: '4.6', location: 'Mati City',           tag: 'Souvenir' },
            { id: 8,  name: 'Tourism Assistance Hotline',  category: 'emergency',      lat: 6.9480, lng: 126.2220, rating: '24/7', location: 'Provincial Capitol', tag: 'Help' },
            { id: 9,  name: 'Licensed Tour Guide Desk',    category: 'tour-guide',     lat: 6.9545, lng: 126.2140, rating: '4.8', location: 'Mati City',           tag: 'Guide' },
            { id: 10, name: 'Sleeping Dinosaur Island',    category: 'destination',    lat: 6.9220, lng: 126.2650, rating: '4.8', location: 'Mati City',           tag: 'Island' },
            { id: 11, name: 'Subangan Museum',             category: 'destination',    lat: 6.9530, lng: 126.2250, rating: '4.5', location: 'Mati City',           tag: 'Museum' },
            { id: 12, name: 'Cape San Agustin',            category: 'destination',    lat: 6.2700, lng: 126.1850, rating: '4.7', location: 'Governor Generoso',   tag: 'Cape' }
        ];

        const bounds = new mapboxgl.LngLatBounds();

        mapMarkers.forEach((spot) => {
            const color = categoryColors[spot.category] || '#64748b';
            bounds.extend([spot.lng, spot.lat]);

            // Create custom marker element
            const el = document.createElement('div');
            el.className = 'nearby-map-marker';
            el.style.cssText = `
                width: 32px; height: 32px; border-radius: 50%; cursor: pointer;
                background: ${color}; border: 3px solid white;
                box-shadow: 0 2px 8px rgba(0,0,0,0.25), 0 0 0 1px rgba(0,0,0,0.08);
                transition: transform 0.2s ease, box-shadow 0.2s ease;
                display: flex; align-items: center; justify-content: center;
            `;
            el.innerHTML = `<i class="fas fa-location-dot" style="color:white;font-size:13px;"></i>`;
            el.addEventListener('mouseenter', () => { el.style.transform = 'scale(1.3)'; el.style.boxShadow = '0 4px 16px rgba(0,0,0,0.35), 0 0 0 2px ' + color; });
            el.addEventListener('mouseleave', () => { el.style.transform = 'scale(1)'; el.style.boxShadow = '0 2px 8px rgba(0,0,0,0.25), 0 0 0 1px rgba(0,0,0,0.08)'; });

            const popup = new mapboxgl.Popup({
                offset: 20,
                closeButton: true,
                closeOnClick: false,
                maxWidth: '280px',
                className: 'nearby-map-popup'
            }).setHTML(`
                <div style="font-family:Inter,sans-serif;">
                    <div style="display:flex;align-items:center;gap:6px;margin-bottom:8px;">
                        <span style="display:inline-flex;align-items:center;padding:2px 8px;border-radius:999px;background:${color};color:white;font-size:10px;font-weight:700;letter-spacing:0.05em;text-transform:uppercase;">${spot.tag}</span>
                        <span style="font-size:11px;color:#64748b;display:flex;align-items:center;gap:3px;">
                            <i class="fas fa-star" style="color:#f59e0b;font-size:10px;"></i> ${spot.rating}
                        </span>
                    </div>
                    <p style="font-size:14px;font-weight:800;color:#0f172a;margin:0 0 4px;">${spot.name}</p>
                    <p style="font-size:12px;color:#64748b;margin:0;display:flex;align-items:center;gap:4px;">
                        <i class="fas fa-location-dot" style="color:${color};font-size:10px;"></i> ${spot.location}
                    </p>
                </div>
            `);

            new mapboxgl.Marker({ element: el })
                .setLngLat([spot.lng, spot.lat])
                .setPopup(popup)
                .addTo(map);

            el.addEventListener('click', () => {
                map.flyTo({ center: [spot.lng, spot.lat], zoom: 13, pitch: 30, duration: 1200, essential: true });
            });
        });

        // Fit all markers on load
        map.on('load', () => {
            map.fitBounds(bounds, { padding: { top: 50, bottom: 40, left: 40, right: 40 }, maxZoom: 12, duration: 1000 });
        });

        // Fit All button
        const fitAllBtn = document.getElementById('mapFitAllBtn');
        if (fitAllBtn) {
            fitAllBtn.addEventListener('click', () => {
                map.fitBounds(bounds, { padding: { top: 50, bottom: 40, left: 40, right: 40 }, maxZoom: 12, duration: 1000 });
            });
        }

        // Toggle satellite / streets
        const toggleStyleBtn = document.getElementById('mapToggleStyleBtn');
        let isSatellite = false;
        if (toggleStyleBtn) {
            toggleStyleBtn.addEventListener('click', () => {
                isSatellite = !isSatellite;
                map.setStyle(isSatellite ? 'mapbox://styles/mapbox/satellite-streets-v12' : 'mapbox://styles/mapbox/light-v11');
                toggleStyleBtn.innerHTML = isSatellite
                    ? '<i class="fas fa-layer-group"></i> Streets'
                    : '<i class="fas fa-layer-group"></i> Satellite';

                // Re-add markers after style change
                map.once('style.load', () => {
                    mapMarkers.forEach((spot) => {
                        const color = categoryColors[spot.category] || '#64748b';
                        const markerEl = document.createElement('div');
                        markerEl.style.cssText = `
                            width: 32px; height: 32px; border-radius: 50%; cursor: pointer;
                            background: ${color}; border: 3px solid white;
                            box-shadow: 0 2px 8px rgba(0,0,0,0.25), 0 0 0 1px rgba(0,0,0,0.08);
                            transition: transform 0.2s ease, box-shadow 0.2s ease;
                            display: flex; align-items: center; justify-content: center;
                        `;
                        markerEl.innerHTML = `<i class="fas fa-location-dot" style="color:white;font-size:13px;"></i>`;
                        markerEl.addEventListener('mouseenter', () => { markerEl.style.transform = 'scale(1.3)'; });
                        markerEl.addEventListener('mouseleave', () => { markerEl.style.transform = 'scale(1)'; });

                        const rePopup = new mapboxgl.Popup({ offset: 20, closeButton: true, closeOnClick: false, maxWidth: '280px', className: 'nearby-map-popup' })
                            .setHTML(`
                                <div style="font-family:Inter,sans-serif;">
                                    <div style="display:flex;align-items:center;gap:6px;margin-bottom:8px;">
                                        <span style="display:inline-flex;align-items:center;padding:2px 8px;border-radius:999px;background:${color};color:white;font-size:10px;font-weight:700;letter-spacing:0.05em;text-transform:uppercase;">${spot.tag}</span>
                                        <span style="font-size:11px;color:#64748b;display:flex;align-items:center;gap:3px;"><i class="fas fa-star" style="color:#f59e0b;font-size:10px;"></i> ${spot.rating}</span>
                                    </div>
                                    <p style="font-size:14px;font-weight:800;color:#0f172a;margin:0 0 4px;">${spot.name}</p>
                                    <p style="font-size:12px;color:#64748b;margin:0;display:flex;align-items:center;gap:4px;"><i class="fas fa-location-dot" style="color:${color};font-size:10px;"></i> ${spot.location}</p>
                                </div>
                            `);

                        new mapboxgl.Marker({ element: markerEl }).setLngLat([spot.lng, spot.lat]).setPopup(rePopup).addTo(map);
                        markerEl.addEventListener('click', () => { map.flyTo({ center: [spot.lng, spot.lat], zoom: 13, pitch: 30, duration: 1200 }); });
                    });
                });
            });
        }
    })();
});
</script>

{{-- Mapbox popup overrides --}}
<style>
    .mapboxgl-popup-content {
        border-radius: 16px !important;
        padding: 14px 16px !important;
        box-shadow: 0 8px 32px rgba(0,0,0,0.15), 0 2px 8px rgba(0,0,0,0.08) !important;
        border: 1px solid rgba(0,0,0,0.06) !important;
    }
    .mapboxgl-popup-close-button {
        font-size: 18px;
        color: #94a3b8;
        right: 8px;
        top: 6px;
    }
    .mapboxgl-popup-close-button:hover {
        color: #0f172a;
        background: transparent;
    }
    .mapboxgl-popup-tip {
        border-top-color: white !important;
    }
</style>
@endsection
