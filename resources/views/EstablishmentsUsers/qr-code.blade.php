@extends('EstablishmentsUsers.layout', ['activePage' => 'qr-code'])

@section('title', 'Blue Bless Resort - QR Code')

@section('establishment-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Establishment QR Code</h1>
        <p class="text-sm text-slate-500 mt-1">Display this code at your establishment entrance for tourist check-ins.</p>
    </div>

    <!-- Main Content Panel -->
    <div class="max-w-2xl bg-white rounded-xl border border-slate-100 shadow-sm p-8 flex flex-col items-center justify-center text-center">
        <!-- Badge -->
        <span class="bg-[#0e505f]/10 text-[#0e505f] border border-[#0e505f]/20 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Verified Accreditation</span>
        
        <h2 class="text-xl font-extrabold text-slate-800 mt-4">Blue Bless Resort</h2>
        <p class="text-xs text-slate-400 font-semibold mt-1">EST-001 · Mati City, Davao Oriental</p>

        <!-- QR Code Wrapper -->
        <div class="my-8 p-6 bg-slate-50 rounded-2xl border border-slate-100 flex items-center justify-center shadow-inner relative group">
            <!-- Simulated QR Code SVG -->
            <svg class="w-48 h-48 text-[#0f1f2c]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 3h6v6H3V3zm2 2v2h2V5H5zm8-2h6v6h-6V3zm2 2v2h2V5h-2zM3 13h6v6H3v-6zm2 2v2h2v-2H5zm13-2h3v2h-3v-2zm-3 3h3v3h-3v-3zm3 3h3v-3h-3v3zm-3-3h-3v-3h3v3zm-3 3H7v-3h3v3zm0-9H7V5h3v3zm8 8h-3v-3h3v3zM3 21h6v-2H3v2zm12-4V9h-2V7h2V5h2v4h2v2h-2v2h-2v2zm-4 4h2v-2h-2v2zm6 0h2v-2h-2v2z"/>
            </svg>
        </div>

        <p class="text-sm text-slate-500 font-medium max-w-sm">
            Tourists can scan this QR code using their iTOUR mobile app to quickly check in and register their visit.
        </p>

        <!-- Action Buttons -->
        <div class="mt-8 flex flex-wrap gap-4 justify-center">
            <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-5 py-2.5 rounded-[6px] font-semibold text-sm transition shadow-sm flex items-center gap-2">
                <i class="fas fa-download"></i> Download QR Poster
            </button>
            <button class="border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-600 px-5 py-2.5 text-sm font-semibold rounded-[6px] transition flex items-center gap-2">
                <i class="fas fa-print"></i> Print Poster
            </button>
        </div>
    </div>
</div>
@endsection
