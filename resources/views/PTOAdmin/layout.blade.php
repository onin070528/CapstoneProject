@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f4f7f6] flex font-sans" x-data="{ mobileSidebarOpen: false }">
    <!-- Sidebar for Desktop -->
    <aside class="hidden lg:flex flex-col w-64 bg-[#0f1f2c] text-slate-300 shrink-0 border-r border-slate-800">
        <!-- Sidebar Header (Logo) -->
        <div class="h-20 flex items-center gap-3 px-6 border-b border-slate-800/60">
            <div class="bg-[#0e505f] text-white rounded-[6px] w-9 h-9 flex items-center justify-center font-bold text-base tracking-tight shrink-0 shadow-sm">
                iT
            </div>
            <div class="flex flex-col">
                <span class="font-extrabold text-lg text-white tracking-tight leading-none">iTOUR</span>
                <span class="text-[9px] font-bold text-slate-400 tracking-[0.18em] leading-none mt-1">PERSONNEL</span>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
            <!-- OVERVIEW Section -->
            <div>
                <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Overview</span>
                <div class="mt-2 space-y-1">
                    <a href="/admin/dashboard" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'dashboard' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-th-large text-base w-5"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="/admin/tourist-monitoring" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'tourist-monitoring' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-user-friends text-base w-5"></i>
                        <span>Tourist Monitoring</span>
                    </a>
                    <a href="/admin/experience-analytics" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'experience-analytics' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-chart-line text-base w-5"></i>
                        <span>Experience Analytics</span>
                    </a>
                </div>
            </div>

            <!-- MANAGEMENT Section -->
            <div>
                <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Management</span>
                <div class="mt-2 space-y-1">
                    <a href="/admin/establishments" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'establishments' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-building text-base w-5"></i>
                        <span>Establishments</span>
                    </a>
                    <a href="/admin/qr-generation" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'qr-generation' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-qrcode text-base w-5"></i>
                        <span>QR Generation</span>
                    </a>
                    <a href="/admin/destinations" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'destinations' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-map-pin text-base w-5"></i>
                        <span>Destinations</span>
                    </a>
                    <a href="/admin/approvals" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'approvals' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-check-double text-base w-5"></i>
                        <span>Approvals</span>
                    </a>
                </div>
            </div>

            <!-- REPORTS Section -->
            <div>
                <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Reports</span>
                <div class="mt-2 space-y-1">
                    <a href="/admin/reports" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'reports' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-chart-bar text-base w-5"></i>
                        <span>Reports</span>
                    </a>
                </div>
            </div>

            <!-- ADMINISTRATION Section -->
            <div>
                <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Administration</span>
                <div class="mt-2 space-y-1">
                    <a href="/admin/user-management" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'user-management' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-user-cog text-base w-5"></i>
                        <span>User Management</span>
                    </a>
                    <a href="/admin/audit-logs" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'audit-logs' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-history text-base w-5"></i>
                        <span>Audit Logs</span>
                    </a>
                    <a href="/admin/system-settings" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'system-settings' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-cog text-base w-5"></i>
                        <span>System Settings</span>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Sidebar Footer (User Info) -->
        <div class="p-4 border-t border-slate-800/60 bg-[#0b1721] flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="bg-[#0e505f] text-white rounded-full w-10 h-10 flex items-center justify-center font-bold text-sm tracking-tight shrink-0 shadow-sm">
                    MS
                </div>
                <div class="flex flex-col min-w-0">
                    <span class="font-semibold text-xs text-white truncate">Maria Santos</span>
                    <span class="text-[10px] text-slate-400 truncate">Tourism Officer</span>
                </div>
            </div>
            <a href="{{ route('logout') }}" class="text-slate-400 hover:text-white p-1.5 rounded transition">
                <i class="fas fa-sign-out-alt text-sm"></i>
            </a>
        </div>
    </aside>

    <!-- Mobile Sidebar Drawer -->
    <div x-show="mobileSidebarOpen" class="fixed inset-0 z-50 flex lg:hidden" style="display: none;">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" @click="mobileSidebarOpen = false"></div>

        <!-- Sidebar Panel -->
        <aside class="relative flex flex-col w-64 bg-[#0f1f2c] text-slate-300 border-r border-slate-800 max-w-xs w-full"
               x-transition:enter="transition ease-in-out duration-300 transform"
               x-transition:enter-start="-translate-x-full"
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transition ease-in-out duration-300 transform"
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="-translate-x-full">
            
            <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800/60">
                <div class="flex items-center gap-3">
                    <div class="bg-[#0e505f] text-white rounded-[6px] w-9 h-9 flex items-center justify-center font-bold text-base tracking-tight shrink-0">
                        iT
                    </div>
                    <div class="flex flex-col">
                        <span class="font-extrabold text-lg text-white tracking-tight leading-none">iTOUR</span>
                        <span class="text-[9px] font-bold text-slate-400 tracking-[0.18em] leading-none mt-1">PERSONNEL</span>
                    </div>
                </div>
                <button @click="mobileSidebarOpen = false" class="text-slate-400 hover:text-white p-1">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
                <!-- OVERVIEW Section -->
                <div>
                    <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Overview</span>
                    <div class="mt-2 space-y-1">
                        <a href="/admin/dashboard" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'dashboard' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-th-large text-base w-5"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="/admin/tourist-monitoring" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'tourist-monitoring' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-user-friends text-base w-5"></i>
                            <span>Tourist Monitoring</span>
                        </a>
                        <a href="/admin/experience-analytics" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'experience-analytics' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-chart-line text-base w-5"></i>
                            <span>Experience Analytics</span>
                        </a>
                    </div>
                </div>

                <!-- MANAGEMENT Section -->
                <div>
                    <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Management</span>
                    <div class="mt-2 space-y-1">
                        <a href="/admin/establishments" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'establishments' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-building text-base w-5"></i>
                            <span>Establishments</span>
                        </a>
                        <a href="/admin/qr-generation" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'qr-generation' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-qrcode text-base w-5"></i>
                            <span>QR Generation</span>
                        </a>
                        <a href="/admin/destinations" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'destinations' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-map-pin text-base w-5"></i>
                            <span>Destinations</span>
                        </a>
                        <a href="/admin/approvals" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'approvals' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-check-double text-base w-5"></i>
                            <span>Approvals</span>
                        </a>
                    </div>
                </div>

                <!-- REPORTS Section -->
                <div>
                    <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Reports</span>
                    <div class="mt-2 space-y-1">
                        <a href="/admin/reports" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'reports' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-chart-bar text-base w-5"></i>
                            <span>Reports</span>
                        </a>
                    </div>
                </div>

                <!-- ADMINISTRATION Section -->
                <div>
                    <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Administration</span>
                    <div class="mt-2 space-y-1">
                        <a href="/admin/user-management" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'user-management' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-user-cog text-base w-5"></i>
                            <span>User Management</span>
                        </a>
                        <a href="/admin/audit-logs" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'audit-logs' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-history text-base w-5"></i>
                            <span>Audit Logs</span>
                        </a>
                        <a href="/admin/system-settings" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'system-settings' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-cog text-base w-5"></i>
                            <span>System Settings</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Mobile Footer -->
            <div class="p-4 border-t border-slate-800/60 bg-[#0b1721] flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-[#0e505f] text-white rounded-full w-10 h-10 flex items-center justify-center font-bold text-sm tracking-tight shrink-0">
                        MS
                    </div>
                    <div class="flex flex-col min-w-0">
                        <span class="font-semibold text-xs text-white truncate">Maria Santos</span>
                        <span class="text-[10px] text-slate-400 truncate">Tourism Officer</span>
                    </div>
                </div>
                <a href="{{ route('logout') }}" class="text-slate-400 hover:text-white p-1.5 rounded transition">
                    <i class="fas fa-sign-out-alt text-sm"></i>
                </a>
            </div>
        </aside>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-h-screen overflow-x-hidden">
        <!-- Top Navbar -->
        <header class="h-20 bg-white border-b border-slate-100 px-4 sm:px-6 lg:px-8 flex items-center justify-between shrink-0 sticky top-0 z-30">
            <div class="flex items-center gap-4">
                <!-- Hamburger Button for Mobile -->
                <button @click="mobileSidebarOpen = true" class="lg:hidden p-2 -ml-2 text-slate-600 hover:text-slate-800 rounded-md focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                
                <span class="text-slate-500 font-medium text-sm hidden sm:inline">Tourism Personnel Portal</span>
            </div>

            <!-- Navbar Center / Right: Search and User Utilities -->
            <div class="flex items-center gap-4 sm:gap-6">
                <!-- Search bar -->
                <div class="flex items-center">
                    <input type="text" placeholder="Search..." class="w-45 sm:w-60 bg-slate-50 border border-slate-200 px-4 py-2 text-sm rounded-l-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                    <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-sm font-semibold rounded-r-[6px] transition-colors shadow-sm">
                        Search
                    </button>
                </div>

                <!-- Utilities Group -->
                <div class="flex items-center gap-3">
                    <!-- Notifications -->
                    <div class="w-9 h-9 border border-slate-200 rounded-[6px] flex items-center justify-center relative text-slate-500 hover:text-[#0a4e5c] hover:border-[#0a4e5c] transition duration-200 bg-white cursor-pointer shadow-xs">
                        <i class="fas fa-bell text-[15px]"></i>
                        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-amber-500 border border-white rounded-full"></span>
                    </div>

                    <!-- Help Question Mark -->
                    <div class="w-9 h-9 border border-slate-200 rounded-[6px] flex items-center justify-center text-slate-500 hover:text-[#0a4e5c] hover:border-[#0a4e5c] transition duration-200 bg-white cursor-pointer shadow-xs">
                        <i class="fas fa-question text-[13px]"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dynamic Content Body -->
        <main class="flex-grow p-4 sm:p-6 lg:p-8 bg-[#f4f7f6]">
            @yield('admin-content')
        </main>
    </div>
</div>

<!-- Add simple vanilla JS toggle backup for systems not compiling Alpine.js -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Alpine === 'undefined') {
            const btn = document.querySelector('button[class*="lg:hidden"]');
            const drawer = document.querySelector('[x-show="mobileSidebarOpen"]');
            if (btn && drawer) {
                btn.addEventListener('click', function() {
                    drawer.style.display = 'flex';
                });
                const closeBtn = drawer.querySelector('button');
                const backdrop = drawer.querySelector('.bg-slate-900\\/60');
                const closeAction = function() {
                    drawer.style.display = 'none';
                };
                if (closeBtn) closeBtn.addEventListener('click', closeAction);
                if (backdrop) backdrop.addEventListener('click', closeAction);
            }
        }
    });
</script>
@endsection
