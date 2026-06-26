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
            <i class="fas fa-plus text-[10px]"></i> Manual Entry
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
                    <option value="manual">Manual Entry</option>
                </select>
            </div>
        </div>

        <!-- Table Grid -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-100 text-slate-400 text-[10px] font-bold tracking-wider uppercase">
                        <th class="py-4 px-6">Visitor Name</th>
                        <th class="py-4 px-6">Method</th>
                        <th class="py-4 px-6">Purpose</th>
                        <th class="py-4 px-6">Origin</th>
                        <th class="py-4 px-6">Date & Time</th>
                        <th class="py-4 px-6 text-right">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 text-slate-700 text-xs">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 font-bold text-slate-800">Ana Reyes</td>
                        <td class="py-4 px-6">
                            <span class="bg-blue-50 text-blue-700 font-semibold px-2 py-0.5 rounded text-[10px] border border-blue-100/30 flex items-center gap-1 w-max">
                                <i class="fas fa-qrcode text-[9px]"></i> QR Scan
                            </span>
                        </td>
                        <td class="py-4 px-6 font-medium text-slate-500">Leisure</td>
                        <td class="py-4 px-6 font-medium text-slate-500">Manila, Philippines</td>
                        <td class="py-4 px-6 font-medium text-slate-500">Today, 2:21 AM</td>
                        <td class="py-4 px-6 text-right">
                            <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[10px]">Verified</span>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 font-bold text-slate-800">Kenji Tanaka</td>
                        <td class="py-4 px-6">
                            <span class="bg-blue-50 text-blue-700 font-semibold px-2 py-0.5 rounded text-[10px] border border-blue-100/30 flex items-center gap-1 w-max">
                                <i class="fas fa-qrcode text-[9px]"></i> QR Scan
                            </span>
                        </td>
                        <td class="py-4 px-6 font-medium text-slate-500">Leisure</td>
                        <td class="py-4 px-6 font-medium text-slate-500">Tokyo, Japan</td>
                        <td class="py-4 px-6 font-medium text-slate-500">Yesterday, 4:15 PM</td>
                        <td class="py-4 px-6 text-right">
                            <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[10px]">Verified</span>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 font-bold text-slate-800">John Smith</td>
                        <td class="py-4 px-6">
                            <span class="bg-amber-50 text-amber-700 font-semibold px-2 py-0.5 rounded text-[10px] border border-amber-100/30 flex items-center gap-1 w-max">
                                <i class="fas fa-keyboard text-[9px]"></i> Manual
                            </span>
                        </td>
                        <td class="py-4 px-6 font-medium text-slate-500">Business</td>
                        <td class="py-4 px-6 font-medium text-slate-500">Sydney, Australia</td>
                        <td class="py-4 px-6 font-medium text-slate-500">Yesterday, 11:30 AM</td>
                        <td class="py-4 px-6 text-right">
                            <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[10px]">Verified</span>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 font-bold text-slate-800">Maria Santos</td>
                        <td class="py-4 px-6">
                            <span class="bg-blue-50 text-blue-700 font-semibold px-2 py-0.5 rounded text-[10px] border border-blue-100/30 flex items-center gap-1 w-max">
                                <i class="fas fa-qrcode text-[9px]"></i> QR Scan
                            </span>
                        </td>
                        <td class="py-4 px-6 font-medium text-slate-500">Leisure</td>
                        <td class="py-4 px-6 font-medium text-slate-500">Davao City, Philippines</td>
                        <td class="py-4 px-6 font-medium text-slate-500">June 25, 2026</td>
                        <td class="py-4 px-6 text-right">
                            <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[10px]">Verified</span>
                        </td>
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
