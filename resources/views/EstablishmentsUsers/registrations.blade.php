@extends('EstablishmentsUsers.layout', ['activePage' => 'registrations'])

@section('title', 'Blue Bless Resort - Registrations')

@section('establishment-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Tourist Registrations</h1>
            <p class="text-sm text-slate-500 mt-1">Log of tourists checked in at your establishment.</p>
        </div>
        <a href="/establishment/manual-encoding" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-semibold rounded-[6px] tracking-wide transition shadow-sm flex items-center gap-1.5 self-start sm:self-center">
            <i class="fas fa-plus text-[10px]"></i> Arrival Recording
        </a>
    </div>

    <!-- Registrations Table Card -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
        <!-- Table Search / Filters -->
        <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h3 class="font-bold text-slate-800 text-sm">Recent Check-ins</h3>
            <div class="flex items-center gap-3">
                <input type="text" placeholder="Search visitors..." class="bg-slate-50 border border-slate-200 px-3 py-1.5 text-xs rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                <select class="bg-slate-50 border border-slate-200 px-3 py-1.5 text-xs rounded-[6px] text-slate-600 focus:outline-none focus:bg-white transition-all">
                    <option value="">All Methods</option>
                    <option value="qr">QR Scan</option>
                    <option value="manual">Arrival Recording</option>
                </select>
            </div>
        </div>

        <!-- Table Grid -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-100 text-slate-400 text-[10px] font-bold tracking-wider uppercase">
                        <th class="py-4 px-5">No.</th>
                        <th class="py-4 px-5">Date</th>
                        <th class="py-4 px-5">Name of Visitor</th>
                        <th class="py-4 px-5">Gender</th>
                        <th class="py-4 px-5">Place of Residence</th>
                        <th class="py-4 px-5">Remarks</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 text-slate-700 text-xs">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-5 font-semibold text-slate-500">001</td>
                        <td class="py-4 px-5 font-medium text-slate-500 whitespace-nowrap">Jun 28, 2026</td>
                        <td class="py-4 px-5 font-bold text-slate-800">Ana Reyes</td>
                        <td class="py-4 px-5 font-medium text-slate-600">Female</td>
                        <td class="py-4 px-5">
                            <span class="bg-sky-50 text-sky-700 font-semibold px-2 py-0.5 rounded text-[10px] border border-sky-100/40">Philippines</span>
                        </td>
                        <td class="py-4 px-5 font-medium text-slate-500">Manila, Metro Manila</td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-5 font-semibold text-slate-500">002</td>
                        <td class="py-4 px-5 font-medium text-slate-500 whitespace-nowrap">Jun 27, 2026</td>
                        <td class="py-4 px-5 font-bold text-slate-800">Kenji Tanaka</td>
                        <td class="py-4 px-5 font-medium text-slate-600">Male</td>
                        <td class="py-4 px-5">
                            <span class="bg-purple-50 text-purple-700 font-semibold px-2 py-0.5 rounded text-[10px] border border-purple-100/40">Foreign</span>
                        </td>
                        <td class="py-4 px-5 font-medium text-slate-500">Tokyo, Japan</td>
                    </tr>
                    <!-- Row 3 -->
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-5 font-semibold text-slate-500">003</td>
                        <td class="py-4 px-5 font-medium text-slate-500 whitespace-nowrap">Jun 27, 2026</td>
                        <td class="py-4 px-5 font-bold text-slate-800">John Smith</td>
                        <td class="py-4 px-5 font-medium text-slate-600">Male</td>
                        <td class="py-4 px-5">
                            <span class="bg-purple-50 text-purple-700 font-semibold px-2 py-0.5 rounded text-[10px] border border-purple-100/40">Foreign</span>
                        </td>
                        <td class="py-4 px-5 font-medium text-slate-500">Sydney, Australia</td>
                    </tr>
                    <!-- Row 4 -->
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-5 font-semibold text-slate-500">004</td>
                        <td class="py-4 px-5 font-medium text-slate-500 whitespace-nowrap">Jun 25, 2026</td>
                        <td class="py-4 px-5 font-bold text-slate-800">Maria Santos</td>
                        <td class="py-4 px-5 font-medium text-slate-600">Female</td>
                        <td class="py-4 px-5">
                            <span class="bg-sky-50 text-sky-700 font-semibold px-2 py-0.5 rounded text-[10px] border border-sky-100/40">Philippines</span>
                        </td>
                        <td class="py-4 px-5 font-medium text-slate-500">Davao City, Davao del Sur</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Table Pagination -->
        <div class="p-5 border-t border-slate-100 flex items-center justify-between text-slate-400 text-xs font-semibold">
            <span>Showing 1 to 4 of 284 check-ins</span>
            <div class="flex items-center gap-2">
                <button class="border border-slate-200 text-slate-600 px-3 py-1.5 rounded-[6px] hover:bg-slate-50 transition">Previous</button>
                <button class="border border-slate-200 text-slate-600 px-3 py-1.5 rounded-[6px] hover:bg-slate-50 transition">Next</button>
            </div>
        </div>
    </div>
</div>
@endsection
