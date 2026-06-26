@extends('PTOAdmin.layout', ['activePage' => 'dashboard'])

@section('title', 'iTOUR - Provincial Tourism Dashboard')

@section('admin-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Provincial Tourism Dashboard</h1>
            <p class="text-sm text-slate-500 mt-1">Real-time overview of tourist arrivals, establishment health, and visitor satisfaction across Davao Oriental.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="bg-white border border-slate-200 text-slate-700 px-4 py-2 text-sm font-semibold rounded-[6px] hover:bg-slate-50 transition flex items-center gap-2 shadow-xs">
                <i class="fas fa-arrow-down text-xs"></i> Export
            </button>
            <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-sm font-semibold rounded-[6px] transition flex items-center gap-2 shadow-sm">
                <i class="fas fa-plus text-xs"></i> Quick Action
            </button>
        </div>
    </div>

    <!-- Stats Grid Row 1 -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Total Tourist Arrivals</span>
            <div class="flex items-baseline justify-between mt-4">
                <span class="text-3xl font-extrabold text-slate-800 tracking-tight">12,847</span>
                <span class="bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-[4px] text-[10px] font-bold flex items-center gap-0.5 shadow-2xs">
                    ▲ 12% <span class="text-slate-400 font-normal">YTD</span>
                </span>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Local Tourists</span>
            <div class="flex items-baseline justify-between mt-4">
                <span class="text-3xl font-extrabold text-slate-800 tracking-tight">10,356</span>
                <span class="bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-[4px] text-[10px] font-bold flex items-center gap-0.5 shadow-2xs">
                    ▲ 10%
                </span>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Foreign Tourists</span>
            <div class="flex items-baseline justify-between mt-4">
                <span class="text-3xl font-extrabold text-slate-800 tracking-tight">2,491</span>
                <span class="bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-[4px] text-[10px] font-bold flex items-center gap-0.5 shadow-2xs">
                    ▲ 18%
                </span>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Tourist Satisfaction</span>
            <div class="flex flex-col mt-4">
                <span class="text-3xl font-extrabold text-slate-800 tracking-tight leading-none">92%</span>
                <span class="text-xs text-slate-400 font-medium mt-2">from 1,920 reviews</span>
            </div>
        </div>
    </div>

    <!-- Stats Grid Row 2 -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Card 5 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Registered Establishments</span>
            <div class="flex items-baseline mt-4">
                <span class="text-3xl font-extrabold text-slate-800 tracking-tight">87</span>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Verified</span>
            <div class="flex items-baseline mt-4">
                <span class="text-3xl font-extrabold text-slate-800 tracking-tight">74</span>
            </div>
        </div>

        <!-- Card 7 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Pending Applications</span>
            <div class="flex items-baseline mt-4">
                <span class="text-3xl font-extrabold text-slate-800 tracking-tight">8</span>
            </div>
        </div>

        <!-- Card 8 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Average Rating</span>
            <div class="flex flex-col mt-4">
                <span class="text-3xl font-extrabold text-slate-800 tracking-tight leading-none">4.6</span>
                <span class="text-xs text-slate-400 font-medium mt-2">out of 5</span>
            </div>
        </div>
    </div>

    <!-- Charts Layout Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Chart Left -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 lg:col-span-7 flex flex-col justify-between">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">Tourist Arrival Trend (Local vs Foreign)</h3>
                <div class="relative">
                    <select class="appearance-none bg-slate-50 border border-slate-200 text-slate-700 text-xs px-3 py-1.5 pr-8 rounded focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]">
                        <option>Last 8 months</option>
                        <option>Last 12 months</option>
                        <option>This Year</option>
                    </select>
                    <i class="fas fa-chevron-down text-[10px] text-slate-400 absolute right-3 top-2.5 pointer-events-none"></i>
                </div>
            </div>
            
            <!-- SVG Stacked Bar Chart -->
            <div class="h-64 relative w-full mt-4">
                <svg viewBox="0 0 700 240" class="w-full h-full">
                    <!-- Y Axis Grid Lines -->
                    <line x1="50" y1="20" x2="680" y2="20" stroke="#f1f5f9" stroke-width="1.5" />
                    <line x1="50" y1="70" x2="680" y2="70" stroke="#f1f5f9" stroke-width="1.5" />
                    <line x1="50" y1="120" x2="680" y2="120" stroke="#f1f5f9" stroke-width="1.5" />
                    <line x1="50" y1="170" x2="680" y2="170" stroke="#f1f5f9" stroke-width="1.5" />
                    <line x1="50" y1="220" x2="680" y2="220" stroke="#cbd5e1" stroke-width="1.5" />

                    <!-- Y Axis Labels -->
                    <text x="35" y="25" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="end">2000</text>
                    <text x="35" y="75" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="end">1500</text>
                    <text x="35" y="125" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="end">1000</text>
                    <text x="35" y="175" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="end">500</text>
                    <text x="35" y="225" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="end">0</text>

                    <!-- Bars (stacked) -->
                    <!-- Jan: Foreign 350, Local 550. Height factor: val / 2000 * 200 = val * 0.1 -->
                    <!-- Y0 = 220. Foreign H = 35. Local H = 55. -->
                    <rect x="75" y="130" width="35" height="90" rx="3" fill="#0a4e5c" />
                    <rect x="75" y="95" width="35" height="35" rx="3" fill="#207c8d" />

                    <!-- Feb: Foreign 350, Local 600 -->
                    <rect x="150" y="125" width="35" height="95" rx="3" fill="#0a4e5c" />
                    <rect x="150" y="90" width="35" height="35" rx="3" fill="#207c8d" />

                    <!-- Mar: Foreign 400, Local 700 -->
                    <rect x="225" y="110" width="35" height="110" rx="3" fill="#0a4e5c" />
                    <rect x="225" y="70" width="35" height="40" rx="3" fill="#207c8d" />

                    <!-- Apr: Foreign 450, Local 750 -->
                    <rect x="300" y="100" width="35" height="120" rx="3" fill="#0a4e5c" />
                    <rect x="300" y="55" width="35" height="45" rx="3" fill="#207c8d" />

                    <!-- May: Foreign 500, Local 900 -->
                    <rect x="375" y="80" width="35" height="140" rx="3" fill="#0a4e5c" />
                    <rect x="375" y="30" width="35" height="50" rx="3" fill="#207c8d" />

                    <!-- Jun: Foreign 550, Local 1200 -->
                    <rect x="450" y="45" width="35" height="175" rx="3" fill="#0a4e5c" />
                    <rect x="450" y="-10" width="35" height="55" rx="3" fill="#207c8d" />

                    <!-- Jul: Foreign 600, Local 1300 -->
                    <rect x="525" y="30" width="35" height="190" rx="3" fill="#0a4e5c" />
                    <rect x="525" y="-30" width="35" height="60" rx="3" fill="#207c8d" />

                    <!-- Aug: Foreign 550, Local 1150 -->
                    <rect x="600" y="50" width="35" height="170" rx="3" fill="#0a4e5c" />
                    <rect x="600" y="-5" width="35" height="55" rx="3" fill="#207c8d" />

                    <!-- X Axis Labels -->
                    <text x="92" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Jan</text>
                    <text x="167" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Feb</text>
                    <text x="242" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Mar</text>
                    <text x="317" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Apr</text>
                    <text x="392" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">May</text>
                    <text x="467" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Jun</text>
                    <text x="542" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Jul</text>
                    <text x="617" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Aug</text>
                </svg>
            </div>

            <!-- Legend -->
            <div class="flex items-center justify-center gap-6 mt-4">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 bg-[#207c8d] rounded-xs"></span>
                    <span class="text-xs text-slate-500 font-medium">Foreign</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 bg-[#0a4e5c] rounded-xs"></span>
                    <span class="text-xs text-slate-500 font-medium">Local</span>
                </div>
            </div>
        </div>

        <!-- Chart Right -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 lg:col-span-5 flex flex-col justify-between">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">Satisfaction Trend</h3>
            </div>

            <!-- SVG Line Chart -->
            <div class="h-64 relative w-full mt-4">
                <svg viewBox="0 0 500 240" class="w-full h-full">
                    <!-- Y Axis Grid Lines -->
                    <line x1="45" y1="20" x2="480" y2="20" stroke="#f8fafc" stroke-width="1.5" />
                    <line x1="45" y1="70" x2="480" y2="70" stroke="#f1f5f9" stroke-width="1.5" />
                    <line x1="45" y1="120" x2="480" y2="120" stroke="#f1f5f9" stroke-width="1.5" />
                    <line x1="45" y1="170" x2="480" y2="170" stroke="#f1f5f9" stroke-width="1.5" />
                    <line x1="45" y1="220" x2="480" y2="220" stroke="#cbd5e1" stroke-width="1.5" />

                    <!-- Y Axis Labels (80 to 100) -->
                    <text x="35" y="24" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="end">100</text>
                    <text x="35" y="74" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="end">95</text>
                    <text x="35" y="124" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="end">90</text>
                    <text x="35" y="174" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="end">85</text>
                    <text x="35" y="224" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="end">80</text>

                    <!-- Trend Line Curve -->
                    <!-- Points coordinates mapping value V (80..100) -> Y (220..20) where H = 200. Y = 220 - (V - 80) * 10. -->
                    <!-- Jan (88%) -> Y = 140 -->
                    <!-- Feb (89%) -> Y = 130 -->
                    <!-- Mar (90%) -> Y = 120 -->
                    <!-- Apr (91%) -> Y = 110 -->
                    <!-- May (90%) -> Y = 120 -->
                    <!-- Jun (92%) -> Y = 100 -->
                    <!-- Jul (93%) -> Y = 90 -->
                    <!-- Aug (92%) -> Y = 100 -->
                    <!-- X coords: Jan=60, Feb=120, Mar=180, Apr=240, May=300, Jun=360, Jul=420, Aug=480 -->
                    <path d="M 60 140 C 90 135, 90 135, 120 130 C 150 125, 150 125, 180 120 C 210 115, 210 115, 240 110 C 270 115, 270 115, 300 120 C 330 110, 330 110, 360 100 C 390 95, 390 95, 420 90 C 450 95, 450 95, 480 100" 
                          fill="none" stroke="#0f766e" stroke-width="3" stroke-linecap="round" />

                    <!-- Markers -->
                    <circle cx="60" cy="140" r="5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="120" cy="130" r="5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="180" cy="120" r="5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="240" cy="110" r="5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="300" cy="120" r="5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="360" cy="100" r="5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="420" cy="90" r="5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="480" cy="100" r="5" fill="#fff" stroke="#0f766e" stroke-width="2" />

                    <!-- X Axis Labels -->
                    <text x="60" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Jan</text>
                    <text x="120" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Feb</text>
                    <text x="180" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Mar</text>
                    <text x="240" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Apr</text>
                    <text x="300" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">May</text>
                    <text x="360" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Jun</text>
                    <text x="420" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Jul</text>
                    <text x="480" y="238" fill="#94a3b8" font-size="10" font-weight="600" text-anchor="middle">Aug</text>
                </svg>
            </div>
            
            <div class="h-4"></div>
        </div>
    </div>
</div>
@endsection
