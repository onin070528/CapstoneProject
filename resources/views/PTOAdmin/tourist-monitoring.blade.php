@extends('PTOAdmin.layout', ['activePage' => 'tourist-monitoring'])

@section('title', 'iTOUR - Tourist Monitoring')

@section('admin-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Tourist Monitoring</h1>
            <p class="text-sm text-slate-500 mt-1">All tourist registrations across the province.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="bg-white border border-slate-200 text-slate-700 px-4 py-2 text-sm font-semibold rounded-[6px] hover:bg-slate-50 transition flex items-center gap-2 shadow-xs">
                <i class="fas fa-arrow-down text-xs"></i> Export Excel
            </button>
            <button class="bg-white border border-slate-200 text-slate-700 px-4 py-2 text-sm font-semibold rounded-[6px] hover:bg-slate-50 transition flex items-center gap-2 shadow-xs">
                <i class="fas fa-arrow-down text-xs"></i> Export PDF
            </button>
        </div>
    </div>

    <!-- Main Container Card -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
        <!-- Filters Box -->
        <div class="p-6 border-b border-slate-100 space-y-4">
            <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
                <!-- Search -->
                <div class="relative flex-1 max-w-md">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-slate-400 text-sm"></i>
                    </span>
                    <input type="text" placeholder="Search by name or ID..." class="w-full bg-slate-50 border border-slate-200 pl-10 pr-4 py-2 text-sm rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all">
                </div>

                <!-- Dropdowns -->
                <div class="flex flex-wrap items-center gap-3">
                    <div class="relative">
                        <select class="appearance-none bg-slate-50 border border-slate-200 text-slate-700 text-xs px-3 py-2 pr-8 rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]">
                            <option>All</option>
                            <option>Filipino</option>
                            <option>Foreign</option>
                        </select>
                        <i class="fas fa-chevron-down text-[10px] text-slate-400 absolute right-3 top-3 pointer-events-none"></i>
                    </div>

                    <div class="relative">
                        <select class="appearance-none bg-slate-50 border border-slate-200 text-slate-700 text-xs px-3 py-2 pr-8 rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]">
                            <option>All establishments</option>
                            <option>Blue Bless Resort</option>
                            <option>Botona Beach Resort</option>
                            <option>Mati Marina Hotel</option>
                            <option>Aliwagwag Eco Lodge</option>
                            <option>Pacific View Inn</option>
                            <option>Pujada Bay Diving Center</option>
                            <option>Cateel Heritage Café</option>
                            <option>Sunrise Surf Hostel</option>
                        </select>
                        <i class="fas fa-chevron-down text-[10px] text-slate-400 absolute right-3 top-3 pointer-events-none"></i>
                    </div>
                </div>
            </div>

            <!-- Date Picker row -->
            <div class="flex justify-end">
                <div class="relative w-48">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="far fa-calendar text-slate-400 text-sm"></i>
                    </span>
                    <input type="text" placeholder="dd/mm/yyyy" class="w-full bg-slate-50 border border-slate-200 pl-10 pr-4 py-1.5 text-xs rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all">
                </div>
            </div>
        </div>

        <!-- Table View -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-100 text-slate-400 text-[10px] font-bold tracking-wider uppercase">
                        <th class="py-4 px-6">Reference</th>
                        <th class="py-4 px-6">Tourist</th>
                        <th class="py-4 px-6">Nationality</th>
                        <th class="py-4 px-6">Establishment</th>
                        <th class="py-4 px-6">Destination</th>
                        <th class="py-4 px-6">Date</th>
                        <th class="py-4 px-6">Purpose</th>
                        <th class="py-4 px-6">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700 text-sm font-medium">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">REG-02400</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="font-semibold text-slate-800">Ana Reyes</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">Female · 22y</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-500">Filipino</td>
                        <td class="py-4 px-6 text-slate-600">Blue Bless Resort</td>
                        <td class="py-4 px-6 text-slate-600">Dahican Beach</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-01</td>
                        <td class="py-4 px-6 text-slate-500">Leisure</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                    </tr>
                    
                    <!-- Row 2 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">REG-02401</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="font-semibold text-slate-800">Mark Tan</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">Male · 23y</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="text-slate-500">American</span>
                                <span class="bg-blue-50 text-blue-600 px-1.5 py-0.5 rounded text-[9px] font-extrabold tracking-wider uppercase">FRGN</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-600">Botona Beach Resort</td>
                        <td class="py-4 px-6 text-slate-600">Sleeping Dinosaur</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-02</td>
                        <td class="py-4 px-6 text-slate-500">Business</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">REG-02402</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="font-semibold text-slate-800">Yuki Tanaka</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">Female · 24y</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="text-slate-500">Japanese</span>
                                <span class="bg-blue-50 text-blue-600 px-1.5 py-0.5 rounded text-[9px] font-extrabold tracking-wider uppercase">FRGN</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-600">Mati Marina Hotel</td>
                        <td class="py-4 px-6 text-slate-600">Pujada Bay</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-03</td>
                        <td class="py-4 px-6 text-slate-500">Family Visit</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">REG-02403</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="font-semibold text-slate-800">Min-Jun Park</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">Male · 25y</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="text-slate-500">Korean</span>
                                <span class="bg-blue-50 text-blue-600 px-1.5 py-0.5 rounded text-[9px] font-extrabold tracking-wider uppercase">FRGN</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-600">Aliwagwag Eco Lodge</td>
                        <td class="py-4 px-6 text-slate-600">Subangan Museum</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-04</td>
                        <td class="py-4 px-6 text-slate-500">Adventure</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                    </tr>

                    <!-- Row 5 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">REG-02404</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="font-semibold text-slate-800">Wei Chen</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">Female · 26y</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="text-slate-500">Chinese</span>
                                <span class="bg-blue-50 text-blue-600 px-1.5 py-0.5 rounded text-[9px] font-extrabold tracking-wider uppercase">FRGN</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-600">Pacific View Inn</td>
                        <td class="py-4 px-6 text-slate-600">Cape San Agustin</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-05</td>
                        <td class="py-4 px-6 text-slate-500">Cultural Tour</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                    </tr>

                    <!-- Row 6 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">REG-02405</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="font-semibold text-slate-800">Sarah Johnson</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">Male · 27y</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="text-slate-500">Australian</span>
                                <span class="bg-blue-50 text-blue-600 px-1.5 py-0.5 rounded text-[9px] font-extrabold tracking-wider uppercase">FRGN</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-600">Pujada Bay Diving Center</td>
                        <td class="py-4 px-6 text-slate-600">Aliwagwag Falls</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-06</td>
                        <td class="py-4 px-6 text-slate-500">Diving</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                    </tr>

                    <!-- Row 7 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">REG-02406</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="font-semibold text-slate-800">Hans Mueller</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">Female · 28y</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="text-slate-500">German</span>
                                <span class="bg-blue-50 text-blue-600 px-1.5 py-0.5 rounded text-[9px] font-extrabold tracking-wider uppercase">FRGN</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-600">Cateel Heritage Café</td>
                        <td class="py-4 px-6 text-slate-600">Dahican Beach</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-07</td>
                        <td class="py-4 px-6 text-slate-500">Leisure</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                    </tr>

                    <!-- Row 8 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">REG-02407</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="font-semibold text-slate-800">Pierre Dubois</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">Male · 29y</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="text-slate-500">French</span>
                                <span class="bg-blue-50 text-blue-600 px-1.5 py-0.5 rounded text-[9px] font-extrabold tracking-wider uppercase">FRGN</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-600">Sunrise Surf Hostel</td>
                        <td class="py-4 px-6 text-slate-600">Sleeping Dinosaur</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-08</td>
                        <td class="py-4 px-6 text-slate-500">Business</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                    </tr>

                    <!-- Row 9 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">REG-02408</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="font-semibold text-slate-800">Emma Wilson</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">Female · 30y</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="text-slate-500">British</span>
                                <span class="bg-blue-50 text-blue-600 px-1.5 py-0.5 rounded text-[9px] font-extrabold tracking-wider uppercase">FRGN</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-400 font-normal">—</td>
                        <td class="py-4 px-6 text-slate-600">Pujada Bay</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-09</td>
                        <td class="py-4 px-6 text-slate-500">Family Visit</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="p-4 border-t border-slate-100 bg-slate-50/30 flex items-center justify-between">
            <span class="text-xs text-slate-400">Showing 9 registrations</span>
            <div class="flex items-center gap-1.5">
                <button class="w-8 h-8 flex items-center justify-center border border-slate-200 rounded text-slate-500 hover:bg-white text-xs disabled:opacity-50" disabled><i class="fas fa-chevron-left"></i></button>
                <button class="w-8 h-8 flex items-center justify-center bg-[#0a4e5c] text-white rounded text-xs font-bold">1</button>
                <button class="w-8 h-8 flex items-center justify-center border border-slate-200 rounded text-slate-500 hover:bg-white text-xs disabled:opacity-50" disabled><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection
