@extends('PTOAdmin.layout', ['activePage' => 'system-settings'])

@section('title', 'iTOUR - System Settings')

@section('admin-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">System Settings</h1>
            <p class="text-sm text-slate-500 mt-1">Configure tourism categories, analytics options, QR behavior, security, and backups.</p>
        </div>
    </div>

    <!-- Grid Columns -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Left Column -->
        <div class="space-y-6">
            <!-- Tourism Categories Card -->
            <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 space-y-6">
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">Tourism Categories</h3>
                
                <div class="flex flex-wrap gap-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-[4px] text-xs font-bold bg-sky-50 text-sky-850 border border-sky-100">RESORT</span>
                    <span class="inline-flex items-center px-3 py-1 rounded-[4px] text-xs font-bold bg-sky-50 text-sky-850 border border-sky-100">HOTEL</span>
                    <span class="inline-flex items-center px-3 py-1 rounded-[4px] text-xs font-bold bg-sky-50 text-sky-850 border border-sky-100">INN</span>
                    <span class="inline-flex items-center px-3 py-1 rounded-[4px] text-xs font-bold bg-sky-50 text-sky-850 border border-sky-100">LODGE</span>
                    <span class="inline-flex items-center px-3 py-1 rounded-[4px] text-xs font-bold bg-sky-50 text-sky-850 border border-sky-100">HOSTEL</span>
                    <span class="inline-flex items-center px-3 py-1 rounded-[4px] text-xs font-bold bg-sky-50 text-sky-850 border border-sky-100">RESTAURANT</span>
                    <span class="inline-flex items-center px-3 py-1 rounded-[4px] text-xs font-bold bg-sky-50 text-sky-850 border border-sky-100">TOUR OPERATOR</span>
                    <span class="inline-flex items-center px-3 py-1 rounded-[4px] text-xs font-bold bg-sky-50 text-sky-850 border border-sky-100">TRANSPORT</span>
                </div>

                <div class="pt-2">
                    <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-4 py-2 text-xs font-semibold rounded-[6px] transition flex items-center gap-2 shadow-xs">
                        <i class="fas fa-plus text-[10px]"></i> Add Category
                    </button>
                </div>
            </div>

                <!-- Checkbox -->
                <div class="flex items-center gap-3">
                    <input type="checkbox" id="auto-regen" checked class="w-4 h-4 text-[#0a4e5c] border-slate-300 rounded focus:ring-[#0a4e5c]">
                    <label for="auto-regen" class="text-xs font-semibold text-slate-600 select-none">Auto-regenerate on suspension</label>
                </div>

                <div class="pt-2">
                    <button class="w-full bg-[#0a4e5c] hover:bg-[#073640] text-white py-2.5 text-xs font-bold rounded-[6px] transition shadow-sm">
                        Save
                    </button>
                </div>
            </div>

            <!-- Backup Settings Card -->
            <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 space-y-6">
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">Backup Settings</h3>
                
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="backup-daily" checked class="w-4 h-4 text-[#0a4e5c] border-slate-300 rounded focus:ring-[#0a4e5c]">
                        <label for="backup-daily" class="text-xs font-semibold text-slate-600 select-none">Auto-backup daily</label>
                    </div>
                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="backup-compress" checked class="w-4 h-4 text-[#0a4e5c] border-slate-300 rounded focus:ring-[#0a4e5c]">
                        <label for="backup-compress" class="text-xs font-semibold text-slate-600 select-none">Compress backup files (.zip)</label>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Backup Location</label>
                    <input type="text" value="/var/backups/itour" class="w-full bg-slate-50 border border-slate-200 px-4 py-2.5 text-sm rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all">
                </div>

                <div class="flex items-center justify-between text-xs text-slate-400 font-semibold pt-1">
                    <span>Last backup: Today at 23:00</span>
                    <a href="#" class="text-[#0a4e5c] hover:underline">Backup Now</a>
                </div>

                <div class="pt-2">
                    <button class="w-full bg-[#0a4e5c] hover:bg-[#073640] text-white py-2.5 text-xs font-bold rounded-[6px] transition shadow-sm">
                        Save
                    </button>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Analytics Settings Card -->
            <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 space-y-6">
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">Analytics Settings</h3>
                
                <!-- Sentiment Engine -->
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Sentiment Engine</label>
                    <div class="relative">
                        <select class="w-full appearance-none bg-slate-50 border border-slate-200 text-slate-700 text-sm px-4 py-2.5 pr-10 rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all">
                            <option>iTOUR ML (default)</option>
                            <option>Lexicon Analysis</option>
                            <option>OpenAI GPT-4 Integration</option>
                        </select>
                        <i class="fas fa-chevron-down text-[10px] text-slate-400 absolute right-3.5 top-3.5 pointer-events-none"></i>
                    </div>
                </div>

                <!-- Retention Period -->
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Retention Period</label>
                    <div class="relative">
                        <select class="w-full appearance-none bg-slate-50 border border-slate-200 text-slate-700 text-sm px-4 py-2.5 pr-10 rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all">
                            <option>365 days</option>
                            <option>180 days</option>
                            <option>90 days</option>
                            <option>Indefinite</option>
                        </select>
                        <i class="fas fa-chevron-down text-[10px] text-slate-400 absolute right-3.5 top-3.5 pointer-events-none"></i>
                    </div>
                </div>

                <div class="pt-2">
                    <button class="w-full bg-[#0a4e5c] hover:bg-[#073640] text-white py-2.5 text-xs font-bold rounded-[6px] transition shadow-sm">
                        Save
                    </button>
                </div>
            </div>

            <!-- Security Card -->
            <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 space-y-6">
                <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider">Security</h3>
                
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="require-2fa" checked class="w-4 h-4 text-[#0a4e5c] border-slate-300 rounded focus:ring-[#0a4e5c]">
                        <label for="require-2fa" class="text-xs font-semibold text-slate-600 select-none">Require 2FA for personnel accounts</label>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="lock-account" checked class="w-4 h-4 text-[#0a4e5c] border-slate-300 rounded focus:ring-[#0a4e5c]">
                        <label for="lock-account" class="text-xs font-semibold text-slate-600 select-none">Lock account after 5 failed attempts</label>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="public-search" class="w-4 h-4 text-[#0a4e5c] border-slate-300 rounded focus:ring-[#0a4e5c]">
                        <label for="public-search" class="text-xs font-semibold text-slate-600 select-none">Allow public destination search without login</label>
                    </div>
                </div>

                <div class="pt-2">
                    <button class="w-full bg-[#0a4e5c] hover:bg-[#073640] text-white py-2.5 text-xs font-bold rounded-[6px] transition shadow-sm">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
