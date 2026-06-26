@extends('EstablishmentsUsers.layout', ['activePage' => 'feedback'])

@section('title', 'Blue Bless Resort - Feedback & Reviews')

@section('establishment-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Feedback & Reviews</h1>
        <p class="text-sm text-slate-500 mt-1">Read what guests are saying and respond to keep your reputation strong.</p>
    </div>

    <!-- Feedback Stats Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Average Rating</span>
            <div class="flex flex-col mt-4">
                <span class="text-4xl font-extrabold text-slate-800 tracking-tight leading-none">4.7</span>
                <span class="text-xs text-slate-400 font-medium mt-2">out of 5</span>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Total Reviews</span>
            <div class="flex items-baseline justify-between mt-4">
                <span class="text-4xl font-extrabold text-slate-800 tracking-tight">312</span>
                <span class="bg-emerald-50 text-emerald-600 px-2.5 py-1 rounded-[6px] text-xs font-bold flex items-center gap-1 shadow-2xs">
                    <i class="fas fa-caret-up text-sm"></i> 24 this month
                </span>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Positive</span>
            <div class="flex items-baseline mt-4">
                <span class="text-4xl font-extrabold text-slate-800 tracking-tight">82%</span>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <span class="text-[10px] font-bold text-slate-400 tracking-wider uppercase">Response Rate</span>
            <div class="flex items-baseline mt-4">
                <span class="text-4xl font-extrabold text-slate-800 tracking-tight">68%</span>
            </div>
        </div>
    </div>

    <!-- Reviews List Container -->
    <div class="space-y-4">
        <!-- Review 1 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 hover:shadow-md transition">
            <div class="flex items-start justify-between">
                <div>
                    <h4 class="font-bold text-slate-800 text-sm">Mark T.</h4>
                    <span class="text-[10px] font-semibold text-slate-400 mt-1 block">2026-06-10</span>
                </div>
                <div class="flex items-center gap-1 text-amber-500 font-bold text-sm">
                    <i class="fas fa-star text-xs"></i> 5.0
                </div>
            </div>
            <p class="mt-3 text-sm text-slate-700 font-medium leading-relaxed">
                Friendly staff, clean cottages, and amazing food. Will come back.
            </p>
            <div class="mt-5 flex items-center gap-3">
                <button class="border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-600 px-4 py-1.5 text-xs font-semibold rounded-[6px] transition">
                    Reply
                </button>
                <button class="text-slate-400 hover:text-red-500 hover:underline text-xs font-bold transition">
                    Flag
                </button>
            </div>
        </div>

        <!-- Review 2 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 hover:shadow-md transition">
            <div class="flex items-start justify-between">
                <div>
                    <h4 class="font-bold text-slate-800 text-sm">Ana R.</h4>
                    <span class="text-[10px] font-semibold text-slate-400 mt-1 block">2026-06-12</span>
                </div>
                <div class="flex items-center gap-1 text-amber-500 font-bold text-sm">
                    <i class="fas fa-star text-xs"></i> 5.0
                </div>
            </div>
            <p class="mt-3 text-sm text-slate-700 font-medium leading-relaxed">
                Beautiful sunrise and the sand is so fine. Loved the skimboarding lesson!
            </p>
            <div class="mt-5 flex items-center gap-3">
                <button class="border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-600 px-4 py-1.5 text-xs font-semibold rounded-[6px] transition">
                    Reply
                </button>
                <button class="text-slate-400 hover:text-red-500 hover:underline text-xs font-bold transition">
                    Flag
                </button>
            </div>
        </div>

        <!-- Review 3 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 hover:shadow-md transition">
            <div class="flex items-start justify-between">
                <div>
                    <h4 class="font-bold text-slate-800 text-sm">Mark T.</h4>
                    <span class="text-[10px] font-semibold text-slate-400 mt-1 block">2026-06-10</span>
                </div>
                <div class="flex items-center gap-1 text-amber-500 font-bold text-sm">
                    <i class="fas fa-star text-xs"></i> 5.0
                </div>
            </div>
            <p class="mt-3 text-sm text-slate-700 font-medium leading-relaxed">
                Friendly staff, clean cottages, and amazing food. Will come back.
            </p>
            <div class="mt-5 flex items-center gap-3">
                <button class="border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-600 px-4 py-1.5 text-xs font-semibold rounded-[6px] transition">
                    Reply
                </button>
                <button class="text-slate-400 hover:text-red-500 hover:underline text-xs font-bold transition">
                    Flag
                </button>
            </div>
        </div>

        <!-- Review 4 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 hover:shadow-md transition">
            <div class="flex items-start justify-between">
                <div>
                    <h4 class="font-bold text-slate-800 text-sm">Yuki T.</h4>
                    <span class="text-[10px] font-semibold text-slate-400 mt-1 block">2026-06-08</span>
                </div>
                <div class="flex items-center gap-1 text-amber-500 font-bold text-sm">
                    <i class="fas fa-star text-xs"></i> 4.0
                </div>
            </div>
            <p class="mt-3 text-sm text-slate-700 font-medium leading-relaxed">
                Nice service and very accommodating. The beach was clean and peaceful.
            </p>
            <div class="mt-5 flex items-center gap-3">
                <button class="border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-600 px-4 py-1.5 text-xs font-semibold rounded-[6px] transition">
                    Reply
                </button>
                <button class="text-slate-400 hover:text-red-500 hover:underline text-xs font-bold transition">
                    Flag
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
