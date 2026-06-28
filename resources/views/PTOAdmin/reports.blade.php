@extends('PTOAdmin.layout', ['activePage' => 'reports'])

@section('title', 'iTOUR - Reports')

@section('admin-content')
<div class="space-y-6" x-data="reportsModule()">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Reports Module</h1>
            <p class="text-sm text-slate-500 mt-1">Configure date filters, select a report category, and export official reports.</p>
        </div>
    </div>

    <!-- Date Range Filter Bar -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 space-y-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h2 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Date Filters Configuration</h2>
            <!-- Quick Date Filters -->
            <div class="flex items-center gap-2 flex-wrap">
                <button @click="setQuickDate('today')" class="px-2.5 py-1 text-xs font-semibold text-[#0a4e5c] hover:bg-slate-50 rounded border border-slate-200 transition">Today</button>
                <button @click="setQuickDate('week')" class="px-2.5 py-1 text-xs font-semibold text-[#0a4e5c] hover:bg-slate-50 rounded border border-slate-200 transition">Last 7 Days</button>
                <button @click="setQuickDate('month')" class="px-2.5 py-1 text-xs font-semibold text-[#0a4e5c] hover:bg-slate-50 rounded border border-slate-200 transition">This Month</button>
                <button @click="setQuickDate('year')" class="px-2.5 py-1 text-xs font-semibold text-[#0a4e5c] hover:bg-slate-50 rounded border border-slate-200 transition">Year to Date</button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <!-- Start Date -->
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-600">Start Date</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="far fa-calendar text-slate-400 text-xs"></i>
                    </span>
                    <input type="date" x-model="startDate" @change="generateReport()" class="w-full bg-slate-50 border border-slate-200 pl-9 pr-3 py-2 text-sm rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all">
                </div>
            </div>

            <!-- End Date -->
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-600">End Date</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="far fa-calendar text-slate-400 text-xs"></i>
                    </span>
                    <input type="date" x-model="endDate" @change="generateReport()" class="w-full bg-slate-50 border border-slate-200 pl-9 pr-3 py-2 text-sm rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all">
                </div>
            </div>

            <!-- Sub Filter depending on selection -->
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-600" x-text="getSubFilterLabel()"></label>
                <div class="relative">
                    <select x-model="subFilter" @change="generateReport()" class="w-full appearance-none bg-slate-50 border border-slate-200 px-3 py-2 pr-8 text-sm rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]">
                        <template x-for="opt in getSubFilterOptions()" :key="opt.value">
                            <option :value="opt.value" x-text="opt.label"></option>
                        </template>
                    </select>
                    <i class="fas fa-chevron-down text-[10px] text-slate-400 absolute right-3 top-3.5 pointer-events-none"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Reports Grid Layout (Original Card Designs Preserved) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1: Tourist Arrival Report -->
        <div 
            @click="switchTab('arrivals')"
            :class="activeTab === 'arrivals' ? 'ring-2 ring-[#0a4e5c] bg-slate-50/50' : 'bg-white'"
            class="rounded-xl border border-slate-100 shadow-sm p-6 flex gap-5 hover:shadow-md cursor-pointer transition">
            <!-- Icon -->
            <div class="w-12 h-12 bg-sky-50 text-sky-600 rounded-lg flex items-center justify-center shrink-0">
                <i class="fas fa-users text-xl"></i>
            </div>
            <!-- Details & Actions -->
            <div class="space-y-4 flex-1">
                <div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-extrabold text-base text-slate-800">Tourist Arrival Report</h3>
                        <span x-show="activeTab === 'arrivals'" class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-[#0a4e5c] text-white">Active</span>
                    </div>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mt-1">Daily, weekly, monthly arrivals province-wide.</p>
                </div>
                <div class="flex items-center gap-2 pt-2" @click.stop>
                    <button @click="switchTab('arrivals')" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-bold rounded-[6px] transition">Select</button>
                    <button @click="exportReport('pdf')" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-2 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> PDF</button>
                    <button @click="exportReport('excel')" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-2 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> Excel</button>
                </div>
            </div>
        </div>

        <!-- Card 2: Establishment Report -->
        <div 
            @click="switchTab('establishments')"
            :class="activeTab === 'establishments' ? 'ring-2 ring-[#0a4e5c] bg-slate-50/50' : 'bg-white'"
            class="rounded-xl border border-slate-100 shadow-sm p-6 flex gap-5 hover:shadow-md cursor-pointer transition">
            <!-- Icon -->
            <div class="w-12 h-12 bg-teal-50 text-[#0a5c51] rounded-lg flex items-center justify-center shrink-0">
                <i class="fas fa-building text-xl"></i>
            </div>
            <!-- Details & Actions -->
            <div class="space-y-4 flex-1">
                <div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-extrabold text-base text-slate-800">Establishment Report</h3>
                        <span x-show="activeTab === 'establishments'" class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-[#0a4e5c] text-white">Active</span>
                    </div>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mt-1">Status, accreditation, and arrival counts per establishment.</p>
                </div>
                <div class="flex items-center gap-2 pt-2" @click.stop>
                    <button @click="switchTab('establishments')" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-bold rounded-[6px] transition">Select</button>
                    <button @click="exportReport('pdf')" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-2 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> PDF</button>
                    <button @click="exportReport('excel')" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-2 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> Excel</button>
                </div>
            </div>
        </div>

        <!-- Card 3: Destination Report -->
        <div 
            @click="switchTab('destinations')"
            :class="activeTab === 'destinations' ? 'ring-2 ring-[#0a4e5c] bg-slate-50/50' : 'bg-white'"
            class="rounded-xl border border-slate-100 shadow-sm p-6 flex gap-5 hover:shadow-md cursor-pointer transition">
            <!-- Icon -->
            <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-lg flex items-center justify-center shrink-0">
                <i class="fas fa-map-pin text-xl"></i>
            </div>
            <!-- Details & Actions -->
            <div class="space-y-4 flex-1">
                <div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-extrabold text-base text-slate-800">Destination Report</h3>
                        <span x-show="activeTab === 'destinations'" class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-[#0a4e5c] text-white">Active</span>
                    </div>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mt-1">Visit volume and ratings per destination.</p>
                </div>
                <div class="flex items-center gap-2 pt-2" @click.stop>
                    <button @click="switchTab('destinations')" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-bold rounded-[6px] transition">Select</button>
                    <button @click="exportReport('pdf')" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-2 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> PDF</button>
                    <button @click="exportReport('excel')" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-2 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> Excel</button>
                </div>
            </div>
        </div>

        <!-- Card 4: Experience Analytics Report -->
        <div 
            @click="switchTab('experience')"
            :class="activeTab === 'experience' ? 'ring-2 ring-[#0a4e5c] bg-slate-50/50' : 'bg-white'"
            class="rounded-xl border border-slate-100 shadow-sm p-6 flex gap-5 hover:shadow-md cursor-pointer transition">
            <!-- Icon -->
            <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center shrink-0">
                <i class="fas fa-chart-line text-xl"></i>
            </div>
            <!-- Details & Actions -->
            <div class="space-y-4 flex-1">
                <div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-extrabold text-base text-slate-800">Experience Analytics Report</h3>
                        <span x-show="activeTab === 'experience'" class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-[#0a4e5c] text-white">Active</span>
                    </div>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mt-1">Sentiment, ratings, and trend summary.</p>
                </div>
                <div class="flex items-center gap-2 pt-2" @click.stop>
                    <button @click="switchTab('experience')" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-bold rounded-[6px] transition">Select</button>
                    <button @click="exportReport('pdf')" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-2 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> PDF</button>
                    <button @click="exportReport('excel')" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-2 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> Excel</button>
                </div>
            </div>
        </div>

        <!-- NEW Card 5: Establishment Report Validation (Due 15th) -->
        <div 
            @click="switchTab('validation')"
            :class="activeTab === 'validation' ? 'ring-2 ring-[#0a4e5c] bg-slate-50/50' : 'bg-white'"
            class="rounded-xl border border-slate-100 shadow-sm p-6 flex gap-5 hover:shadow-md cursor-pointer transition">
            <!-- Icon -->
            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center shrink-0">
                <i class="fas fa-clipboard-check text-xl"></i>
            </div>
            <!-- Details & Actions -->
            <div class="space-y-4 flex-1">
                <div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-extrabold text-base text-slate-800">Report Validation</h3>
                        <span x-show="activeTab === 'validation'" class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-[#0a4e5c] text-white">Active</span>
                    </div>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mt-1">Verify submitted reports from different establishments due on the 15th.</p>
                </div>
                <div class="flex items-center gap-2 pt-2" @click.stop>
                    <button @click="switchTab('validation')" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-bold rounded-[6px] transition">Validate</button>
                    <button @click="exportReport('pdf')" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-2 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> PDF</button>
                    <button @click="exportReport('excel')" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-2 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> Excel</button>
                </div>
            </div>
        </div>

        <!-- NEW Card 6: Overall Tourism Report -->
        <div 
            @click="switchTab('overall')"
            :class="activeTab === 'overall' ? 'ring-2 ring-[#0a4e5c] bg-slate-50/50' : 'bg-white'"
            class="rounded-xl border border-slate-100 shadow-sm p-6 flex gap-5 hover:shadow-md cursor-pointer transition">
            <!-- Icon -->
            <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center shrink-0">
                <i class="fas fa-globe-asia text-xl"></i>
            </div>
            <!-- Details & Actions -->
            <div class="space-y-4 flex-1">
                <div>
                    <div class="flex items-center justify-between">
                        <h3 class="font-extrabold text-base text-slate-800">Overall Tourism Report</h3>
                        <span x-show="activeTab === 'overall'" class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-[#0a4e5c] text-white">Active</span>
                    </div>
                    <p class="text-xs text-slate-400 font-medium leading-relaxed mt-1">Consolidated comprehensive analytics and summaries of province-wide tourism.</p>
                </div>
                <div class="flex items-center gap-2 pt-2" @click.stop>
                    <button @click="switchTab('overall')" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-bold rounded-[6px] transition">View Overall</button>
                    <button @click="exportReport('pdf')" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-2 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> PDF</button>
                    <button @click="exportReport('excel')" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-2 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1 shadow-xs"><i class="fas fa-arrow-down text-[10px]"></i> Excel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Report Summary / KPI Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" x-show="!loading">
        <template x-for="kpi in getKPIs()" :key="kpi.title">
            <div class="bg-white rounded-xl border border-slate-100 p-5 shadow-sm flex items-center justify-between animate-fadeIn">
                <div class="space-y-1">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider" x-text="kpi.title"></span>
                    <h3 class="text-2xl font-extrabold text-slate-800" x-text="kpi.value"></h3>
                    <p class="text-[10px] font-semibold flex items-center gap-1" :class="kpi.changeType === 'up' ? 'text-emerald-600' : 'text-slate-400'">
                        <i class="fas" :class="kpi.changeType === 'up' ? 'fa-arrow-up' : 'fa-info-circle'"></i>
                        <span x-text="kpi.subtext"></span>
                    </p>
                </div>
                <div class="w-10 h-10 rounded-lg flex items-center justify-center shrink-0" :class="kpi.bgClass">
                    <i class="fas text-lg" :class="kpi.iconClass"></i>
                </div>
            </div>
        </template>
    </div>

    <!-- Detailed Report Table Layout -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden" x-show="!loading">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between flex-wrap gap-4">
            <div>
                <h3 class="font-bold text-slate-800" x-text="getTableTitle()"></h3>
                <p class="text-xs text-slate-400 mt-0.5" x-text="getTableSubtitle()"></p>
            </div>
            <!-- Search & Actions -->
            <div class="flex items-center gap-3">
                <div class="relative w-full max-w-xs">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-slate-400 text-xs"></i>
                    </span>
                    <input type="text" x-model="searchQuery" placeholder="Search rows..." class="w-full bg-slate-50 border border-slate-200 pl-8 pr-3 py-1.5 text-xs rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c]">
                </div>
                <button @click="window.print()" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-3 py-1.5 text-xs font-bold rounded-[6px] transition flex items-center gap-1.5 shadow-xs">
                    <i class="fas fa-print"></i> Print
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <!-- Headers -->
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-100 text-slate-400 text-[10px] font-bold tracking-wider uppercase">
                        <template x-for="header in getTableHeaders()" :key="header">
                            <th class="py-4 px-6" x-text="header"></th>
                        </template>
                    </tr>
                </thead>
                <!-- Body -->
                <tbody class="divide-y divide-slate-100 text-slate-700 text-sm font-medium">
                    <template x-for="row in getFilteredRows()" :key="row.ref || row.id || Math.random()">
                        <tr class="hover:bg-slate-50/40 transition duration-150 border-b border-slate-100">
                            <!-- TAB: Arrivals -->
                            <template x-if="activeTab === 'arrivals'">
                                <td class="py-4 px-6 text-slate-800 font-bold" x-text="row.ref"></td>
                            </template>
                            <template x-if="activeTab === 'arrivals'">
                                <td class="py-4 px-6">
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-slate-800" x-text="row.name"></span>
                                        <span class="text-[10px] text-slate-400" x-text="row.ageGender"></span>
                                    </div>
                                </td>
                            </template>
                            <template x-if="activeTab === 'arrivals'">
                                <td class="py-4 px-6 text-slate-500" x-text="row.nationality"></td>
                            </template>
                            <template x-if="activeTab === 'arrivals'">
                                <td class="py-4 px-6 text-slate-600" x-text="row.establishment"></td>
                            </template>
                            <template x-if="activeTab === 'arrivals'">
                                <td class="py-4 px-6 text-slate-600" x-text="row.destination"></td>
                            </template>
                            <template x-if="activeTab === 'arrivals'">
                                <td class="py-4 px-6 text-slate-500" x-text="row.date"></td>
                            </template>
                            <template x-if="activeTab === 'arrivals'">
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold"
                                          :class="row.status === 'Checked In' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-50 text-slate-600'"
                                          x-text="row.status"></span>
                                </td>
                            </template>

                            <!-- TAB: Establishments -->
                            <template x-if="activeTab === 'establishments'">
                                <td class="py-4 px-6 text-slate-800 font-bold" x-text="row.name"></td>
                            </template>
                            <template x-if="activeTab === 'establishments'">
                                <td class="py-4 px-6 text-slate-500" x-text="row.type"></td>
                            </template>
                            <template x-if="activeTab === 'establishments'">
                                <td class="py-4 px-6 text-slate-800 font-semibold" x-text="row.arrivals"></td>
                            </template>
                            <template x-if="activeTab === 'establishments'">
                                <td class="py-4 px-6 text-slate-600">
                                    <div class="flex items-center gap-1 text-amber-500">
                                        <i class="fas fa-star text-xs"></i>
                                        <span class="font-bold text-slate-700 text-xs" x-text="row.rating"></span>
                                    </div>
                                </td>
                            </template>
                            <template x-if="activeTab === 'establishments'">
                                <td class="py-4 px-6 text-slate-500" x-text="row.busiestMonth"></td>
                            </template>
                            <template x-if="activeTab === 'establishments'">
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-teal-50 text-[#0a5c51]" x-text="row.status"></span>
                                </td>
                            </template>

                            <!-- TAB: Destinations -->
                            <template x-if="activeTab === 'destinations'">
                                <td class="py-4 px-6 text-slate-800 font-bold" x-text="row.destination"></td>
                            </template>
                            <template x-if="activeTab === 'destinations'">
                                <td class="py-4 px-6 text-slate-500" x-text="row.location"></td>
                            </template>
                            <template x-if="activeTab === 'destinations'">
                                <td class="py-4 px-6 text-slate-600" x-text="row.category"></td>
                            </template>
                            <template x-if="activeTab === 'destinations'">
                                <td class="py-4 px-6 text-slate-800 font-semibold" x-text="row.visitors"></td>
                            </template>
                            <template x-if="activeTab === 'destinations'">
                                <td class="py-4 px-6 text-slate-600 font-medium" x-text="row.peakSeason"></td>
                            </template>
                            <template x-if="activeTab === 'destinations'">
                                <td class="py-4 px-6 text-slate-600 font-medium" x-text="row.rating"></td>
                            </template>

                            <!-- TAB: Experience -->
                            <template x-if="activeTab === 'experience'">
                                <td class="py-4 px-6 text-slate-500" x-text="row.date"></td>
                            </template>
                            <template x-if="activeTab === 'experience'">
                                <td class="py-4 px-6 text-slate-700 font-semibold" x-text="row.tourist"></td>
                            </template>
                            <template x-if="activeTab === 'experience'">
                                <td class="py-4 px-6 text-slate-600" x-text="row.rating"></td>
                            </template>
                            <template x-if="activeTab === 'experience'">
                                <td class="py-4 px-6 text-slate-500 italic max-w-sm truncate" :title="row.feedback" x-text="row.feedback"></td>
                            </template>
                            <template x-if="activeTab === 'experience'">
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold"
                                          :class="row.sentiment === 'Positive' ? 'bg-emerald-50 text-emerald-700' : (row.sentiment === 'Neutral' ? 'bg-amber-50 text-amber-700' : 'bg-rose-50 text-rose-700')"
                                          x-text="row.sentiment"></span>
                                </td>
                            </template>

                            <!-- TAB: Validation -->
                            <template x-if="activeTab === 'validation'">
                                <td class="py-4 px-6 text-slate-800 font-bold" x-text="row.ref"></td>
                            </template>
                            <template x-if="activeTab === 'validation'">
                                <td class="py-4 px-6 text-slate-800 font-semibold" x-text="row.establishment"></td>
                            </template>
                            <template x-if="activeTab === 'validation'">
                                <td class="py-4 px-6 text-slate-600 font-medium" x-text="row.period"></td>
                            </template>
                            <template x-if="activeTab === 'validation'">
                                <td class="py-4 px-6 text-slate-500 font-normal" x-text="row.submittedAt"></td>
                            </template>
                            <template x-if="activeTab === 'validation'">
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold"
                                          :class="row.isLate ? 'bg-rose-55 text-rose-600' : 'bg-emerald-55 text-emerald-600'"
                                          x-text="row.isLate ? row.daysLate + ' late' : 'On Time'"></span>
                                </td>
                            </template>
                            <template x-if="activeTab === 'validation'">
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold"
                                          :class="row.status === 'Validated' ? 'bg-emerald-50 text-[#0a5c51]' : 'bg-amber-50 text-amber-600'"
                                          x-text="row.status"></span>
                                </td>
                            </template>
                            <template x-if="activeTab === 'validation'">
                                <td class="py-4 px-6" @click.stop>
                                    <template x-if="row.status === 'Pending'">
                                        <button @click="validateReportRow(row)" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-3 py-1 text-xs font-bold rounded transition">
                                            Validate
                                        </button>
                                    </template>
                                    <template x-if="row.status === 'Validated'">
                                        <span class="text-xs text-slate-400 font-medium flex items-center gap-1 select-none">
                                            <i class="fas fa-check text-emerald-600"></i> Approved
                                        </span>
                                    </template>
                                </td>
                            </template>

                            <!-- TAB: Overall Consolidated -->
                            <template x-if="activeTab === 'overall'">
                                <td class="py-4 px-6 text-slate-800 font-bold" x-text="row.period"></td>
                            </template>
                            <template x-if="activeTab === 'overall'">
                                <td class="py-4 px-6 text-slate-850 font-bold" x-text="row.arrivals"></td>
                            </template>
                            <template x-if="activeTab === 'overall'">
                                <td class="py-4 px-6 text-slate-600" x-text="row.filipino"></td>
                            </template>
                            <template x-if="activeTab === 'overall'">
                                <td class="py-4 px-6 text-slate-600" x-text="row.foreign"></td>
                            </template>
                            <template x-if="activeTab === 'overall'">
                                <td class="py-4 px-6 text-slate-700 font-semibold" x-text="row.topSite"></td>
                            </template>
                            <template x-if="activeTab === 'overall'">
                                <td class="py-4 px-6 text-slate-500" x-text="row.activeEst"></td>
                            </template>
                            <template x-if="activeTab === 'overall'">
                                <td class="py-4 px-6 text-slate-500" x-text="row.avgStay"></td>
                            </template>
                        </tr>
                    </template>

                    <!-- Empty State -->
                    <template x-if="getFilteredRows().length === 0">
                        <tr>
                            <td :colspan="getTableHeaders().length" class="py-12 text-center text-slate-400">
                                <i class="fas fa-clipboard-list text-3xl mb-2 text-slate-200"></i>
                                <p class="text-sm font-medium">No records found matching the filter criteria.</p>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Spinner Loading State -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-12 flex flex-col items-center justify-center" x-show="loading">
        <svg class="animate-spin h-10 w-10 text-[#0a4e5c] mb-3" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span class="text-slate-600 font-bold text-sm">Compiling intelligence datasets...</span>
        <span class="text-slate-400 text-xs mt-1">Filtering dates, running validations, and ordering reports.</span>
    </div>
</div>

<script>
function reportsModule() {
    return {
        activeTab: 'arrivals',
        startDate: '',
        endDate: '',
        subFilter: 'all',
        searchQuery: '',
        loading: false,

        // Live mutable datasets loaded in memory
        validationDataset: [],
        overallDataset: [],

        init() {
            // Setup defaults: Current month range
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            this.endDate = `${year}-${month}-${day}`;
            
            // Start of month
            this.startDate = `${year}-${month}-01`;

            // Populate establishment monthly validation dataset (due every 15th)
            this.validationDataset = [
                { ref: 'SUB-2026-0601', establishment: 'Blue Bless Resort', period: 'May 2026', submittedAt: '2026-06-12', isLate: false, daysLate: '0 days', status: 'Pending' },
                { ref: 'SUB-2026-0602', establishment: 'Botona Beach Resort', period: 'May 2026', submittedAt: '2026-06-14', isLate: false, daysLate: '0 days', status: 'Validated' },
                { ref: 'SUB-2026-0603', establishment: 'Mati Marina Hotel', period: 'May 2026', submittedAt: '2026-06-16', isLate: true, daysLate: '1 day', status: 'Pending' },
                { ref: 'SUB-2026-0604', establishment: 'Aliwagwag Eco Lodge', period: 'May 2026', submittedAt: '2026-06-15', isLate: false, daysLate: '0 days', status: 'Pending' },
                { ref: 'SUB-2026-0605', establishment: 'Sunrise Surf Hostel', period: 'May 2026', submittedAt: '2026-06-17', isLate: true, daysLate: '2 days', status: 'Validated' },
                { ref: 'SUB-2026-0606', establishment: 'Pacific View Inn', period: 'May 2026', submittedAt: '2026-06-14', isLate: false, daysLate: '0 days', status: 'Pending' }
            ];

            // Populate Overall consolidated reports
            this.overallDataset = [
                { period: 'Q1 2026 Summary', arrivals: '12,890', filipino: '10,412', foreign: '2,478', topSite: 'Dahican Beach', activeEst: '138 sites', avgStay: '2.4 days', granularity: 'Quarterly' },
                { period: 'Q2 2026 Summary', arrivals: '15,600', filipino: '12,980', foreign: '2,620', topSite: 'Dahican Beach', activeEst: '142 sites', avgStay: '2.6 days', granularity: 'Quarterly' },
                { period: 'May 2026 Monthly', arrivals: '5,420', filipino: '4,510', foreign: '910', topSite: 'Sleeping Dinosaur', activeEst: '140 sites', avgStay: '2.3 days', granularity: 'Monthly' },
                { period: 'June 2026 Monthly', arrivals: '4,820', filipino: '3,912', foreign: '908', topSite: 'Pujada Island', activeEst: '142 sites', avgStay: '2.4 days', granularity: 'Monthly' }
            ];
        },

        switchTab(tab) {
            this.activeTab = tab;
            this.subFilter = 'all';
            this.searchQuery = '';
            this.generateReport();
        },

        setQuickDate(range) {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            this.endDate = `${year}-${month}-${day}`;

            if (range === 'today') {
                this.startDate = `${year}-${month}-${day}`;
            } else if (range === 'week') {
                const past = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000);
                this.startDate = `${past.getFullYear()}-${String(past.getMonth() + 1).padStart(2, '0')}-${String(past.getDate()).padStart(2, '0')}`;
            } else if (range === 'month') {
                this.startDate = `${year}-${month}-01`;
            } else if (range === 'year') {
                this.startDate = `${year}-01-01`;
            }

            this.generateReport();
        },

        generateReport() {
            this.loading = true;
            // Simulate database compile lag
            setTimeout(() => {
                this.loading = false;
            }, 300);
        },

        validateReportRow(row) {
            row.status = 'Validated';
        },

        getSubFilterLabel() {
            if (this.activeTab === 'arrivals') return 'Nationality Origin';
            if (this.activeTab === 'establishments') return 'Accreditation Status';
            if (this.activeTab === 'destinations') return 'Location/Municipality';
            if (this.activeTab === 'experience') return 'Sentiment Tone';
            if (this.activeTab === 'validation') return 'Validation Status';
            if (this.activeTab === 'overall') return 'Reporting Format';
            return 'Filters';
        },

        getSubFilterOptions() {
            if (this.activeTab === 'arrivals') {
                return [
                    { value: 'all', label: 'All Origins' },
                    { value: 'Filipino', label: 'Filipino' },
                    { value: 'Foreign', label: 'Foreign Nationals' }
                ];
            }
            if (this.activeTab === 'establishments') {
                return [
                    { value: 'all', label: 'All Statuses' },
                    { value: 'Accredited', label: 'Accredited only' },
                    { value: 'Pending', label: 'Pending Review' }
                ];
            }
            if (this.activeTab === 'destinations') {
                return [
                    { value: 'all', label: 'All Municipalities' },
                    { value: 'Mati City', label: 'Mati City' },
                    { value: 'San Isidro', label: 'San Isidro' },
                    { value: 'Governor Generoso', label: 'Governor Generoso' },
                    { value: 'Cateel', label: 'Cateel' }
                ];
            }
            if (this.activeTab === 'experience') {
                return [
                    { value: 'all', label: 'All Sentiment Tones' },
                    { value: 'Positive', label: 'Positive (4-5 Stars)' },
                    { value: 'Neutral', label: 'Neutral (3 Stars)' },
                    { value: 'Negative', label: 'Negative (1-2 Stars)' }
                ];
            }
            if (this.activeTab === 'validation') {
                return [
                    { value: 'all', label: 'All Submissions' },
                    { value: 'Pending', label: 'Pending validation' },
                    { value: 'Validated', label: 'Validated' }
                ];
            }
            if (this.activeTab === 'overall') {
                return [
                    { value: 'all', label: 'All Formats' },
                    { value: 'Quarterly', label: 'Quarterly Summaries' },
                    { value: 'Monthly', label: 'Monthly Summaries' }
                ];
            }
            return [{ value: 'all', label: 'All Options' }];
        },

        getKPIs() {
            if (this.activeTab === 'arrivals') {
                return [
                    { title: 'Total Arrivals', value: '4,820', subtext: '12% Increase vs last month', changeType: 'up', iconClass: 'fa-user-check text-[#0a4e5c]', bgClass: 'bg-emerald-50' },
                    { title: 'Filipino Tourists', value: '3,912', subtext: '81.1% of Total Arrivals', changeType: 'info', iconClass: 'fa-flag text-sky-600', bgClass: 'bg-sky-50' },
                    { title: 'Foreign Tourists', value: '908', subtext: '18.9% of Total Arrivals', changeType: 'info', iconClass: 'fa-globe text-purple-600', bgClass: 'bg-purple-50' },
                    { title: 'Busiest Day', value: 'Saturday', subtext: 'Average 940 arrivals', changeType: 'info', iconClass: 'fa-calendar-day text-amber-600', bgClass: 'bg-amber-50' }
                ];
            }
            if (this.activeTab === 'establishments') {
                return [
                    { title: 'Accredited Est.', value: '142', subtext: '9 new this quarter', changeType: 'up', iconClass: 'fa-hotel text-[#0a5c51]', bgClass: 'bg-teal-50' },
                    { title: 'Total Check-ins', value: '12,940', subtext: 'Across all registered sites', changeType: 'info', iconClass: 'fa-key text-blue-600', bgClass: 'bg-blue-50' },
                    { title: 'Average Stay Duration', value: '2.4 Days', subtext: 'Up from 2.1 days last year', changeType: 'up', iconClass: 'fa-clock text-amber-600', bgClass: 'bg-amber-50' },
                    { title: 'Compliance Rate', value: '98.5%', subtext: 'Target compliance exceeded', changeType: 'up', iconClass: 'fa-shield-alt text-emerald-600', bgClass: 'bg-emerald-50' }
                ];
            }
            if (this.activeTab === 'destinations') {
                return [
                    { title: 'Total Registered Sites', value: '158', subtext: 'All municipal sites active', changeType: 'info', iconClass: 'fa-map-marked-alt text-rose-600', bgClass: 'bg-rose-50' },
                    { title: 'Busiest Site', value: 'Dahican Beach', subtext: '2,140 unique visitors', changeType: 'info', iconClass: 'fa-star text-amber-600', bgClass: 'bg-amber-50' },
                    { title: 'Total Site Hits', value: '34,290 Scans', subtext: 'Scanning metric up 18%', changeType: 'up', iconClass: 'fa-qrcode text-slate-700', bgClass: 'bg-slate-100' },
                    { title: 'Eco-rating Average', value: '4.82 Stars', subtext: 'Stunning overall response', changeType: 'up', iconClass: 'fa-leaf text-emerald-600', bgClass: 'bg-emerald-50' }
                ];
            }
            if (this.activeTab === 'experience') {
                return [
                    { title: 'Satisfied Tourists', value: '94.2%', subtext: '+1.5% compared to benchmark', changeType: 'up', iconClass: 'fa-laugh-beam text-emerald-600', bgClass: 'bg-emerald-50' },
                    { title: 'Positive Sentiments', value: '320 Feedbacks', subtext: 'Mostly praising Dahican & Pujada', changeType: 'info', iconClass: 'fa-smile text-sky-600', bgClass: 'bg-sky-50' },
                    { title: 'Pending Inquiries', value: '4 Issues', subtext: 'Dispatched to Municipal reps', changeType: 'info', iconClass: 'fa-comment-alt text-rose-600', bgClass: 'bg-rose-50' },
                    { title: 'Total Ratings Logged', value: '1,490', subtext: 'Valuable feedback index compiled', changeType: 'info', iconClass: 'fa-star text-amber-600', bgClass: 'bg-amber-50' }
                ];
            }
            if (this.activeTab === 'validation') {
                const total = this.validationDataset.length;
                const validated = this.validationDataset.filter(r => r.status === 'Validated').length;
                const pending = total - validated;
                const late = this.validationDataset.filter(r => r.isLate).length;
                return [
                    { title: 'Total Submissions', value: `${total} Reports`, subtext: 'Monthly submissions from hotels', changeType: 'info', iconClass: 'fa-file-invoice text-blue-600', bgClass: 'bg-blue-50' },
                    { title: 'Pending Review', value: `${pending} Reports`, subtext: 'Awaiting officer sign-off', changeType: 'info', iconClass: 'fa-hourglass-half text-amber-600', bgClass: 'bg-amber-50' },
                    { title: 'Validated (15th)', value: `${validated} Reports`, subtext: 'Reports validated successfully', changeType: 'up', iconClass: 'fa-clipboard-check text-emerald-600', bgClass: 'bg-emerald-50' },
                    { title: 'Late Submissions', value: `${late} Reports`, subtext: 'Submitted after the 15th deadline', changeType: 'info', iconClass: 'fa-exclamation-triangle text-rose-600', bgClass: 'bg-rose-50' }
                ];
            }
            if (this.activeTab === 'overall') {
                return [
                    { title: 'Consolidated Arrivals', value: '38,730', subtext: 'Total tourists captured', changeType: 'up', iconClass: 'fa-globe-asia text-[#0a4e5c]', bgClass: 'bg-teal-50' },
                    { title: 'Avg Stay Duration', value: '2.5 Days', subtext: 'Province-wide stay metric', changeType: 'up', iconClass: 'fa-clock text-sky-600', bgClass: 'bg-sky-50' },
                    { title: 'Top Overall Destination', value: 'Dahican Beach', subtext: 'Highest visitor volume', changeType: 'info', iconClass: 'fa-map-pin text-rose-600', bgClass: 'bg-rose-50' },
                    { title: 'Accredited Partners', value: '142 active', bgClass: 'bg-purple-50', iconClass: 'fa-hotel text-purple-600', changeType: 'up', subtext: 'Reporting compliance at 100%' }
                ];
            }
            return [];
        },

        getTableTitle() {
            if (this.activeTab === 'arrivals') return 'Tourist Arrival Log';
            if (this.activeTab === 'establishments') return 'Establishment Operations Directory';
            if (this.activeTab === 'destinations') return 'Destination Visitor Intelligence';
            if (this.activeTab === 'experience') return 'Tourist Experience Logs';
            if (this.activeTab === 'validation') return 'Establishment Monthly Reports Validation (Due on 15th)';
            if (this.activeTab === 'overall') return 'Overall Consolidated Province Tourism Report';
            return 'Report Table';
        },

        getTableSubtitle() {
            return `Showing reports generated from ${this.startDate || 'start'} to ${this.endDate || 'now'}.`;
        },

        getTableHeaders() {
            if (this.activeTab === 'arrivals') {
                return ['Reference', 'Tourist Name', 'Nationality', 'Establishment', 'Destination', 'Date', 'Status'];
            }
            if (this.activeTab === 'establishments') {
                return ['Establishment Name', 'Category', 'Total Arrivals', 'Average Rating', 'Busiest Month', 'Status'];
            }
            if (this.activeTab === 'destinations') {
                return ['Destination Name', 'Location/Municipality', 'Category', 'Monthly Visitors', 'Peak Season', 'Rating'];
            }
            if (this.activeTab === 'experience') {
                return ['Date', 'Tourist Name', 'Rating', 'Feedback Summary', 'Sentiment Status'];
            }
            if (this.activeTab === 'validation') {
                return ['Submission ID', 'Establishment', 'Report Period', 'Submitted Date', 'Timeline Status', 'Validation Status', 'Actions'];
            }
            if (this.activeTab === 'overall') {
                return ['Reporting Period', 'Total Arrivals', 'Filipino', 'Foreign Nationals', 'Top Destination', 'Active Est.', 'Avg Stay'];
            }
            return [];
        },

        getDataset() {
            if (this.activeTab === 'arrivals') {
                return [
                    { ref: 'REG-02400', name: 'Ana Reyes', ageGender: 'Female · 22y', nationality: 'Filipino', establishment: 'Blue Bless Resort', destination: 'Dahican Beach', date: '2026-06-28', status: 'Checked In' },
                    { ref: 'REG-02401', name: 'John Doe', ageGender: 'Male · 34y', nationality: 'Foreign', establishment: 'Botona Beach Resort', destination: 'Dahican Beach', date: '2026-06-27', status: 'Checked In' },
                    { ref: 'REG-02402', name: 'Sora Tanaka', ageGender: 'Male · 28y', nationality: 'Foreign', establishment: 'Mati Marina Hotel', destination: 'Sleeping Dinosaur', date: '2026-06-25', status: 'Checked In' },
                    { ref: 'REG-02403', name: 'Maria Cruz', ageGender: 'Female · 41y', nationality: 'Filipino', establishment: 'Aliwagwag Eco Lodge', destination: 'Aliwagwag Falls', date: '2026-06-24', status: 'Checked Out' },
                    { ref: 'REG-02404', name: 'David Smith', ageGender: 'Male · 50y', nationality: 'Foreign', establishment: 'Pacific View Inn', destination: 'Cape San Agustin', date: '2026-06-22', status: 'Checked Out' },
                    { ref: 'REG-02405', name: 'Carla Santos', ageGender: 'Female · 26y', nationality: 'Filipino', establishment: 'Sunrise Surf Hostel', destination: 'Dahican Beach', date: '2026-06-21', status: 'Checked Out' }
                ];
            }
            if (this.activeTab === 'establishments') {
                return [
                    { name: 'Blue Bless Resort', type: 'Resort & Accommodation', arrivals: '1,420', rating: '4.8', busiestMonth: 'April', status: 'Accredited' },
                    { name: 'Botona Beach Resort', type: 'Resort & Accommodation', arrivals: '1,108', rating: '4.7', busiestMonth: 'May', status: 'Accredited' },
                    { name: 'Mati Marina Hotel', type: 'Hotel & Lodging', arrivals: '984', rating: '4.5', busiestMonth: 'December', status: 'Accredited' },
                    { name: 'Aliwagwag Eco Lodge', type: 'Eco Resort', arrivals: '782', rating: '4.9', busiestMonth: 'November', status: 'Accredited' },
                    { name: 'Pacific View Inn', type: 'Inn & Guest House', arrivals: '412', rating: '4.1', busiestMonth: 'January', status: 'Accredited' }
                ];
            }
            if (this.activeTab === 'destinations') {
                return [
                    { destination: 'Dahican Beach', location: 'Mati City', category: 'Coastal/Beach', visitors: '2,890', peakSeason: 'Summer (Apr-May)', rating: '4.9/5' },
                    { destination: 'Sleeping Dinosaur', location: 'Mati City', category: 'Scenic/Hiking', visitors: '1,820', peakSeason: 'Year-Round', rating: '4.7/5' },
                    { destination: 'Pujada Island', location: 'Mati City', category: 'Island/Marine', visitors: '1,150', peakSeason: 'Summer', rating: '4.8/5' },
                    { destination: 'Aliwagwag Falls', location: 'Cateel', category: 'Waterfall/Nature', visitors: '980', peakSeason: 'June-August', rating: '4.9/5' },
                    { destination: 'Cape San Agustin', location: 'Governor Generoso', category: 'Historic/Scenic', visitors: '620', peakSeason: 'Dry Season', rating: '4.6/5' }
                ];
            }
            if (this.activeTab === 'experience') {
                return [
                    { date: '2026-06-28', tourist: 'Ana Reyes', rating: '⭐⭐⭐⭐⭐', feedback: 'Stunning beach conditions. Dahican is a true paradise.', sentiment: 'Positive' },
                    { date: '2026-06-27', tourist: 'John Doe', rating: '⭐⭐⭐⭐', feedback: 'Very relaxing stay, blue waters and hospitable service.', sentiment: 'Positive' },
                    { date: '2026-06-26', tourist: 'Sora Tanaka', rating: '⭐⭐⭐', feedback: 'Beautiful views but mobile signals are weak in Sleeping Dinosaur.', sentiment: 'Neutral' },
                    { date: '2026-06-25', tourist: 'David Smith', rating: '⭐⭐⭐⭐⭐', feedback: 'Incredible lighthouse and historical landmarks at Cape San Agustin.', sentiment: 'Positive' },
                    { date: '2026-06-24', tourist: 'Carla Santos', rating: '⭐⭐', feedback: 'Wait times at the registration counter are quite long.', sentiment: 'Negative' }
                ];
            }
            if (this.activeTab === 'validation') {
                return this.validationDataset;
            }
            if (this.activeTab === 'overall') {
                return this.overallDataset;
            }
            return [];
        },

        getFilteredRows() {
            let data = this.getDataset();

            // Filter by nationality / subfilter
            if (this.subFilter !== 'all') {
                if (this.activeTab === 'arrivals') {
                    data = data.filter(row => row.nationality === this.subFilter);
                } else if (this.activeTab === 'establishments') {
                    data = data.filter(row => row.status === this.subFilter);
                } else if (this.activeTab === 'destinations') {
                    data = data.filter(row => row.location === this.subFilter);
                } else if (this.activeTab === 'experience') {
                    data = data.filter(row => row.sentiment === this.subFilter);
                } else if (this.activeTab === 'validation') {
                    data = data.filter(row => row.status === this.subFilter);
                } else if (this.activeTab === 'overall') {
                    data = data.filter(row => row.granularity === this.subFilter);
                }
            }

            // Filter by search query
            if (this.searchQuery.trim() !== '') {
                const query = this.searchQuery.toLowerCase();
                data = data.filter(row => {
                    return Object.values(row).some(val => 
                        String(val).toLowerCase().includes(query)
                    );
                });
            }

            return data;
        },

        exportReport(type) {
            alert(`Generating detailed report download for export in ${type.toUpperCase()} format...\nParameters:\nStart: ${this.startDate}\nEnd: ${this.endDate}\nReport: ${this.activeTab}`);
        }
    };
}
</script>
@endsection
