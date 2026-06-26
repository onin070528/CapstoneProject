@extends('EstablishmentsUsers.layout', ['activePage' => 'dashboard'])

@section('title', 'Blue Bless Resort - Dashboard')

@section('establishment-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Blue Bless Resort · Dashboard</h1>
            <p class="text-sm text-slate-500 mt-1">Overview of your tourist arrivals and engagement this period.</p>
        </div>
    </div>

    <!-- Stats Grid Row 1 -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Arrivals Today</span>
            <div class="flex items-baseline justify-between mt-4">
                <span class="text-4xl font-extrabold text-slate-800 tracking-tight">18</span>
                <span class="bg-emerald-50 text-emerald-600 px-2.5 py-1 rounded-[6px] text-xs font-bold flex items-center gap-1 shadow-2xs">
                    <i class="fas fa-caret-up text-sm"></i> 12%
                </span>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">This Week</span>
            <div class="flex items-baseline justify-between mt-4">
                <span class="text-4xl font-extrabold text-slate-800 tracking-tight">284</span>
                <span class="bg-emerald-50 text-emerald-600 px-2.5 py-1 rounded-[6px] text-xs font-bold flex items-center gap-1 shadow-2xs">
                    <i class="fas fa-caret-up text-sm"></i> 8%
                </span>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">This Month</span>
            <div class="flex items-baseline justify-between mt-4">
                <span class="text-4xl font-extrabold text-slate-800 tracking-tight">1,108</span>
                <span class="bg-emerald-50 text-emerald-600 px-2.5 py-1 rounded-[6px] text-xs font-bold flex items-center gap-1 shadow-2xs">
                    <i class="fas fa-caret-up text-sm"></i> 15%
                </span>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">QR Scans (7D)</span>
            <div class="flex flex-col mt-4">
                <span class="text-4xl font-extrabold text-slate-800 tracking-tight leading-none">312</span>
                <span class="text-xs text-slate-400 font-medium mt-2">conversion 91%</span>
            </div>
        </div>
    </div>

    <!-- Stats Grid Row 2 -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Card 5 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Local Tourists</span>
            <div class="flex items-baseline mt-4">
                <span class="text-4xl font-extrabold text-slate-800 tracking-tight">2</span>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Foreign Tourists</span>
            <div class="flex items-baseline mt-4">
                <span class="text-4xl font-extrabold text-slate-800 tracking-tight">4</span>
            </div>
        </div>

        <!-- Card 7 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Satisfaction Score</span>
            <div class="flex items-baseline justify-between mt-4">
                <span class="text-4xl font-extrabold text-slate-800 tracking-tight">94%</span>
                <span class="bg-emerald-50 text-emerald-600 px-2.5 py-1 rounded-[6px] text-xs font-bold flex items-center gap-1 shadow-2xs">
                    <i class="fas fa-caret-up text-sm"></i> 2%
                </span>
            </div>
        </div>

        <!-- Card 8 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Avg Rating</span>
            <div class="flex flex-col mt-4">
                <span class="text-4xl font-extrabold text-slate-800 tracking-tight leading-none">4.7</span>
                <span class="text-xs text-slate-400 font-medium mt-2">out of 5</span>
            </div>
        </div>
    </div>

    <!-- Charts Layout Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Left: Weekly Arrivals Column -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between lg:col-span-7">
            <div class="flex items-center justify-between">
                <h3 class="font-bold text-slate-800 text-base">Weekly Arrivals</h3>
                <button class="border border-slate-200 rounded-[6px] hover:bg-slate-50 text-slate-600 px-4 py-1.5 text-xs font-semibold tracking-wide transition-colors">
                    Export
                </button>
            </div>

            <!-- Custom High-Fidelity SVG Bar Chart -->
            <div class="mt-8 flex flex-col flex-grow justify-between min-h-[260px] relative">
                <!-- Y-Axis labels & Grid lines -->
                <div class="flex-grow flex flex-col justify-between h-[200px] border-l border-slate-200/80 pl-2 relative">
                    <!-- Gridline background layers -->
                    <div class="absolute inset-0 flex flex-col justify-between pointer-events-none">
                        <div class="w-full border-t border-slate-100"></div>
                        <div class="w-full border-t border-slate-100"></div>
                        <div class="w-full border-t border-slate-100"></div>
                        <div class="w-full border-t border-slate-100"></div>
                        <div class="w-full border-t border-slate-200/80"></div>
                    </div>

                    <!-- Y-Axis Row Values -->
                    <div class="flex items-center text-[10px] font-semibold text-slate-400 -mt-1"><span class="w-6 -ml-8 text-right pr-2">80</span></div>
                    <div class="flex items-center text-[10px] font-semibold text-slate-400"><span class="w-6 -ml-8 text-right pr-2">60</span></div>
                    <div class="flex items-center text-[10px] font-semibold text-slate-400"><span class="w-6 -ml-8 text-right pr-2">40</span></div>
                    <div class="flex items-center text-[10px] font-semibold text-slate-400"><span class="w-6 -ml-8 text-right pr-2">20</span></div>
                    <div class="flex items-center text-[10px] font-semibold text-slate-400 -mb-1.5"><span class="w-6 -ml-8 text-right pr-2">0</span></div>
                </div>

                <!-- Bars container aligned with Y-axis grid -->
                <div class="absolute bottom-0 left-0 right-0 h-[200px] flex items-end justify-around px-4 sm:px-8">
                    <!-- Mon -->
                    <div class="group flex flex-col items-center w-8 sm:w-10 relative">
                        <div class="absolute -top-8 bg-slate-800 text-white text-[10px] font-bold px-1.5 py-0.5 rounded opacity-0 group-hover:opacity-100 transition shadow-sm pointer-events-none z-10">25</div>
                        <div class="w-full bg-[#2b889b] rounded-t-[4px] hover:bg-[#1f6d7c] transition-colors" style="height: 62px;"></div>
                    </div>
                    <!-- Tue -->
                    <div class="group flex flex-col items-center w-8 sm:w-10 relative">
                        <div class="absolute -top-8 bg-slate-800 text-white text-[10px] font-bold px-1.5 py-0.5 rounded opacity-0 group-hover:opacity-100 transition shadow-sm pointer-events-none z-10">33</div>
                        <div class="w-full bg-[#2b889b] rounded-t-[4px] hover:bg-[#1f6d7c] transition-colors" style="height: 82px;"></div>
                    </div>
                    <!-- Wed -->
                    <div class="group flex flex-col items-center w-8 sm:w-10 relative">
                        <div class="absolute -top-8 bg-slate-800 text-white text-[10px] font-bold px-1.5 py-0.5 rounded opacity-0 group-hover:opacity-100 transition shadow-sm pointer-events-none z-10">30</div>
                        <div class="w-full bg-[#2b889b] rounded-t-[4px] hover:bg-[#1f6d7c] transition-colors" style="height: 75px;"></div>
                    </div>
                    <!-- Thu -->
                    <div class="group flex flex-col items-center w-8 sm:w-10 relative">
                        <div class="absolute -top-8 bg-slate-800 text-white text-[10px] font-bold px-1.5 py-0.5 rounded opacity-0 group-hover:opacity-100 transition shadow-sm pointer-events-none z-10">36</div>
                        <div class="w-full bg-[#2b889b] rounded-t-[4px] hover:bg-[#1f6d7c] transition-colors" style="height: 90px;"></div>
                    </div>
                    <!-- Fri -->
                    <div class="group flex flex-col items-center w-8 sm:w-10 relative">
                        <div class="absolute -top-8 bg-slate-800 text-white text-[10px] font-bold px-1.5 py-0.5 rounded opacity-0 group-hover:opacity-100 transition shadow-sm pointer-events-none z-10">50</div>
                        <div class="w-full bg-[#2b889b] rounded-t-[4px] hover:bg-[#1f6d7c] transition-colors" style="height: 125px;"></div>
                    </div>
                    <!-- Sat -->
                    <div class="group flex flex-col items-center w-8 sm:w-10 relative">
                        <div class="absolute -top-8 bg-slate-800 text-white text-[10px] font-bold px-1.5 py-0.5 rounded opacity-0 group-hover:opacity-100 transition shadow-sm pointer-events-none z-10">70</div>
                        <div class="w-full bg-[#2b889b] rounded-t-[4px] hover:bg-[#1f6d7c] transition-colors" style="height: 175px;"></div>
                    </div>
                    <!-- Sun -->
                    <div class="group flex flex-col items-center w-8 sm:w-10 relative">
                        <div class="absolute -top-8 bg-slate-800 text-white text-[10px] font-bold px-1.5 py-0.5 rounded opacity-0 group-hover:opacity-100 transition shadow-sm pointer-events-none z-10">65</div>
                        <div class="w-full bg-[#2b889b] rounded-t-[4px] hover:bg-[#1f6d7c] transition-colors" style="height: 162px;"></div>
                    </div>
                </div>

                <!-- X-Axis Labels -->
                <div class="flex justify-around border-t border-slate-200 pl-2 pt-2 mt-2">
                    <span class="text-[10px] font-bold text-slate-400 w-8 sm:w-10 text-center">Mon</span>
                    <span class="text-[10px] font-bold text-slate-400 w-8 sm:w-10 text-center">Tue</span>
                    <span class="text-[10px] font-bold text-slate-400 w-8 sm:w-10 text-center">Wed</span>
                    <span class="text-[10px] font-bold text-slate-400 w-8 sm:w-10 text-center">Thu</span>
                    <span class="text-[10px] font-bold text-slate-400 w-8 sm:w-10 text-center">Fri</span>
                    <span class="text-[10px] font-bold text-slate-400 w-8 sm:w-10 text-center">Sat</span>
                    <span class="text-[10px] font-bold text-slate-400 w-8 sm:w-10 text-center">Sun</span>
                </div>
            </div>

            <!-- Mock Chart Toolbar controls mimicking mockup -->
            <div class="mt-6 flex justify-center border-t border-slate-100 pt-4">
                <div class="bg-slate-50 border border-slate-100 rounded-full py-1 px-4 flex items-center gap-5 text-slate-400 shadow-3xs">
                    <button class="hover:text-slate-600 transition"><i class="fas fa-arrows-alt text-xs"></i></button>
                    <button class="hover:text-slate-600 transition"><i class="fas fa-font text-xs"></i></button>
                    <button class="hover:text-slate-600 transition"><i class="fas fa-pencil-alt text-xs"></i></button>
                    <button class="hover:text-slate-600 transition"><i class="fas fa-comment-alt text-xs"></i></button>
                </div>
            </div>
        </div>

        <!-- Right: Demographics / Stacked Percent Column -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between lg:col-span-5">
            <div>
                <h3 class="font-bold text-slate-800 text-base">Local vs Foreign Tourists</h3>
            </div>

            <div class="mt-6 flex-grow flex flex-col justify-center">
                <!-- Stacked Progress Bar 33% vs 67% -->
                <div class="relative w-full h-8 bg-slate-100 rounded-[6px] overflow-hidden flex shadow-2xs">
                    <!-- Local 33% -->
                    <div class="h-full bg-[#0f5c6e] flex items-center justify-center text-white text-[10px] font-bold tracking-wider" style="width: 33%;">
                        33%
                    </div>
                    <!-- Foreign 67% -->
                    <div class="h-full bg-[#248da2] flex items-center justify-center text-white text-[10px] font-bold tracking-wider" style="width: 67%;">
                        67%
                    </div>
                </div>

                <!-- Custom Legends -->
                <div class="mt-4 flex items-center gap-6 justify-center">
                    <div class="flex items-center gap-2">
                        <span class="w-3.5 h-3.5 rounded-full bg-[#0f5c6e]"></span>
                        <span class="text-xs font-semibold text-slate-600">Local <span class="text-slate-400 font-medium">(2)</span></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3.5 h-3.5 rounded-full bg-[#248da2]"></span>
                        <span class="text-xs font-semibold text-slate-600">Foreign <span class="text-slate-400 font-medium">(4)</span></span>
                    </div>
                </div>

                <!-- Key Metrics List matching mockup style -->
                <div class="mt-8 border-t border-slate-100 pt-6 space-y-4">
                    <div class="flex items-center justify-between text-sm py-1 border-b border-slate-50/50">
                        <span class="text-slate-500 font-medium">Average stay duration</span>
                        <span class="text-slate-800 font-bold">2.4 days</span>
                    </div>
                    <div class="flex items-center justify-between text-sm py-1 border-b border-slate-50/50">
                        <span class="text-slate-500 font-medium">Most common purpose</span>
                        <span class="text-slate-800 font-bold">Leisure</span>
                    </div>
                    <div class="flex items-center justify-between text-sm py-1">
                        <span class="text-slate-500 font-medium">Top nationality (foreign)</span>
                        <span class="text-slate-800 font-bold">Japanese</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
