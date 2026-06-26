@extends('EstablishmentsUsers.layout', ['activePage' => 'reports'])

@section('title', 'Blue Bless Resort - Reports')

@section('establishment-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Establishment Reports</h1>
        <p class="text-sm text-slate-500 mt-1">Download monthly arrival reports and review visitor statistics.</p>
    </div>

    <!-- Reports Main Card -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6">
        <h3 class="font-bold text-slate-800 text-base border-b border-slate-50 pb-3">Available Reports</h3>
        
        <!-- List of Reports -->
        <div class="mt-6 space-y-4">
            <!-- Report item 1 -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-slate-50 border border-slate-100 rounded-xl gap-4 hover:shadow-2xs transition">
                <div class="flex items-center gap-3">
                    <div class="bg-[#0e505f]/10 text-[#0e505f] w-10 h-10 rounded-lg flex items-center justify-center shrink-0">
                        <i class="far fa-file-pdf text-lg"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Monthly Tourist Arrivals Report (June 2026)</h4>
                        <p class="text-[11px] text-slate-400 font-semibold mt-0.5">PDF · Generated on Jun 26, 2026 · 1.2 MB</p>
                    </div>
                </div>
                <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-semibold rounded-[6px] transition flex items-center gap-1.5 self-start sm:self-center">
                    <i class="fas fa-download text-[10px]"></i> Download
                </button>
            </div>

            <!-- Report item 2 -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-slate-50 border border-slate-100 rounded-xl gap-4 hover:shadow-2xs transition">
                <div class="flex items-center gap-3">
                    <div class="bg-[#0e505f]/10 text-[#0e505f] w-10 h-10 rounded-lg flex items-center justify-center shrink-0">
                        <i class="far fa-file-pdf text-lg"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Monthly Tourist Arrivals Report (May 2026)</h4>
                        <p class="text-[11px] text-slate-400 font-semibold mt-0.5">PDF · Generated on Jun 01, 2026 · 1.4 MB</p>
                    </div>
                </div>
                <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-semibold rounded-[6px] transition flex items-center gap-1.5 self-start sm:self-center">
                    <i class="fas fa-download text-[10px]"></i> Download
                </button>
            </div>

            <!-- Report item 3 -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-slate-50 border border-slate-100 rounded-xl gap-4 hover:shadow-2xs transition">
                <div class="flex items-center gap-3">
                    <div class="bg-[#0e505f]/10 text-[#0e505f] w-10 h-10 rounded-lg flex items-center justify-center shrink-0">
                        <i class="far fa-file-excel text-lg"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Annual Summary Report (2025)</h4>
                        <p class="text-[11px] text-slate-400 font-semibold mt-0.5">XLSX · Generated on Jan 03, 2026 · 4.8 MB</p>
                    </div>
                </div>
                <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-xs font-semibold rounded-[6px] transition flex items-center gap-1.5 self-start sm:self-center">
                    <i class="fas fa-download text-[10px]"></i> Download
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
