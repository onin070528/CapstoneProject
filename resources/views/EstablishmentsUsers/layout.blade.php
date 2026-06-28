@extends('layouts.app')

@section('content')
<div class="h-screen overflow-hidden bg-[#f4f7f6] flex font-sans" x-data="{ mobileSidebarOpen: false }">
    <!-- Sidebar for Desktop -->
    <aside class="hidden lg:flex flex-col w-64 bg-[#0f1f2c] text-slate-300 shrink-0 border-r border-slate-800 fixed top-0 left-0 h-screen z-40">
        <!-- Sidebar Header (Logo) -->
        <div class="h-20 flex items-center gap-3 px-6 border-b border-slate-800/60">
            <div class="bg-[#0e505f] text-white rounded-[6px] w-9 h-9 flex items-center justify-center font-bold text-base tracking-tight shrink-0 shadow-sm">
                iT
            </div>
            <div class="flex flex-col">
                <span class="font-extrabold text-lg text-white tracking-tight leading-none">iTOUR</span>
                <span class="text-[9px] font-bold text-slate-400 tracking-[0.18em] leading-none mt-1">ESTABLISHMENT</span>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 px-4 py-6 space-y-7 overflow-y-auto">
            <!-- MAIN Section -->
            <div>
                <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Main</span>
                <div class="mt-2 space-y-1">
                    <a href="/establishment/dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'dashboard' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-th-large text-base w-5"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="/establishment/qr-code" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'qr-code' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-qrcode text-base w-5"></i>
                        <span>QR Code</span>
                    </a>
                </div>
            </div>

            <!-- TOURISTS Section -->
            <div>
                <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Tourists</span>
                <div class="mt-2 space-y-1">
                    <a href="/establishment/registrations" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'registrations' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-users text-base w-5"></i>
                        <span>Registrations</span>
                    </a>
                    <a href="/establishment/manual-encoding" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'manual-encoding' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-keyboard text-base w-5"></i>
                        <span>Manual Encoding</span>
                    </a>
                </div>
            </div>

            <!-- PROFILE SETTINGS Section -->
                 <div>
                    <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Profile Settings</span>
                    <div class="mt-2 space-y-1">
                        <a href="/establishment/profile" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'profile' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-id-card text-base w-5"></i>
                            <span>Profile</span>
                        </a>
                    </div>
                </div>


            <!-- ENGAGEMENT Section -->
            <div>
                <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Engagement</span>
                <div class="mt-2 space-y-1">
                    <a href="/establishment/feedback" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'feedback' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-star text-base w-5"></i>
                        <span>Feedback & Reviews</span>
                    </a>
                    <a href="/establishment/reports" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'reports' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-chart-bar text-base w-5"></i>
                        <span>Reports</span>
                    </a>
                    <a href="/establishment/notifications" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 {{ ($activePage ?? '') === 'notifications' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                        <i class="fas fa-history text-base w-5"></i>
                        <span>Activity Log</span>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Sidebar Footer (User Info) -->
        <div class="p-4 border-t border-slate-800/60 bg-[#0b1721] flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="bg-[#0e505f] text-white rounded-full w-10 h-10 flex items-center justify-center font-bold text-sm tracking-tight shrink-0 shadow-sm">
                    JD
                </div>
                <div class="flex flex-col min-w-0">
                    <span class="font-semibold text-xs text-white truncate">Juan Dela Cruz</span>
                    <span class="text-[10px] text-slate-400 truncate">Establishment Owner</span>
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
                        <span class="text-[9px] font-bold text-slate-400 tracking-[0.18em] leading-none mt-1">ESTABLISHMENT</span>
                    </div>
                </div>
                <button @click="mobileSidebarOpen = false" class="text-slate-400 hover:text-white p-1">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-7 overflow-y-auto">
                <!-- MAIN Section -->
                <div>
                    <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Main</span>
                    <div class="mt-2 space-y-1">
                        <a href="/establishment/dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'dashboard' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-th-large text-base w-5"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="/establishment/qr-code" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'qr-code' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-qrcode text-base w-5"></i>
                            <span>QR Code</span>
                        </a>
                    </div>
                </div>

                <!-- TOURISTS Section -->
                <div>
                    <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Tourists</span>
                    <div class="mt-2 space-y-1">
                        <a href="/establishment/registrations" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'registrations' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-users text-base w-5"></i>
                            <span>Registrations</span>
                        </a>
                        <a href="/establishment/manual-encoding" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'manual-encoding' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-keyboard text-base w-5"></i>
                            <span>Manual Encoding</span>
                        </a>
                    </div>
                </div>


                 <div>
                    <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Profile Settings</span>
                    <div class="mt-2 space-y-1">
                        <a href="/establishment/profile" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'profile' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-id-card text-base w-5"></i>
                            <span>Profile</span>
                        </a>
                    </div>
                </div>

                <!-- ENGAGEMENT Section -->
                <div>
                    <span class="px-3 text-[10px] font-bold tracking-widest text-slate-500 uppercase">Engagement</span>
                    <div class="mt-2 space-y-1">
                        <a href="/establishment/feedback" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'feedback' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-star text-base w-5"></i>
                            <span>Feedback & Reviews</span>
                        </a>
                        <a href="/establishment/reports" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'reports' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-chart-bar text-base w-5"></i>
                            <span>Reports</span>
                        </a>
                        <a href="/establishment/notifications" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ ($activePage ?? '') === 'notifications' ? 'bg-[#1a2d3c] text-white' : 'text-slate-400 hover:bg-[#152733] hover:text-white' }}">
                            <i class="fas fa-history text-base w-5"></i>
                            <span>Activity Log</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Mobile Footer -->
            <div class="p-4 border-t border-slate-800/60 bg-[#0b1721] flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="bg-[#0e505f] text-white rounded-full w-10 h-10 flex items-center justify-center font-bold text-sm tracking-tight shrink-0">
                        JD
                    </div>
                    <div class="flex flex-col min-w-0">
                        <span class="font-semibold text-xs text-white truncate">Juan Dela Cruz</span>
                        <span class="text-[10px] text-slate-400 truncate">Establishment Owner</span>
                    </div>
                </div>
                <a href="{{ route('logout') }}" class="text-slate-400 hover:text-white p-1.5 rounded transition">
                    <i class="fas fa-sign-out-alt text-sm"></i>
                </a>
            </div>
        </aside>
    </div>

    <!-- Main Content Area -->
    <div class="flex flex-col flex-1 h-screen overflow-hidden lg:ml-64">
        <!-- Top Navbar -->
        <header class="h-20 bg-white border-b border-slate-100 px-4 sm:px-6 lg:px-8 flex items-center justify-between shrink-0 z-30">
            <div class="flex items-center gap-4">
                <!-- Hamburger Button for Mobile -->
                <button @click="mobileSidebarOpen = true" class="lg:hidden p-2 -ml-2 text-slate-600 hover:text-slate-800 rounded-md focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                
                <span class="text-slate-500 font-medium text-sm hidden sm:inline">Establishment Portal</span>
            </div>

            <!-- Navbar Center / Right: Search and User Utilities -->
            <div class="flex items-center gap-4 sm:gap-6">

                <!-- Utilities Group -->
                <div class="flex items-center gap-3">
                    <!-- Notifications -->
                    <a href="/establishment/notifications" class="w-9 h-9 border border-slate-200 rounded-[6px] flex items-center justify-center relative text-slate-500 hover:text-[#0a4e5c] hover:border-[#0a4e5c] transition duration-200 bg-white shadow-xs">
                        <i class="fas fa-bell text-[15px]"></i>
                        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-amber-500 border border-white rounded-full"></span>
                    </a>

                    <!-- Help Question Mark -->
                    <a href="#" class="w-9 h-9 border border-slate-200 rounded-[6px] flex items-center justify-center text-slate-500 hover:text-[#0a4e5c] hover:border-[#0a4e5c] transition duration-200 bg-white shadow-xs">
                        <i class="fas fa-question text-[13px]"></i>
                    </a>
                </div>
            </div>
        </header>

        <!-- Dynamic Content Body -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8 bg-[#f4f7f6]">
            @yield('establishment-content')
        </main>
    </div>
</div>

<!-- Add simple vanilla JS toggle backup for systems not compiling Alpine.js -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Alpine === 'undefined') {
            const btn = document.querySelector('[x-data] button');
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
