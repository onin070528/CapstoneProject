@extends('PTOAdmin.layout', ['activePage' => 'qr-generation'])

@section('title', 'iTOUR - QR Code Generation')

@section('admin-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">QR Code Generation</h1>
            <p class="text-sm text-slate-500 mt-1">Issue or regenerate the unique QR code for any accredited establishment.</p>
        </div>
    </div>

    <!-- Alert / Workflow Banner -->
    <div class="bg-sky-50 border border-sky-100 rounded-xl p-4 flex items-center gap-3 shadow-2xs">
        <i class="fas fa-info-circle text-sky-600 text-lg"></i>
        <p class="text-xs text-sky-800 font-medium leading-relaxed">
            <span class="font-bold">Workflow:</span> Application Submitted &rarr; Verification &rarr; Approval &rarr; <span class="font-bold text-[#0a5c51]">Automatic QR Generation</span> &rarr; Establishment Activation
        </p>
    </div>

    <!-- Main Content Two-Column Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Column 1: Generate/Regenerate Card -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 lg:col-span-6 flex flex-col justify-between">
            <div class="space-y-6">
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">Generate / Regenerate</h3>
                
                <!-- Establishment Select -->
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Establishment</label>
                    <div class="relative">
                        <select class="w-full bg-slate-50 border border-slate-200 text-slate-700 text-sm px-4 py-2.5 pr-10 rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all">
                            <option>EST-001 — Blue Bless Resort</option>
                            <option>EST-002 — Botona Beach Resort</option>
                            <option>EST-003 — Mati Marina Hotel</option>
                            <option>EST-004 — Aliwagwag Eco Lodge</option>
                            <option>EST-006 — Pujada Bay Diving Center</option>
                            <option>EST-007 — Cateel Heritage Café</option>
                        </select>
                        <i class="fas fa-chevron-down text-[10px] text-slate-400 absolute right-3.5 top-3.5 pointer-events-none"></i>
                    </div>
                </div>

                <!-- Status Badge -->
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Status</span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                </div>

                <!-- QR URL Input -->
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">QR Landing URL</label>
                    <div class="flex">
                        <input type="text" value="itour.gov.ph/register/EST-001" readonly class="w-full bg-slate-50 border border-slate-200 px-4 py-2 text-sm rounded-[6px] text-slate-500 focus:outline-none font-mono">
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center flex-wrap gap-3 mt-8">
                <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-5 py-2.5 text-xs font-bold rounded-[6px] transition flex items-center gap-2 shadow-sm">
                    <i class="fas fa-sync-alt text-[10px]"></i> Regenerate QR
                </button>
                <button class="bg-white border border-slate-200 text-slate-700 px-5 py-2.5 text-xs font-bold rounded-[6px] hover:bg-slate-50 transition flex items-center gap-2 shadow-xs">
                    <i class="fas fa-arrow-down text-[10px]"></i> Download
                </button>
                <button class="bg-white hover:bg-slate-50 text-slate-700 px-4 py-2 text-xs font-bold rounded flex items-center gap-2 transition">
                    <i class="fas fa-print text-[10px]"></i> Print
                </button>
            </div>
        </div>

        <!-- Column 2: Preview Card -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 lg:col-span-6 flex flex-col items-center justify-center min-h-[320px]">
            <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider self-start mb-6">Preview · Blue Bless Resort</h3>
            
            <div class="flex flex-col items-center gap-4 py-6">
                <!-- QR Code Box Representation -->
                <div class="w-48 h-48 border border-slate-100 rounded-lg p-2.5 bg-white shadow-2xs flex items-center justify-center">
                    <svg viewBox="0 0 100 100" class="w-full h-full text-slate-800">
                        <!-- Simulated QR Grid Pattern -->
                        <rect x="0" y="0" width="30" height="30" fill="currentColor" />
                        <rect x="5" y="5" width="20" height="20" fill="white" />
                        <rect x="10" y="10" width="10" height="10" fill="currentColor" />

                        <rect x="70" y="0" width="30" height="30" fill="currentColor" />
                        <rect x="75" y="5" width="20" height="20" fill="white" />
                        <rect x="80" y="10" width="10" height="10" fill="currentColor" />

                        <rect x="0" y="70" width="30" height="30" fill="currentColor" />
                        <rect x="5" y="75" width="20" height="20" fill="white" />
                        <rect x="10" y="80" width="10" height="10" fill="currentColor" />

                        <rect x="35" y="5" width="10" height="10" fill="currentColor" />
                        <rect x="50" y="15" width="10" height="10" fill="currentColor" />
                        <rect x="40" y="25" width="15" height="10" fill="currentColor" />
                        <rect x="55" y="5" width="10" height="20" fill="currentColor" />

                        <rect x="75" y="35" width="15" height="10" fill="currentColor" />
                        <rect x="85" y="50" width="10" height="15" fill="currentColor" />
                        <rect x="70" y="55" width="10" height="10" fill="currentColor" />

                        <rect x="35" y="75" width="15" height="10" fill="currentColor" />
                        <rect x="55" y="70" width="10" height="20" fill="currentColor" />
                        <rect x="45" y="85" width="10" height="10" fill="currentColor" />

                        <rect x="35" y="45" width="30" height="20" fill="currentColor" />
                        <rect x="40" y="50" width="20" height="10" fill="white" />
                        <rect x="45" y="55" width="10" height="5" fill="currentColor" />
                    </svg>
                </div>

                <div class="text-center mt-2">
                    <p class="font-extrabold text-base text-slate-800 leading-tight">Blue Bless Resort</p>
                    <p class="text-xs font-semibold text-slate-400 mt-1">EST-001 · Mati City</p>
                </div>
            </div>
        </div>
    </div>

    <!-- QR Analytics Card -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6">
        <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-6">QR Analytics (last 30 days)</h3>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="flex flex-col">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Scans</span>
                <span class="text-2xl font-extrabold text-slate-800 tracking-tight mt-2">4,829</span>
            </div>
            <div class="flex flex-col border-l border-slate-100 pl-6">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Unique Devices</span>
                <span class="text-2xl font-extrabold text-slate-800 tracking-tight mt-2">3,612</span>
            </div>
            <div class="flex flex-col border-l border-slate-100 pl-6">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Conversion Rate</span>
                <span class="text-2xl font-extrabold text-slate-800 tracking-tight mt-2">89%</span>
            </div>
            <div class="flex flex-col border-l border-slate-100 pl-6">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Peak Hour</span>
                <span class="text-2xl font-extrabold text-slate-800 tracking-tight mt-2">2:00 PM</span>
            </div>
        </div>
    </div>
</div>
@endsection
