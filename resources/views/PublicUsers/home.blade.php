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
            <div class="mb-6">
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-600">Plan Your Trip</p>
                <h2 class="mt-2 text-2xl font-extrabold text-slate-900">Build your personalized Davao Oriental itinerary</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_0.7fr] gap-6 items-start">
                {{-- Left: Preferences + Itinerary --}}
                <div class="space-y-6">
                    {{-- Trip Preferences Card --}}
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8" id="preferences-card">
                        <h3 class="text-sm font-bold text-slate-900 mb-5">Tell us about your trip</h3>

                        <div class="space-y-5">
                            {{-- Duration --}}
                            <div>
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Travel Duration</label>
                                <div class="flex flex-wrap gap-2" id="pref-duration">
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="day-tour">Day Tour</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="2-days">2 Days / 1 Night</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="3-days">3 Days / 2 Nights</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="4-days">4 Days / 3 Nights</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="5-plus">5+ Days</button>
                                </div>
                            </div>

                            {{-- Travel Type --}}
                            <div>
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Travel Type</label>
                                <div class="flex flex-wrap gap-2" id="pref-type">
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="solo">Solo</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="couple">Couple</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="family">Family</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="group">Friends / Group</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="educational">Educational Tour</button>
                                </div>
                            </div>

                            {{-- Interests --}}
                            <div>
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Interests</label>
                                <div class="flex flex-wrap gap-2" id="pref-interests">
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="beaches">Beaches</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="islands">Islands</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="nature">Nature & Waterfalls</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="mountains">Mountains & Hiking</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="culture">Culture & Heritage</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="food">Food & Local Cuisine</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="adventure">Adventure Activities</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="relaxation">Relaxation & Leisure</button>
                                </div>
                            </div>

                            {{-- Budget --}}
                            <div>
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Budget Range</label>
                                <div class="flex flex-wrap gap-2" id="pref-budget">
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="budget">Budget-Friendly</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="mid">Mid-Range</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="premium">Premium</button>
                                </div>
                            </div>

                            {{-- Transportation --}}
                            <div>
                                <label class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mb-2">Transportation</label>
                                <div class="flex flex-wrap gap-2" id="pref-transport">
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="private">Private Vehicle</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="public">Public Transportation</button>
                                    <button type="button" class="pref-btn px-4 py-2 rounded-full text-xs font-bold border border-slate-200 bg-white text-slate-600 hover:border-[#0e4f5c] hover:text-[#0e4f5c] transition" data-value="either">Either</button>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 pt-2">
                                <button type="button" onclick="buildItinerary()"
                                    class="bg-[#0e4f5c] hover:bg-[#0a3d47] text-white px-6 py-2.5 rounded-xl text-sm font-bold transition shadow-sm flex items-center gap-2">
                                    <i class="fas fa-route"></i> Build My Itinerary
                                </button>
                                <button type="button" onclick="resetPreferences()"
                                    class="border border-slate-200 hover:bg-slate-50 text-slate-600 px-5 py-2.5 rounded-xl text-sm font-semibold transition">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Generated Itinerary Card --}}
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8" id="itinerary-card">
                        <div id="itinerary-empty">
                            <div class="text-center py-10">
                                <div class="w-16 h-16 rounded-full bg-teal-50 flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-map-location-dot text-teal-400 text-xl"></i>
                                </div>
                                <h3 class="text-lg font-bold text-slate-900">Start planning your trip</h3>
                                <p class="text-sm text-slate-500 mt-2 max-w-md mx-auto">Tell us your travel preferences and we'll help you build a personalized Davao Oriental itinerary.</p>
                            </div>
                        </div>
                        <div id="itinerary-generated" class="hidden"></div>
                    </div>
                </div>

                {{-- Right: Trip Info Sidebar --}}
                <div class="space-y-4" id="trip-info-sidebar">
                    <div class="rounded-3xl bg-[#0e4f5c] text-white p-6 sm:p-7 relative overflow-hidden">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(255,255,255,0.12),transparent_35%)]"></div>
                        <div class="relative">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-100/75">Why plan with iTOUR?</p>
                            <ul class="mt-5 space-y-3 text-sm text-teal-50/85">
                                <li class="flex gap-3"><i class="fas fa-circle-check mt-0.5 text-teal-200"></i><span>Personalized recommendations based on your interests and budget.</span></li>
                                <li class="flex gap-3"><i class="fas fa-circle-check mt-0.5 text-teal-200"></i><span>Curated attractions from accredited destinations across Davao Oriental.</span></li>
                                <li class="flex gap-3"><i class="fas fa-circle-check mt-0.5 text-teal-200"></i><span>Day-by-day timeline with morning, afternoon, and evening activities.</span></li>
                            </ul>
                        </div>
                    </div>
                    <div id="trip-stats-card" class="hidden rounded-3xl bg-white border border-slate-200 shadow-sm p-6">
                        <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">Trip Overview</h4>
                        <div class="space-y-3 text-sm" id="trip-stats-content"></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="reviews" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 scroll-mt-24">
            <div class="flex items-end justify-between gap-4 flex-wrap mb-8">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-600">Visitor Reviews</p>
                    <h2 class="mt-2 text-2xl font-extrabold text-slate-900">What visitors are saying</h2>
                </div>
                <button type="button" onclick="openFeedbackForm()"
                    class="inline-flex items-center gap-2 bg-[#0e4f5c] hover:bg-[#0a3d47] text-white px-5 py-2.5 rounded-full text-sm font-bold transition shadow-sm">
                    <i class="fas fa-pen"></i> Submit Feedback
                </button>
            </div>

            <div id="feedback-container"></div>

            <div id="feedback-empty" class="hidden text-center py-16">
                <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-comment-dots text-slate-300 text-xl"></i>
                </div>
                <p class="text-slate-500 font-semibold">No reviews have been submitted yet.</p>
                <p class="text-sm text-slate-400 mt-1">Be the first to share your experience.</p>
                <button type="button" onclick="openFeedbackForm()"
                    class="mt-4 inline-flex items-center gap-2 bg-[#0e4f5c] hover:bg-[#0a3d47] text-white px-5 py-2.5 rounded-full text-sm font-bold transition shadow-sm">
                    <i class="fas fa-pen"></i> Write a Review
                </button>
            </div>
        </section>

        {{-- Feedback Form Modal --}}
        <div id="feedbackModal" class="fixed inset-0 z-50 hidden items-center justify-center px-4 py-8 bg-slate-950/55" style="display:none;">
            <div class="w-full max-w-lg rounded-3xl bg-white shadow-2xl border border-slate-200 overflow-hidden max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between gap-4 px-6 py-4 border-b border-slate-100 sticky top-0 bg-white z-10">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-600">Share your experience</p>
                        <h3 class="mt-1 text-lg font-bold text-slate-900">Submit Feedback</h3>
                    </div>
                    <button type="button" onclick="closeFeedbackForm()" class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 hover:bg-slate-200 transition flex items-center justify-center">
                        <i class="fas fa-xmark"></i>
                    </button>
                </div>
                <div class="p-6 space-y-5">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Your Name <span class="text-slate-300 font-normal">(Optional)</span></label>
                        <input type="text" id="feedback-name" placeholder="e.g. Juan Dela Cruz"
                            class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-700 bg-white focus:outline-none focus:ring-2 focus:ring-[#0e4f5c]/30 focus:border-[#0e4f5c] transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Establishment <span class="text-rose-400">*</span></label>
                        <select id="feedback-establishment"
                            class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-700 bg-white focus:outline-none focus:ring-2 focus:ring-[#0e4f5c]/30 focus:border-[#0e4f5c] transition-all">
                            <option value="" disabled selected>Select an establishment</option>
                            <option value="Blue Bless Resort">Blue Bless Resort</option>
                            <option value="Botona Beach Resort">Botona Beach Resort</option>
                            <option value="Mati Marina Hotel">Mati Marina Hotel</option>
                            <option value="Aliwagwag Eco Lodge">Aliwagwag Eco Lodge</option>
                            <option value="Pujada Bay Diving Center">Pujada Bay Diving Center</option>
                            <option value="Cateel Heritage Cafe">Cateel Heritage Cafe</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Rating <span class="text-rose-400">*</span></label>
                        <div class="flex items-center gap-1.5 text-2xl" id="star-rating-input">
                            <span class="star-btn cursor-pointer text-slate-200 hover:text-amber-400 transition-colors" data-value="1">★</span>
                            <span class="star-btn cursor-pointer text-slate-200 hover:text-amber-400 transition-colors" data-value="2">★</span>
                            <span class="star-btn cursor-pointer text-slate-200 hover:text-amber-400 transition-colors" data-value="3">★</span>
                            <span class="star-btn cursor-pointer text-slate-200 hover:text-amber-400 transition-colors" data-value="4">★</span>
                            <span class="star-btn cursor-pointer text-slate-200 hover:text-amber-400 transition-colors" data-value="5">★</span>
                        </div>
                        <input type="hidden" id="feedback-rating" value="0">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Your Review <span class="text-rose-400">*</span></label>
                        <textarea id="feedback-text" rows="4" placeholder="Share your experience..." maxlength="1000"
                            class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-700 bg-white focus:outline-none focus:ring-2 focus:ring-[#0e4f5c]/30 focus:border-[#0e4f5c] transition-all resize-none"></textarea>
                        <p class="text-xs text-slate-400 mt-1 text-right"><span id="feedback-chars">0</span>/1000</p>
                    </div>
                    <p class="text-xs text-slate-400 leading-5">
                        <i class="fas fa-circle-info text-teal-600 mr-1"></i>
                        Your feedback helps tourism establishments and the Provincial Tourism Office improve services and experiences for all visitors.
                    </p>
                    <button type="button" onclick="submitFeedback()"
                        class="w-full bg-[#0e4f5c] hover:bg-[#0a3d47] text-white px-5 py-3 rounded-xl text-sm font-bold transition shadow-sm flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane"></i> Submit Review
                    </button>
                </div>
            </div>
        </div>

        <section id="about" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 pb-16 scroll-mt-24">
            <div class="grid grid-cols-1 lg:grid-cols-[0.9fr_1.1fr] gap-6">
                <div class="rounded-3xl bg-[#0e4f5c] text-white p-6 sm:p-8 relative overflow-hidden"><div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.12),transparent_32%)]"></div><div class="relative"><p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-100/75">About</p><h2 class="mt-2 text-2xl font-extrabold">iTOUR for Davao Oriental tourism</h2><p class="mt-4 text-sm text-teal-50/85 leading-7">This public prototype presents a clean tourism portal concept for Davao Oriental. It highlights destinations, accredited services, visitor reviews, emergency guidance, and trip planning in a format that is easy to scan on mobile or desktop.</p></div></div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4"><div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5"><h3 class="font-bold text-slate-900">Prototype scope</h3><p class="mt-2 text-sm text-slate-500 leading-6">Front-end interactions only, with no CRUD, no booking flow, no payments, and no persistence.</p></div><div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5"><h3 class="font-bold text-slate-900">Public structure</h3><p class="mt-2 text-sm text-slate-500 leading-6">Uses the same lightweight public-user layout style already present in the repo.</p></div><div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5"><h3 class="font-bold text-slate-900">Interaction model</h3><p class="mt-2 text-sm text-slate-500 leading-6">Scrolling, filtering, tab switching, modal open/close, and section focus only.</p></div><div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5"><h3 class="font-bold text-slate-900">Visual system</h3><p class="mt-2 text-sm text-slate-500 leading-6">Teal, white, slate, and light gray with rounded cards and sticky navigation.</p></div></div>
            </div>
        </section>
    </main>

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

    const state = { category: 'all', query: '', section: 'home' };
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
    const clearEmptyFilters = document.getElementById('clearEmptyFilters');

    function scrollToSection(id) { const target = document.getElementById(id); if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' }); if (mobileNav) { mobileNav.classList.add('hidden'); navToggleIcon.className = 'fas fa-bars'; } state.section = id; updateNavState(); }
    function updateNavState() { document.querySelectorAll('.js-scroll-link').forEach((link) => { const active = link.dataset.scrollTarget === state.section; link.classList.toggle('text-[#0e4f5c]', active); link.classList.toggle('font-semibold', active); if (!active && link.closest('nav')) link.classList.add('text-slate-500'); }); }


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
    document.addEventListener('click', (event) => { const focusButton = event.target.closest('.js-focus-card'); if (focusButton) { const card = document.getElementById(`explore-card-${focusButton.dataset.cardId}`); if (card) { document.querySelectorAll('[data-explore-card]').forEach((el) => el.classList.remove('ring-2', 'ring-[#0e4f5c]', 'ring-offset-2', 'ring-offset-[#f0f5f7]')); card.classList.add('ring-2', 'ring-[#0e4f5c]', 'ring-offset-2', 'ring-offset-[#f0f5f7]'); card.scrollIntoView({ behavior: 'smooth', block: 'center' }); } });
    document.addEventListener('keydown', (event) => { if (event.key === 'Escape') { mobileNav.classList.add('hidden'); navToggleIcon.className = 'fas fa-bars'; closeProfileDropdown(); } });
    const sections = ['home', 'explore', 'plan', 'reviews', 'about'].map((id) => document.getElementById(id)).filter(Boolean);
    const observer = new IntersectionObserver((entries) => { entries.forEach((entry) => { if (entry.isIntersecting) { state.section = entry.target.id; updateNavState(); } }); }, { rootMargin: '-35% 0px -45% 0px', threshold: 0.15 });
    sections.forEach((section) => observer.observe(section));
    setCategory('all'); updateNavState();
    initFeedback();
});

// ═══ TRIP PLANNER ═══

const attractions = [
    // Beaches & Coastal
    { id: 1, name: 'Dahican Beach', location: 'Mati City', description: 'Wide sandy shoreline known for surfing, swimming, and horseback riding along the coast.', image: 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1200&auto=format&fit=crop', interests: ['beaches', 'adventure', 'relaxation'], budget: ['budget', 'mid', 'premium'], timeSlot: 'morning', duration: '3-4h', rating: 4.8 },
    { id: 2, name: 'Bobon Beach', location: 'Mati City', description: 'A quieter beach option with calm waters, ideal for family picnics and leisurely swimming.', image: 'https://images.unsplash.com/photo-1559827291-2650b44c3c7b?q=80&w=1200&auto=format&fit=crop', interests: ['beaches', 'relaxation', 'family'], budget: ['budget', 'mid'], timeSlot: 'morning', duration: '3-4h', rating: 4.5 },
    { id: 3, name: 'Pujada Bay Viewpoint', location: 'Mati City', description: 'Scenic viewpoint overlooking Pujada Bay with panoramic island views and a relaxing breeze.', image: 'https://images.unsplash.com/photo-1505228395891-9a51e7e86bf6?q=80&w=1200&auto=format&fit=crop', interests: ['beaches', 'nature', 'relaxation'], budget: ['budget', 'mid'], timeSlot: 'afternoon', duration: '1-2h', rating: 4.6 },
    { id: 4, name: 'Lavigan Beach', location: 'Mati City', description: 'Secluded stretch of white sand with crystal clear waters, perfect for a peaceful day trip.', image: 'https://images.unsplash.com/photo-1506953823976-52e1fdc0149a?q=80&w=1200&auto=format&fit=crop', interests: ['beaches', 'relaxation', 'nature'], budget: ['budget', 'mid'], timeSlot: 'morning', duration: '3-4h', rating: 4.7 },

    // Islands
    { id: 5, name: 'Sleeping Dinosaur Island', location: 'Mati City', description: 'Unique island formation shaped like a sleeping dinosaur, accessible by boat from Mati.', image: 'https://images.unsplash.com/photo-1503785640985-f62e3aeee448?q=80&w=1200&auto=format&fit=crop', interests: ['islands', 'nature', 'adventure'], budget: ['mid', 'premium'], timeSlot: 'morning', duration: '4-5h', rating: 4.8 },
    { id: 6, name: 'Wanat Island', location: 'Mati City', description: 'Small island paradise with pristine beaches and excellent snorkeling opportunities.', image: 'https://images.unsplash.com/photo-1504639725590-34d0984388bd?q=80&w=1200&auto=format&fit=crop', interests: ['islands', 'beaches', 'adventure'], budget: ['mid', 'premium'], timeSlot: 'morning', duration: '4-5h', rating: 4.7 },

    // Nature & Waterfalls
    { id: 7, name: 'Aliwagwag Falls', location: 'Cateel', description: 'A breathtaking multi-tiered waterfall with 130 cascading tiers, one of the tallest in the Philippines.', image: 'https://images.unsplash.com/photo-1439066615861-d1af74d74000?q=80&w=1200&auto=format&fit=crop', interests: ['nature', 'adventure'], budget: ['budget', 'mid', 'premium'], timeSlot: 'morning', duration: '3-4h', rating: 4.9 },
    { id: 8, name: 'Oakwood Falls', location: 'Cateel', description: 'Secluded waterfall surrounded by lush greenery, ideal for nature lovers and photographers.', image: 'https://images.unsplash.com/photo-1496551891748-9e5f3b3e9b6e?q=80&w=1200&auto=format&fit=crop', interests: ['nature'], budget: ['budget', 'mid'], timeSlot: 'morning', duration: '2-3h', rating: 4.5 },
    { id: 9, name: 'Subangan Museum', location: 'Mati City', description: 'Provincial museum showcasing the natural history, culture, and marine biodiversity of Davao Oriental.', image: 'https://images.unsplash.com/photo-1566125882500-87e10f726cdc?q=80&w=1200&auto=format&fit=crop', interests: ['culture', 'nature', 'educational'], budget: ['budget', 'mid'], timeSlot: 'afternoon', duration: '2-3h', rating: 4.6 },

    // Mountains & Hiking
    { id: 10, name: 'Mt. Hamiguitan Range', location: 'San Isidro', description: 'UNESCO World Heritage site featuring unique pygmy forest, diverse wildlife, and challenging trails.', image: 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1200&auto=format&fit=crop', interests: ['mountains', 'nature', 'hiking', 'educational'], budget: ['mid', 'premium'], timeSlot: 'morning', duration: '5-7h', rating: 4.9 },
    { id: 11, name: 'Mt. Kampalili', location: 'Boston', description: 'A challenging mountain trek with rewarding views of the Pacific Ocean and surrounding landscapes.', image: 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=1200&auto=format&fit=crop', interests: ['mountains', 'hiking', 'adventure'], budget: ['mid', 'premium'], timeSlot: 'morning', duration: '6-8h', rating: 4.7 },

    // Culture & Heritage
    { id: 12, name: 'Davao Oriental Capitol', location: 'Mati City', description: 'Historic provincial capitol building with distinctive architecture and a central plaza for evening walks.', image: 'https://images.unsplash.com/photo-1558636508-e0db3814bd1d?q=80&w=1200&auto=format&fit=crop', interests: ['culture', 'relaxation'], budget: ['budget'], timeSlot: 'afternoon', duration: '1-2h', rating: 4.3 },
    { id: 13, name: 'Mati Central Plaza', location: 'Mati City', description: 'Town plaza surrounded by heritage buildings, perfect for an evening stroll and people-watching.', image: 'https://images.unsplash.com/photo-1578895107050-5b1e5354ded3?q=80&w=1200&auto=format&fit=crop', interests: ['culture', 'relaxation', 'food'], budget: ['budget'], timeSlot: 'evening', duration: '1-2h', rating: 4.3 },

    // Food & Local Cuisine
    { id: 14, name: 'Marang & Local Sweets', location: 'Mati Public Market', description: 'Sample the famous Marang fruit and other local delicacies at the bustling public market.', image: 'https://images.unsplash.com/photo-1498837167922-ddd27525d352?q=80&w=1200&auto=format&fit=crop', interests: ['food', 'culture'], budget: ['budget', 'mid'], timeSlot: 'afternoon', duration: '1-2h', rating: 4.6 },
    { id: 15, name: 'Mati Seafood Grill', location: 'Mati City', description: 'Fresh seafood grilled to perfection along the coast, featuring the catch of the day.', image: 'https://images.unsplash.com/photo-1559847844-5315695dadae?q=80&w=1200&auto=format&fit=crop', interests: ['food', 'relaxation'], budget: ['mid', 'premium'], timeSlot: 'evening', duration: '1-2h', rating: 4.5 },
    { id: 16, name: 'Budbod & Local Eateries', location: 'Mati City', description: 'Try budbod (local rice cake) and other Davao Oriental specialties at roadside eateries.', image: 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?q=80&w=1200&auto=format&fit=crop', interests: ['food'], budget: ['budget'], timeSlot: 'morning', duration: '1h', rating: 4.4 },

    // Adventure
    { id: 17, name: 'Dahican Surfing Lesson', location: 'Mati City', description: 'Catch waves at Dahican Beach with local surf instructors for an unforgettable experience.', image: 'https://images.unsplash.com/photo-1502680390469-be75c86b636f?q=80&w=1200&auto=format&fit=crop', interests: ['adventure', 'beaches'], budget: ['mid', 'premium'], timeSlot: 'morning', duration: '2-3h', rating: 4.7 },
    { id: 18, name: 'Island Hopping Tour', location: 'Mati City', description: 'Explore the islands of Pujada Bay including Sleeping Dinosaur and Wanat Island.', image: 'https://images.unsplash.com/photo-1537956965359-7573183d1f57?q=80&w=1200&auto=format&fit=crop', interests: ['adventure', 'islands', 'beaches'], budget: ['mid', 'premium'], timeSlot: 'morning', duration: '5-6h', rating: 4.8 },

    // Educational
    { id: 19, name: 'Davao Oriental Eco-Tour', location: 'Province-wide', description: 'Guided educational tour covering biodiversity hotspots and conservation areas.', image: 'https://images.unsplash.com/photo-1559827291-2650b44c3c7b?q=80&w=1200&auto=format&fit=crop', interests: ['educational', 'nature'], budget: ['mid', 'premium'], timeSlot: 'morning', duration: '4-6h', rating: 4.6 },
    { id: 20, name: 'Mati City Heritage Walk', location: 'Mati City', description: 'Walk through Mati\'s historic streets and learn about its rich cultural heritage.', image: 'https://images.unsplash.com/photo-1569517282132-25d22f4573e6?q=80&w=1200&auto=format&fit=crop', interests: ['educational', 'culture'], budget: ['budget', 'mid'], timeSlot: 'afternoon', duration: '2-3h', rating: 4.4 },

    // Evening & Sunset
    { id: 21, name: 'Sunset at Dahican', location: 'Mati City', description: 'Watch the sunset paint the sky in vibrant colors while enjoying the ocean breeze.', image: 'https://images.unsplash.com/photo-1503803548695-c2a7b4a5b875?q=80&w=1200&auto=format&fit=crop', interests: ['relaxation', 'beaches', 'nature'], budget: ['budget'], timeSlot: 'evening', duration: '1-2h', rating: 4.9 },
    { id: 22, name: 'Pujada Bay Night Market', location: 'Mati City', description: 'Experience local night market with street food, souvenirs, and live entertainment.', image: 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?q=80&w=1200&auto=format&fit=crop', interests: ['food', 'culture', 'relaxation'], budget: ['budget', 'mid'], timeSlot: 'evening', duration: '2-3h', rating: 4.4 },
];

const durationLabels = {
    'day-tour': { label: 'Day Tour', days: 1, slotsPerDay: 2 },
    '2-days': { label: '2 Days / 1 Night', days: 2, slotsPerDay: 3 },
    '3-days': { label: '3 Days / 2 Nights', days: 3, slotsPerDay: 3 },
    '4-days': { label: '4 Days / 3 Nights', days: 4, slotsPerDay: 3 },
    '5-plus': { label: '5+ Days', days: 5, slotsPerDay: 3 },
};

const timeSlots = ['morning', 'afternoon', 'evening'];
const timeSlotLabels = { morning: 'Morning', afternoon: 'Afternoon', evening: 'Evening' };
const timeSlotIcons = { morning: 'fa-sun', afternoon: 'fa-cloud-sun', evening: 'fa-moon' };

function getPreferences() {
    const active = document.querySelectorAll('.pref-btn-active');
    const prefs = {};
    active.forEach(btn => {
        const group = btn.closest('[id^="pref-"]') || btn.parentElement;
        const groupName = group.id.replace('pref-', '');
        if (!prefs[groupName]) prefs[groupName] = [];
        prefs[groupName].push(btn.dataset.value);
    });
    return prefs;
}

function selectDefaultPreferences() {
    // Select first option in each group
    document.querySelectorAll('#pref-duration .pref-btn, #pref-type .pref-btn, #pref-budget .pref-btn, #pref-transport .pref-btn').forEach(btn => {
        if (btn.dataset.value === 'day-tour' || btn.dataset.value === 'solo' || btn.dataset.value === 'budget' || btn.dataset.value === 'either') {
            btn.classList.add('pref-btn-active', 'bg-[#0e4f5c]', 'text-white', 'border-[#0e4f5c]');
        }
    });
}

function clearPreferences() {
    document.querySelectorAll('.pref-btn-active').forEach(btn => {
        btn.classList.remove('pref-btn-active', 'bg-[#0e4f5c]', 'text-white', 'border-[#0e4f5c]');
    });
}

function resetPreferences() {
    clearPreferences();
    selectDefaultPreferences();
    document.getElementById('itinerary-empty').classList.remove('hidden');
    document.getElementById('itinerary-generated').classList.add('hidden');
    document.getElementById('trip-stats-card').classList.add('hidden');
    document.getElementById('itinerary-generated').innerHTML = '';
}

function pickAttractions(prefs, count) {
    const interests = prefs.interests || ['beaches', 'nature'];
    const budget = prefs.budget ? prefs.budget[0] : 'budget';
    const durationInfo = durationLabels[prefs.duration ? prefs.duration[0] : 'day-tour'];
    const travelType = prefs.type ? prefs.type[0] : 'solo';

    // Filter by interests (OR logic - match any interest)
    let pool = attractions.filter(a =>
        a.interests.some(i => interests.includes(i)) &&
        a.budget.includes(budget)
    );

    // If pool is empty, fallback to budget-only
    if (pool.length === 0) {
        pool = attractions.filter(a => a.budget.includes(budget));
    }

    // If still empty, use all
    if (pool.length === 0) {
        pool = [...attractions];
    }

    // Score and pick diverse attractions
    const scored = pool.map(a => {
        let score = 0;
        const matchedInterests = a.interests.filter(i => interests.includes(i)).length;
        score += matchedInterests * 10;
        score += a.rating * 2;
        return { ...a, score };
    });

    scored.sort((a, b) => b.score - a.score);

    const selected = [];
    const usedNames = new Set();
    const totalSlots = durationInfo.days * durationInfo.slotsPerDay;

    // Distribute picks across time slots
    const picksPerSlot = Math.ceil(totalSlots / timeSlots.length);
    const slotCounts = { morning: 0, afternoon: 0, evening: 0 };

    // Add variety by cycling through top picks
    const topPicks = scored.filter(a => !usedNames.has(a.name));
    let pickIndex = 0;

    for (let day = 1; day <= durationInfo.days && selected.length < totalSlots; day++) {
        const slotsForDay = day === 1 && durationInfo.days === 1 ? 2 : durationInfo.slotsPerDay;
        for (let s = 0; s < timeSlots.length && selected.length < totalSlots; s++) {
            const slot = timeSlots[s];
            if (s >= slotsForDay) break;

            // Find best match for this time slot
            let best = null;
            let bestScore = -1;
            let attempts = 0;

            for (const a of topPicks) {
                if (usedNames.has(a.name)) continue;
                if (a.timeSlot === slot || attempts > topPicks.length / 2) {
                    const score = a.score;
                    if (score > bestScore) {
                        bestScore = score;
                        best = a;
                    }
                }
                attempts++;
            }

            if (!best) {
                // Fallback: pick any unused
                best = topPicks.find(a => !usedNames.has(a.name));
            }

            if (best) {
                selected.push({ ...best, day, timeSlot: slot, dayLabel: durationInfo.days > 1 ? `Day ${day}` : '' });
                usedNames.add(best.name);
                slotCounts[slot]++;
            }
        }
    }

    return { selected, durationInfo, travelType };
}

function renderItinerary(data) {
    const { selected, durationInfo, travelType } = data;

    if (selected.length === 0) {
        document.getElementById('itinerary-empty').classList.remove('hidden');
        document.getElementById('itinerary-generated').classList.add('hidden');
        return;
    }

    document.getElementById('itinerary-empty').classList.add('hidden');
    const container = document.getElementById('itinerary-generated');
    container.classList.remove('hidden');

    const days = [...new Set(selected.map(a => a.day))].sort();
    const totalEstimate = Math.round(selected.reduce((sum, a) => {
        const budget = durationInfo.label.includes('Premium') || a.budget.includes('premium') ? 1500 : a.budget.includes('mid') ? 800 : 300;
        return sum + budget;
    }, 0));

    let html = `
        <div class="flex items-center justify-between gap-4 mb-5">
            <h3 class="text-lg font-bold text-slate-900">Your ${durationInfo.label} Itinerary</h3>
            <div class="flex gap-2">
                <button type="button" onclick="buildItinerary()" class="text-xs font-semibold text-[#0e4f5c] hover:text-[#0a3d47] flex items-center gap-1 px-3 py-1.5 rounded-full border border-[#0e4f5c]/30 hover:bg-[#0e4f5c]/5 transition">
                    <i class="fas fa-rotate"></i> Regenerate
                </button>
            </div>
        </div>`;

    days.forEach(day => {
        const dayItems = selected.filter(a => a.day === day);
        html += `<div class="mb-6 last:mb-0">`;
        if (durationInfo.days > 1) {
            html += `<h4 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-3">Day ${day}</h4>`;
        }
        html += `<div class="space-y-3">`;
        dayItems.forEach(item => {
            const icon = timeSlotIcons[item.timeSlot] || 'fa-clock';
            html += `
                <div class="flex gap-3 sm:gap-4 rounded-2xl border border-slate-200 p-4 bg-slate-50/60">
                    <div class="w-20 shrink-0 text-center">
                        <div class="inline-flex items-center justify-center gap-1 px-3 py-1 rounded-full bg-white border border-slate-200 text-[11px] font-bold text-[#0e4f5c]">
                            <i class="fas ${icon} text-[10px]"></i>
                            ${timeSlotLabels[item.timeSlot]}
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-3 flex-wrap">
                            <div>
                                <h4 class="text-sm font-bold text-slate-900">${item.name}</h4>
                                <p class="text-xs text-slate-400 mt-0.5"><i class="fas fa-location-dot mr-1"></i>${item.location}</p>
                            </div>
                            <span class="text-xs font-semibold text-slate-400 whitespace-nowrap">
                                <i class="fas fa-star text-amber-400 mr-0.5"></i>${item.rating}
                                <span class="ml-2 text-slate-300">${item.duration}</span>
                            </span>
                        </div>
                        <p class="mt-2 text-xs sm:text-sm text-slate-500 leading-5">${item.description}</p>
                    </div>
                </div>`;
        });
        html += `</div></div>`;
    });

    html += `
        <div class="mt-6 pt-5 border-t border-slate-100">
            <div class="flex flex-wrap items-center gap-3 text-xs">
                <span class="px-3 py-1.5 rounded-full bg-teal-50 text-teal-700 font-semibold flex items-center gap-1.5">
                    <i class="fas fa-tag"></i> Est. Budget: ₱${totalEstimate.toLocaleString()}
                </span>
                <span class="px-3 py-1.5 rounded-full bg-slate-50 text-slate-600 font-semibold flex items-center gap-1.5">
                    <i class="fas fa-users"></i> ${travelType.charAt(0).toUpperCase() + travelType.slice(1)}
                </span>
                <span class="px-3 py-1.5 rounded-full bg-slate-50 text-slate-600 font-semibold flex items-center gap-1.5">
                    <i class="fas fa-location-dot"></i> ${selected.length} stops
                </span>
            </div>
        </div>`;

    container.innerHTML = html;

    // Update stats sidebar
    const statsCard = document.getElementById('trip-stats-card');
    const statsContent = document.getElementById('trip-stats-content');
    statsCard.classList.remove('hidden');

    const interestCounts = {};
    selected.forEach(a => {
        a.interests.forEach(i => {
            interestCounts[i] = (interestCounts[i] || 0) + 1;
        });
    });
    const topInterest = Object.entries(interestCounts).sort((a, b) => b[1] - a[1])[0];
    const interestLabels = { beaches: 'Beach', nature: 'Nature', islands: 'Island', mountains: 'Mountain', culture: 'Culture', food: 'Food', adventure: 'Adventure', relaxation: 'Relax', hiking: 'Hiking', educational: 'Educational' };

    statsContent.innerHTML = `
        <div class="flex items-center justify-between">
            <span class="text-slate-400">Duration</span>
            <span class="font-semibold text-slate-900">${durationInfo.label}</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-slate-400">Attractions</span>
            <span class="font-semibold text-slate-900">${selected.length}</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-slate-400">Budget Est.</span>
            <span class="font-semibold text-[#0e4f5c]">₱${totalEstimate.toLocaleString()}</span>
        </div>
        ${topInterest ? `
        <div class="flex items-center justify-between">
            <span class="text-slate-400">Focus</span>
            <span class="font-semibold text-slate-900">${interestLabels[topInterest[0]] || 'Mixed'}</span>
        </div>` : ''}
    `;
}

function buildItinerary() {
    const prefs = getPreferences();

    // Ensure defaults for unselected
    if (!prefs.duration || prefs.duration.length === 0) prefs.duration = ['day-tour'];
    if (!prefs.type || prefs.type.length === 0) prefs.type = ['solo'];
    if (!prefs.budget || prefs.budget.length === 0) prefs.budget = ['budget'];
    if (!prefs.transport || prefs.transport.length === 0) prefs.transport = ['either'];
    if (!prefs.interests || prefs.interests.length === 0) {
        prefs.interests = ['beaches', 'nature', 'food'];
    }

    const result = pickAttractions(prefs);
    renderItinerary(result);
}

// Preference button toggling
document.querySelectorAll('.pref-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const group = this.closest('[id^="pref-"]');
        const groupName = group.id.replace('pref-', '');

        // For multi-select groups (interests), allow multiple selections
        if (groupName === 'interests') {
            this.classList.toggle('pref-btn-active');
            this.classList.toggle('bg-[#0e4f5c]');
            this.classList.toggle('text-white');
            this.classList.toggle('border-[#0e4f5c]');
            return;
        }

        // For single-select groups, remove active from siblings
        group.querySelectorAll('.pref-btn').forEach(b => {
            b.classList.remove('pref-btn-active', 'bg-[#0e4f5c]', 'text-white', 'border-[#0e4f5c]');
        });
        this.classList.add('pref-btn-active', 'bg-[#0e4f5c]', 'text-white', 'border-[#0e4f5c]');
    });
});

// Select defaults on load
selectDefaultPreferences();

// ═══ PUBLIC TOURIST FEEDBACK SYSTEM ═══

const establishments = [
    'Blue Bless Resort', 'Botona Beach Resort', 'Mati Marina Hotel',
    'Aliwagwag Eco Lodge', 'Pujada Bay Diving Center', 'Cateel Heritage Cafe'
];

const mockReviews = [
    { id: 1, name: 'A. Santos', rating: 5, text: 'The layout is easy to scan, and the destination cards are grouped clearly by category and travel purpose.', establishment: 'Blue Bless Resort', date: '2026-06-25' },
    { id: 2, name: 'M. Rivera', rating: 5, text: 'The planning section makes the itinerary flow simple to follow without adding unnecessary steps.', establishment: 'Mati Marina Hotel', date: '2026-06-22' },
    { id: 3, name: 'J. Cruz', rating: 4, text: 'The Explore filters and badges are enough for a prototype and still keep the interface clean.', establishment: 'Aliwagwag Eco Lodge', date: '2026-06-18' },
    { id: 4, name: 'K. Tanaka', rating: 5, text: 'Beautiful beaches and well-organized information. Made planning my trip very easy!', establishment: 'Blue Bless Resort', date: '2026-06-15' },
    { id: 5, name: 'M. Santos', rating: 4, text: 'Great selection of accredited establishments. The verification badges give peace of mind.', establishment: 'Botona Beach Resort', date: '2026-06-12' },
    { id: 6, name: 'R. Mendoza', rating: 3, text: 'Good starting point for tourism information. Would love to see more detailed itineraries.', establishment: 'Pujada Bay Diving Center', date: '2026-06-08' },
    { id: 7, name: 'L. Gomez', rating: 5, text: 'The emergency contacts section is very helpful for first-time visitors like me.', establishment: 'Cateel Heritage Cafe', date: '2026-06-05' },
    { id: 8, name: 'P. Cruz', rating: 4, text: 'Easy to navigate and visually appealing. The map feature is a nice touch.', establishment: 'Mati Marina Hotel', date: '2026-06-01' },
    { id: 9, name: 'S. Lee', rating: 5, text: 'Exceptional platform! Found all the information I needed for my Davao Oriental trip.', establishment: 'Blue Bless Resort', date: '2026-05-28' },
    { id: 10, name: 'A. Reyes', rating: 4, text: 'User-friendly interface with comprehensive destination coverage.', establishment: 'Botona Beach Resort', date: '2026-05-25' },
];

let reviews = [];
let displayCount = 4;
const loadMoreCount = 4;
let sortBy = 'recent';

function formatDate(dateStr) {
    const d = new Date(dateStr);
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    return `${months[d.getMonth()]} ${d.getDate()}, ${d.getFullYear()}`;
}

function getStarsHtml(rating) {
    let html = '';
    for (let i = 1; i <= 5; i++) {
        html += `<i class="fas fa-star ${i <= rating ? 'text-amber-400' : 'text-slate-200'}"></i>`;
    }
    return html;
}

function getSortedReviews() {
    const sorted = [...reviews];
    if (sortBy === 'recent') {
        sorted.sort((a, b) => new Date(b.date) - new Date(a.date));
    } else if (sortBy === 'highest') {
        sorted.sort((a, b) => b.rating - a.rating);
    } else if (sortBy === 'lowest') {
        sorted.sort((a, b) => a.rating - b.rating);
    }
    return sorted;
}

function renderSummary(sortedReviews) {
    const total = sortedReviews.length;
    if (total === 0) return '';

    const avg = (sortedReviews.reduce((sum, r) => sum + r.rating, 0) / total).toFixed(1);
    const dist = { 5: 0, 4: 0, 3: 0, 2: 0, 1: 0 };
    sortedReviews.forEach(r => { if (dist[r.rating] !== undefined) dist[r.rating]++; });

    let barsHtml = '';
    for (let i = 5; i >= 1; i--) {
        const pct = total > 0 ? Math.round((dist[i] / total) * 100) : 0;
        barsHtml += `
            <div class="flex items-center gap-2 text-xs">
                <span class="font-semibold text-slate-500 w-3">${i}</span>
                <i class="fas fa-star text-amber-400 text-[10px]"></i>
                <div class="flex-1 h-2 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-amber-400 rounded-full transition-all" style="width:${pct}%"></div>
                </div>
                <span class="text-slate-400 w-8 text-right font-medium">${dist[i]}</span>
            </div>`;
    }

    return `
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-6">
            <div class="flex flex-col sm:flex-row gap-6 sm:gap-10">
                <div class="text-center sm:text-left shrink-0">
                    <div class="text-5xl font-extrabold text-slate-900">${avg}</div>
                    <div class="flex items-center gap-0.5 justify-center sm:justify-start mt-1 text-sm">${getStarsHtml(Math.round(parseFloat(avg)))}</div>
                    <p class="text-sm text-slate-400 font-medium mt-1">${total} review${total !== 1 ? 's' : ''}</p>
                </div>
                <div class="flex-1 space-y-1.5 max-w-xs">
                    ${barsHtml}
                </div>
            </div>
        </div>`;
}

function renderReviews(sortedReviews) {
    const toShow = sortedReviews.slice(0, displayCount);
    const hasMore = displayCount < sortedReviews.length;

    if (toShow.length === 0) {
        document.getElementById('feedback-empty').classList.remove('hidden');
        document.getElementById('feedback-container').innerHTML = '';
        return;
    }
    document.getElementById('feedback-empty').classList.add('hidden');

    let html = `
        <div class="flex items-center justify-between gap-4 mb-4 flex-wrap">
            <p class="text-sm text-slate-500 font-medium">Showing ${toShow.length} of ${sortedReviews.length} review${sortedReviews.length !== 1 ? 's' : ''}</p>
            <select onchange="changeSort(this.value)" class="border border-slate-200 rounded-full px-4 py-1.5 text-xs font-semibold text-slate-600 bg-white focus:outline-none focus:ring-2 focus:ring-[#0e4f5c]/30 transition-all">
                <option value="recent" ${sortBy === 'recent' ? 'selected' : ''}>Most Recent</option>
                <option value="highest" ${sortBy === 'highest' ? 'selected' : ''}>Highest Rating</option>
                <option value="lowest" ${sortBy === 'lowest' ? 'selected' : ''}>Lowest Rating</option>
            </select>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">`;

    toShow.forEach(r => {
        const nameDisplay = r.name ? r.name : 'Anonymous';
        html += `
            <article class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 flex flex-col">
                <div class="flex items-center justify-between gap-3 mb-3">
                    <div class="flex items-center gap-1 text-sm">${getStarsHtml(r.rating)}</div>
                    <span class="text-[10px] font-semibold text-slate-400 whitespace-nowrap">${formatDate(r.date)}</span>
                </div>
                <p class="text-sm text-slate-600 leading-6 flex-1">${r.text}</p>
                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between gap-4">
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">${nameDisplay}</h3>
                        <p class="text-xs text-slate-400">${r.establishment}</p>
                    </div>
                </div>
            </article>`;
    });

    html += `</div>`;

    if (hasMore) {
        html += `
            <div class="text-center mt-6">
                <button type="button" onclick="loadMoreReviews()"
                    class="inline-flex items-center gap-2 border-2 border-slate-200 hover:border-[#0e4f5c] text-slate-500 hover:text-[#0e4f5c] px-6 py-2.5 rounded-full text-sm font-bold transition-all">
                    <i class="fas fa-chevron-down text-[11px]"></i>
                    Load More Reviews
                </button>
            </div>`;
    }

    document.getElementById('feedback-container').innerHTML = html;
}

function renderFeedback() {
    const sorted = getSortedReviews();
    const summaryHtml = renderSummary(sorted);
    const container = document.getElementById('feedback-container');
    container.innerHTML = summaryHtml;
    renderReviews(sorted);
}

function loadMoreReviews() {
    displayCount += loadMoreCount;
    renderFeedback();
}

function changeSort(value) {
    sortBy = value;
    displayCount = loadMoreCount;
    renderFeedback();
}

function openFeedbackForm() {
    const modal = document.getElementById('feedbackModal');
    modal.classList.remove('hidden');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeFeedbackForm() {
    const modal = document.getElementById('feedbackModal');
    modal.classList.add('hidden');
    modal.style.display = 'none';
    document.body.style.overflow = '';
}

function submitFeedback() {
    const name = document.getElementById('feedback-name').value.trim();
    const establishment = document.getElementById('feedback-establishment').value;
    const rating = parseInt(document.getElementById('feedback-rating').value);
    const text = document.getElementById('feedback-text').value.trim();

    if (!establishment) { alert('Please select an establishment.'); return; }
    if (!rating) { alert('Please select a rating.'); return; }
    if (!text) { alert('Please write your review.'); return; }

    const newReview = {
        id: reviews.length > 0 ? Math.max(...reviews.map(r => r.id)) + 1 : 1,
        name: name || '',
        rating: rating,
        text: text,
        establishment: establishment,
        date: new Date().toISOString().split('T')[0],
    };

    reviews.unshift(newReview);
    displayCount = loadMoreCount;
    renderFeedback();
    closeFeedbackForm();
    document.getElementById('feedback-name').value = '';
    document.getElementById('feedback-establishment').value = '';
    document.getElementById('feedback-rating').value = '0';
    document.getElementById('feedback-text').value = '';
    updateStarDisplay(0);
    document.getElementById('feedback-chars').textContent = '0';

    const container = document.getElementById('reviews');
    container.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function updateStarDisplay(rating) {
    document.querySelectorAll('.star-btn').forEach(star => {
        const val = parseInt(star.dataset.value);
        star.classList.toggle('text-amber-400', val <= rating);
        star.classList.toggle('text-slate-200', val > rating);
    });
}

function initFeedback() {
    reviews = [...mockReviews];
    displayCount = loadMoreCount;
    renderFeedback();

    document.querySelectorAll('.star-btn').forEach(star => {
        star.addEventListener('click', () => {
            const val = parseInt(star.dataset.value);
            document.getElementById('feedback-rating').value = val;
            updateStarDisplay(val);
        });
        star.addEventListener('mouseenter', () => {
            const val = parseInt(star.dataset.value);
            document.querySelectorAll('.star-btn').forEach(s => {
                const sv = parseInt(s.dataset.value);
                s.classList.toggle('text-amber-400', sv <= val);
                s.classList.toggle('text-slate-200', sv > val);
            });
        });
        star.addEventListener('mouseleave', () => {
            const current = parseInt(document.getElementById('feedback-rating').value);
            updateStarDisplay(current);
        });
    });

    document.getElementById('feedback-text').addEventListener('input', function () {
        document.getElementById('feedback-chars').textContent = this.value.length;
    });

    document.getElementById('feedbackModal').addEventListener('click', function (event) {
        if (event.target === this) closeFeedbackForm();
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeFeedbackForm();
    });
}

</script>
@endsection
