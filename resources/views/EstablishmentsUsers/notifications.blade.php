@extends('EstablishmentsUsers.layout', ['activePage' => 'notifications'])

@section('title', 'Blue Bless Resort - Notifications')

@section('establishment-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Notifications</h1>
            <p class="text-sm text-slate-500 mt-1">Updates from tourists, announcements, and accreditation alerts.</p>
        </div>
        <button class="self-start sm:self-center border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-600 px-4 py-2 text-xs font-semibold rounded-[6px] tracking-wide transition shadow-3xs">
            Mark all read
        </button>
    </div>

    <!-- Notifications List -->
    <div class="space-y-4">
        <!-- Notification 1: New tourist registration -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-5 flex items-start gap-4 hover:shadow-md transition">
            <!-- Icon Box -->
            <div class="bg-violet-50 text-violet-600 border border-violet-100/50 rounded-lg w-11 h-11 flex items-center justify-center shrink-0">
                <i class="fas fa-users text-base"></i>
            </div>
            <!-- Content -->
            <div class="flex-grow min-w-0">
                <div class="flex flex-wrap items-center gap-2">
                    <h3 class="font-bold text-slate-800 text-sm">New tourist registration</h3>
                    <span class="bg-blue-50 text-blue-600 border border-blue-100/50 px-1.5 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase">New</span>
                </div>
                <p class="text-xs text-slate-500 font-medium mt-1">Ana Reyes registered via QR scan.</p>
            </div>
            <!-- Time -->
            <span class="text-xs text-slate-400 font-semibold whitespace-nowrap shrink-0 self-start sm:self-center">2 min ago</span>
        </div>

        <!-- Notification 2: Tourism Office announcement -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-5 flex items-start gap-4 hover:shadow-md transition">
            <!-- Icon Box -->
            <div class="bg-amber-50 text-amber-600 border border-amber-100/50 rounded-lg w-11 h-11 flex items-center justify-center shrink-0">
                <i class="fas fa-bullhorn text-base"></i>
            </div>
            <!-- Content -->
            <div class="flex-grow min-w-0">
                <div class="flex flex-wrap items-center gap-2">
                    <h3 class="font-bold text-slate-800 text-sm">Tourism Office announcement</h3>
                    <span class="bg-blue-50 text-blue-600 border border-blue-100/50 px-1.5 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase">New</span>
                </div>
                <p class="text-xs text-slate-500 font-medium mt-1">New accreditation cycle now open through August 31.</p>
            </div>
            <!-- Time -->
            <span class="text-xs text-slate-400 font-semibold whitespace-nowrap shrink-0 self-start sm:self-center">1 day ago</span>
        </div>

        <!-- Notification 3: Accreditation reminder -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-5 flex items-start gap-4 hover:shadow-md transition">
            <!-- Icon Box -->
            <div class="bg-emerald-50 text-emerald-600 border border-emerald-100/50 rounded-lg w-11 h-11 flex items-center justify-center shrink-0">
                <i class="fas fa-check text-base"></i>
            </div>
            <!-- Content -->
            <div class="flex-grow min-w-0">
                <h3 class="font-bold text-slate-800 text-sm">Accreditation reminder</h3>
                <p class="text-xs text-slate-500 font-medium mt-1">Your annual accreditation renewal is due in 45 days.</p>
            </div>
            <!-- Time -->
            <span class="text-xs text-slate-400 font-semibold whitespace-nowrap shrink-0 self-start sm:self-center">3 days ago</span>
        </div>

        <!-- Notification 4: 10 new registrations today -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-5 flex items-start gap-4 hover:shadow-md transition">
            <!-- Icon Box -->
            <div class="bg-violet-50 text-violet-600 border border-violet-100/50 rounded-lg w-11 h-11 flex items-center justify-center shrink-0">
                <i class="fas fa-users text-base"></i>
            </div>
            <!-- Content -->
            <div class="flex-grow min-w-0">
                <h3 class="font-bold text-slate-800 text-sm">10 new registrations today</h3>
                <p class="text-xs text-slate-500 font-medium mt-1">Daily registration summary is ready.</p>
            </div>
            <!-- Time -->
            <span class="text-xs text-slate-400 font-semibold whitespace-nowrap shrink-0 self-start sm:self-center">today</span>
        </div>
    </div>
</div>
@endsection
