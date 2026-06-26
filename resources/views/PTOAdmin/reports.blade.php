@extends('PTOAdmin.layout', ['activePage' => 'reports'])

@section('title', 'iTOUR - Reports')

@section('admin-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Reports</h1>
            <p class="text-sm text-slate-500 mt-1">Generate and export official reports for the Provincial Tourism Office.</p>
        </div>
    </div>

    <!-- Reports Grid Layout -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Card 1: Tourist Arrival Report -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex gap-5 hover:shadow-md transition">
            <!-- Icon -->
            <div class="w-12 h-12 bg-sky-50 text-sky-600 rounded-lg flex items-center justify-center shrink-0">
                <i class="fas fa-users text-xl"></i>
            </div>
            <!-- Details & Actions -->
            <div class="space-y-4 flex-1">
                <div>
                    <h3 class="font-extrabold text-base text-slate-800">Tourist Arrival Report</h3>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mt-1">Daily, weekly, monthly arrivals province-wide.</p>
                </div>
                <div class="flex items-center gap-2 pt-2">
                    <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-bold rounded-[6px] transition">Generate</button>
                    <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> PDF</button>
                    <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> Excel</button>
                </div>
            </div>
        </div>

        <!-- Card 2: Establishment Report -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex gap-5 hover:shadow-md transition">
            <!-- Icon -->
            <div class="w-12 h-12 bg-teal-50 text-[#0a5c51] rounded-lg flex items-center justify-center shrink-0">
                <i class="fas fa-building text-xl"></i>
            </div>
            <!-- Details & Actions -->
            <div class="space-y-4 flex-1">
                <div>
                    <h3 class="font-extrabold text-base text-slate-800">Establishment Report</h3>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mt-1">Status, accreditation, and arrival counts per establishment.</p>
                </div>
                <div class="flex items-center gap-2 pt-2">
                    <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-bold rounded-[6px] transition">Generate</button>
                    <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> PDF</button>
                    <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> Excel</button>
                </div>
            </div>
        </div>

        <!-- Card 3: Destination Report -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex gap-5 hover:shadow-md transition">
            <!-- Icon -->
            <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-lg flex items-center justify-center shrink-0">
                <i class="fas fa-map-pin text-xl"></i>
            </div>
            <!-- Details & Actions -->
            <div class="space-y-4 flex-1">
                <div>
                    <h3 class="font-extrabold text-base text-slate-800">Destination Report</h3>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mt-1">Visit volume and ratings per destination.</p>
                </div>
                <div class="flex items-center gap-2 pt-2">
                    <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-bold rounded-[6px] transition">Generate</button>
                    <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> PDF</button>
                    <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> Excel</button>
                </div>
            </div>
        </div>

        <!-- Card 4: Experience Analytics Report -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex gap-5 hover:shadow-md transition">
            <!-- Icon -->
            <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center shrink-0">
                <i class="fas fa-chart-line text-xl"></i>
            </div>
            <!-- Details & Actions -->
            <div class="space-y-4 flex-1">
                <div>
                    <h3 class="font-extrabold text-base text-slate-800">Experience Analytics Report</h3>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mt-1">Sentiment, ratings, and trend summary.</p>
                </div>
                <div class="flex items-center gap-2 pt-2">
                    <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-bold rounded-[6px] transition">Generate</button>
                    <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> PDF</button>
                    <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> Excel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
