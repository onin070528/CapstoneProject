@extends('PTOAdmin.layout', ['activePage' => 'experience-analytics'])

@section('title', 'iTOUR - Experience Analytics')

@section('admin-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Tourist Experience Analytics</h1>
            <p class="text-sm text-slate-500 mt-1">Sentiment, satisfaction, and keyword analysis from real tourist feedback.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="bg-white border border-slate-200 text-slate-700 px-4 py-2 text-sm font-semibold rounded-[6px] hover:bg-slate-50 transition flex items-center gap-2 shadow-xs">
                <i class="fas fa-arrow-down text-xs"></i> Export Report
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Satisfaction Rate</span>
            <div class="flex items-baseline justify-between mt-4">
                <span class="text-3xl font-extrabold text-slate-800 tracking-tight">92%</span>
                <span class="bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-[4px] text-[10px] font-bold flex items-center gap-0.5 shadow-2xs">
                    ▲ 3%
                </span>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Total Reviews</span>
            <div class="flex items-baseline justify-between mt-4">
                <span class="text-3xl font-extrabold text-slate-800 tracking-tight">1,920</span>
                <span class="bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-[4px] text-[10px] font-bold flex items-center gap-0.5 shadow-2xs">
                    ▲ 184 <span class="text-slate-400 font-normal ml-0.5">this month</span>
                </span>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Average Rating</span>
            <div class="flex flex-col mt-4">
                <span class="text-3xl font-extrabold text-slate-800 tracking-tight leading-none">4.6</span>
                <span class="text-xs text-slate-400 font-medium mt-2">out of 5</span>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Response Rate</span>
            <div class="flex flex-col mt-4">
                <span class="text-3xl font-extrabold text-slate-800 tracking-tight leading-none">71%</span>
            </div>
        </div>
    </div>

    <!-- Sentiment and Trend Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Sentiment Analysis Card -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 lg:col-span-6 flex flex-col justify-between">
            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-6">Sentiment Analysis</h3>
            
            <!-- Horizontal Sentiment Bar -->
            <div class="space-y-6 flex-1 flex flex-col justify-center">
                <div class="w-full flex h-8 rounded-lg overflow-hidden shadow-2xs">
                    <!-- Positive 82% -->
                    <div class="bg-emerald-600 flex items-center justify-center text-white text-xs font-bold" style="width: 82%;">
                        82%
                    </div>
                    <!-- Neutral 13% -->
                    <div class="bg-amber-500 flex items-center justify-center text-white text-xs font-bold" style="width: 13%;">
                        13%
                    </div>
                    <!-- Negative 5% -->
                    <div class="bg-rose-600 flex items-center justify-center text-white text-xs font-bold" style="width: 5%;">
                        5%
                    </div>
                </div>

                <!-- Legend -->
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 bg-emerald-600 rounded-full"></span>
                        <span class="text-xs text-slate-600 font-semibold">Positive <span class="text-slate-400 font-medium ml-1">(82)</span></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 bg-amber-500 rounded-full"></span>
                        <span class="text-xs text-slate-600 font-semibold">Neutral <span class="text-slate-400 font-medium ml-1">(13)</span></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 bg-rose-600 rounded-full"></span>
                        <span class="text-xs text-slate-600 font-semibold">Negative <span class="text-slate-400 font-medium ml-1">(5)</span></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Satisfaction Trend Card -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 lg:col-span-6 flex flex-col justify-between">
            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-2">Satisfaction Trend</h3>
            
            <!-- SVG Line Chart (Reused from Dashboard) -->
            <div class="h-48 relative w-full">
                <svg viewBox="0 0 500 180" class="w-full h-full">
                    <!-- Y Axis Grid Lines -->
                    <line x1="45" y1="15" x2="480" y2="15" stroke="#f8fafc" stroke-width="1.5" />
                    <line x1="45" y1="55" x2="480" y2="55" stroke="#f1f5f9" stroke-width="1.5" />
                    <line x1="45" y1="95" x2="480" y2="95" stroke="#f1f5f9" stroke-width="1.5" />
                    <line x1="45" y1="135" x2="480" y2="135" stroke="#f1f5f9" stroke-width="1.5" />
                    <line x1="45" y1="165" x2="480" y2="165" stroke="#cbd5e1" stroke-width="1.5" />

                    <!-- Y Axis Labels (80 to 100) -->
                    <text x="35" y="19" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="end">100</text>
                    <text x="35" y="59" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="end">95</text>
                    <text x="35" y="99" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="end">90</text>
                    <text x="35" y="139" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="end">85</text>
                    <text x="35" y="169" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="end">80</text>

                    <!-- Trend Line Curve -->
                    <!-- Points coordinates mapping value V (80..100) -> Y (165..15) where H = 150. Y = 165 - (V - 80) * 7.5. -->
                    <!-- Jan (88%) -> Y = 105 -->
                    <!-- Feb (89%) -> Y = 97.5 -->
                    <!-- Mar (90%) -> Y = 90 -->
                    <!-- Apr (91%) -> Y = 82.5 -->
                    <!-- May (90%) -> Y = 90 -->
                    <!-- Jun (92%) -> Y = 75 -->
                    <!-- Jul (93%) -> Y = 67.5 -->
                    <!-- Aug (92%) -> Y = 75 -->
                    <!-- X coords: Jan=60, Feb=120, Mar=180, Apr=240, May=300, Jun=360, Jul=420, Aug=480 -->
                    <path d="M 60 105 C 90 101.25, 90 101.25, 120 97.5 C 150 93.75, 150 93.75, 180 90 C 210 86.25, 210 86.25, 240 82.5 C 270 86.25, 270 86.25, 300 90 C 330 82.5, 330 82.5, 360 75 C 390 71.25, 390 71.25, 420 67.5 C 450 71.25, 450 71.25, 480 75" 
                          fill="none" stroke="#0f766e" stroke-width="2.5" stroke-linecap="round" />

                    <!-- Markers -->
                    <circle cx="60" cy="105" r="4.5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="120" cy="97.5" r="4.5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="180" cy="90" r="4.5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="240" cy="82.5" r="4.5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="300" cy="90" r="4.5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="360" cy="75" r="4.5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="420" cy="67.5" r="4.5" fill="#fff" stroke="#0f766e" stroke-width="2" />
                    <circle cx="480" cy="75" r="4.5" fill="#fff" stroke="#0f766e" stroke-width="2" />

                    <!-- X Axis Labels -->
                    <text x="60" y="179" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="middle">Jan</text>
                    <text x="120" y="179" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="middle">Feb</text>
                    <text x="180" y="179" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="middle">Mar</text>
                    <text x="240" y="179" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="middle">Apr</text>
                    <text x="300" y="179" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="middle">May</text>
                    <text x="360" y="179" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="middle">Jun</text>
                    <text x="420" y="179" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="middle">Jul</text>
                    <text x="480" y="179" fill="#94a3b8" font-size="9" font-weight="600" text-anchor="middle">Aug</text>
                </svg>
            </div>
        </div>
    </div>

    <!-- Popular Keywords Card -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6">
        <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-6">Popular Keywords</h3>
        
        <div class="flex flex-wrap gap-3">
            <span class="inline-flex items-center px-4 py-2 rounded-[6px] text-sm font-bold bg-teal-50 text-teal-800 border border-teal-100 shadow-3xs">
                Beautiful <span class="text-teal-500 font-semibold ml-1.5">(412)</span>
            </span>
            <span class="inline-flex items-center px-4 py-2 rounded-[6px] text-sm font-bold bg-teal-50 text-teal-800 border border-teal-100 shadow-3xs">
                Relaxing <span class="text-teal-500 font-semibold ml-1.5">(318)</span>
            </span>
            <span class="inline-flex items-center px-4 py-2 rounded-[6px] text-sm font-bold bg-teal-50 text-teal-800 border border-teal-100 shadow-3xs">
                Friendly <span class="text-teal-500 font-semibold ml-1.5">(287)</span>
            </span>
            <span class="inline-flex items-center px-4 py-2 rounded-[6px] text-sm font-bold bg-teal-50 text-teal-800 border border-teal-100 shadow-3xs">
                Scenic <span class="text-teal-500 font-semibold ml-1.5">(246)</span>
            </span>
            <span class="inline-flex items-center px-4 py-2 rounded-[6px] text-sm font-bold bg-teal-50 text-teal-800 border border-teal-100 shadow-3xs">
                Clean <span class="text-teal-500 font-semibold ml-1.5">(198)</span>
            </span>
            <span class="inline-flex items-center px-4 py-2 rounded-[6px] text-sm font-bold bg-teal-50 text-teal-800 border border-teal-100 shadow-3xs">
                Affordable <span class="text-teal-500 font-semibold ml-1.5">(165)</span>
            </span>
            <span class="inline-flex items-center px-4 py-2 rounded-[6px] text-sm font-bold bg-teal-50 text-teal-800 border border-teal-100 shadow-3xs">
                Adventure <span class="text-teal-500 font-semibold ml-1.5">(142)</span>
            </span>
            <span class="inline-flex items-center px-4 py-2 rounded-[6px] text-sm font-bold bg-teal-50 text-teal-800 border border-teal-100 shadow-3xs">
                Pristine <span class="text-teal-500 font-semibold ml-1.5">(121)</span>
            </span>
        </div>
    </div>
</div>
@endsection
