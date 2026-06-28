@extends('EstablishmentsUsers.layout', ['activePage' => 'notifications'])

@section('title', 'Blue Bless Resort - Activity Log')

@section('establishment-content')
<div class="space-y-6" x-data="activityLog()">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Activity Log</h1>
            <p class="text-sm text-slate-500 mt-1">A complete timeline of all actions and events at <span class="font-semibold text-[#0a4e5c]">Blue Bless Resort</span>.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="text-xs font-bold text-slate-400" x-text="`${filteredActivities().length} event(s)`"></span>
            <button @click="clearFilters()" class="border border-slate-200 hover:bg-slate-50 text-slate-600 px-3 py-2 text-xs font-semibold rounded-[6px] transition">
                Clear Filters
            </button>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-5">
        <div class="flex flex-wrap gap-3 items-center">
            <!-- Category Chips -->
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mr-1">Filter:</span>
            <template x-for="cat in categories" :key="cat.value">
                <button @click="toggleCategory(cat.value)"
                    :class="activeCategory === cat.value
                        ? 'bg-[#0a4e5c] text-white border-[#0a4e5c]'
                        : 'bg-white text-slate-600 border-slate-200 hover:border-[#0a4e5c] hover:text-[#0a4e5c]'"
                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-xs font-semibold transition">
                    <i class="fas text-[10px]" :class="cat.icon"></i>
                    <span x-text="cat.label"></span>
                </button>
            </template>

            <!-- Divider -->
            <div class="h-5 w-px bg-slate-200 mx-1"></div>

            <!-- Search -->
            <div class="relative flex-1 min-w-40">
                <i class="fas fa-search text-slate-300 text-[11px] absolute left-3 top-2.5 pointer-events-none"></i>
                <input type="text" x-model="searchQuery" placeholder="Search activities..."
                    class="w-full bg-slate-50 border border-slate-200 pl-8 pr-3 py-2 text-xs rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c] transition-all">
            </div>
        </div>
    </div>

    <!-- Activity Timeline -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
        <!-- Group by date -->
        <template x-for="group in groupedActivities()" :key="group.date">
            <div>
                <!-- Date separator -->
                <div class="px-6 py-3 bg-slate-50/70 border-b border-slate-100 flex items-center gap-3">
                    <i class="far fa-calendar-alt text-slate-400 text-xs"></i>
                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider" x-text="group.label"></span>
                    <span class="text-[10px] text-slate-400 font-semibold" x-text="`(${group.items.length} event${group.items.length !== 1 ? 's' : ''})`"></span>
                </div>

                <!-- Activity rows -->
                <template x-for="(activity, i) in group.items" :key="activity.id">
                    <div class="flex items-start gap-4 px-6 py-4 border-b border-slate-50 hover:bg-slate-50/40 transition group"
                         :class="i === group.items.length - 1 ? 'border-b-0' : ''">
                        <!-- Icon -->
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center shrink-0 mt-0.5"
                             :class="activity.bgClass">
                            <i class="fas text-base" :class="activity.icon"></i>
                        </div>

                        <!-- Details -->
                        <div class="flex-grow min-w-0">
                            <div class="flex flex-wrap items-center gap-2 mb-0.5">
                                <h3 class="font-bold text-slate-800 text-sm" x-text="activity.title"></h3>
                                <span class="inline-flex items-center px-1.5 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase"
                                      :class="activity.badgeClass" x-text="activity.category"></span>
                            </div>
                            <p class="text-xs text-slate-500 font-medium" x-text="activity.description"></p>
                            <!-- Meta info -->
                            <div class="flex items-center gap-3 mt-1.5" x-show="activity.meta">
                                <template x-for="m in (activity.meta || [])">
                                    <span class="text-[10px] text-slate-400 font-semibold flex items-center gap-1">
                                        <i class="fas text-[9px]" :class="m.icon"></i>
                                        <span x-text="m.value"></span>
                                    </span>
                                </template>
                            </div>
                        </div>

                        <!-- Time -->
                        <span class="text-xs text-slate-400 font-semibold whitespace-nowrap shrink-0 self-start" x-text="activity.time"></span>
                    </div>
                </template>
            </div>
        </template>

        <!-- Empty state -->
        <template x-if="filteredActivities().length === 0">
            <div class="py-16 text-center">
                <i class="fas fa-clipboard-list text-4xl text-slate-200 mb-3 block"></i>
                <p class="text-sm font-semibold text-slate-400">No activities match your filter.</p>
                <p class="text-xs text-slate-300 mt-1">Try selecting a different category or clearing the search.</p>
            </div>
        </template>
    </div>
</div>

<script>
function activityLog() {
    return {
        activeCategory: 'all',
        searchQuery: '',

        categories: [
            { value: 'all',          label: 'All',            icon: 'fa-layer-group' },
            { value: 'Check-In',     label: 'Check-Ins',      icon: 'fa-sign-in-alt' },
            { value: 'Manual Entry', label: 'Manual Entry',   icon: 'fa-keyboard' },
            { value: 'Report',       label: 'Reports',        icon: 'fa-chart-bar' },
            { value: 'Advisory',     label: 'Advisories',     icon: 'fa-bullhorn' },
            { value: 'System',       label: 'System',         icon: 'fa-cog' },
        ],

        activities: [
            {
                id: 1, date: '2026-06-28', time: '2:21 AM',
                category: 'Check-In',
                title: 'New visitor check-in via QR',
                description: 'Ana Reyes (Female) checked in from Manila, Metro Manila.',
                icon: 'fa-sign-in-alt', bgClass: 'bg-violet-50 text-violet-600',
                badgeClass: 'bg-violet-50 text-violet-600 border border-violet-100',
                meta: [{ icon: 'fa-user', value: 'Ana Reyes' }, { icon: 'fa-flag', value: 'Philippines' }]
            },
            {
                id: 2, date: '2026-06-28', time: '8:05 AM',
                category: 'Manual Entry',
                title: 'Manual visitor registration',
                description: 'Kenji Tanaka (Male) manually encoded — Tokyo, Japan.',
                icon: 'fa-keyboard', bgClass: 'bg-amber-50 text-amber-600',
                badgeClass: 'bg-amber-50 text-amber-600 border border-amber-100',
                meta: [{ icon: 'fa-user', value: 'Kenji Tanaka' }, { icon: 'fa-globe', value: 'Foreign' }]
            },
            {
                id: 3, date: '2026-06-28', time: '9:45 AM',
                category: 'Advisory',
                title: 'Advisory received from PTO',
                description: 'Advisory: New accreditation cycle open through August 31, 2026.',
                icon: 'fa-bullhorn', bgClass: 'bg-amber-50 text-amber-500',
                badgeClass: 'bg-orange-50 text-orange-600 border border-orange-100',
                meta: [{ icon: 'fa-building', value: 'Provincial Tourism Office' }]
            },
            {
                id: 4, date: '2026-06-27', time: '3:12 PM',
                category: 'Check-In',
                title: 'New visitor check-in via QR',
                description: 'John Smith (Male) checked in from Sydney, Australia.',
                icon: 'fa-sign-in-alt', bgClass: 'bg-violet-50 text-violet-600',
                badgeClass: 'bg-violet-50 text-violet-600 border border-violet-100',
                meta: [{ icon: 'fa-user', value: 'John Smith' }, { icon: 'fa-globe', value: 'Foreign' }]
            },
            {
                id: 5, date: '2026-06-27', time: '5:00 PM',
                category: 'Report',
                title: 'Monthly report submitted',
                description: 'June 2026 monthly visitor arrivals report submitted to PTO.',
                icon: 'fa-chart-bar', bgClass: 'bg-teal-50 text-[#0a4e5c]',
                badgeClass: 'bg-teal-50 text-teal-700 border border-teal-100',
                meta: [{ icon: 'fa-calendar', value: 'June 2026' }, { icon: 'fa-users', value: '28 visitors' }]
            },
            {
                id: 6, date: '2026-06-25', time: '11:00 AM',
                category: 'Check-In',
                title: 'New visitor check-in via QR',
                description: 'Maria Santos (Female) checked in from Davao City, Davao del Sur.',
                icon: 'fa-sign-in-alt', bgClass: 'bg-violet-50 text-violet-600',
                badgeClass: 'bg-violet-50 text-violet-600 border border-violet-100',
                meta: [{ icon: 'fa-user', value: 'Maria Santos' }, { icon: 'fa-flag', value: 'Philippines' }]
            },
            {
                id: 7, date: '2026-06-24', time: '7:30 AM',
                category: 'Manual Entry',
                title: 'Bulk manual entry — 3 visitors',
                description: '3 visitors encoded manually: Pedro Cruz, Sophie Martin, Liza Gomez.',
                icon: 'fa-keyboard', bgClass: 'bg-amber-50 text-amber-600',
                badgeClass: 'bg-amber-50 text-amber-600 border border-amber-100',
                meta: [{ icon: 'fa-users', value: '3 entries' }, { icon: 'fa-keyboard', value: 'Manual' }]
            },
            {
                id: 8, date: '2026-06-20', time: '10:15 AM',
                category: 'System',
                title: 'Accreditation renewal reminder',
                description: 'Your annual accreditation renewal is due in 45 days (Aug 5, 2026).',
                icon: 'fa-shield-alt', bgClass: 'bg-rose-50 text-rose-500',
                badgeClass: 'bg-rose-50 text-rose-600 border border-rose-100',
                meta: [{ icon: 'fa-calendar', value: 'Due: Aug 5, 2026' }]
            },
            {
                id: 9, date: '2026-06-15', time: '4:00 PM',
                category: 'Report',
                title: 'May 2026 report validated by PTO',
                description: 'Your May 2026 monthly report has been reviewed and validated.',
                icon: 'fa-clipboard-check', bgClass: 'bg-emerald-50 text-emerald-600',
                badgeClass: 'bg-emerald-50 text-emerald-700 border border-emerald-100',
                meta: [{ icon: 'fa-calendar', value: 'May 2026' }, { icon: 'fa-check', value: 'Validated' }]
            },
            {
                id: 10, date: '2026-06-10', time: '6:00 PM',
                category: 'Advisory',
                title: 'Weather advisory from PTO',
                description: 'Tropical storm warning: Expect heavy rains June 11–13. Remind guests to take precautions.',
                icon: 'fa-cloud-rain', bgClass: 'bg-sky-50 text-sky-600',
                badgeClass: 'bg-orange-50 text-orange-600 border border-orange-100',
                meta: [{ icon: 'fa-building', value: 'Provincial Tourism Office' }]
            },
            {
                id: 11, date: '2026-06-01', time: '8:00 AM',
                category: 'System',
                title: 'Monthly report period opened',
                description: 'June 2026 report submission window is now open. Submit before June 15.',
                icon: 'fa-lock-open', bgClass: 'bg-slate-100 text-slate-500',
                badgeClass: 'bg-slate-100 text-slate-600 border border-slate-200',
                meta: [{ icon: 'fa-calendar', value: 'Deadline: Jun 15' }]
            },
        ],

        toggleCategory(val) {
            this.activeCategory = val;
        },

        clearFilters() {
            this.activeCategory = 'all';
            this.searchQuery = '';
        },

        filteredActivities() {
            return this.activities.filter(a => {
                if (this.activeCategory !== 'all' && a.category !== this.activeCategory) return false;
                if (this.searchQuery.trim()) {
                    const q = this.searchQuery.toLowerCase();
                    return a.title.toLowerCase().includes(q)
                        || a.description.toLowerCase().includes(q)
                        || (a.meta || []).some(m => m.value.toLowerCase().includes(q));
                }
                return true;
            });
        },

        groupedActivities() {
            const groups = {};
            this.filteredActivities().forEach(a => {
                if (!groups[a.date]) groups[a.date] = [];
                groups[a.date].push(a);
            });

            const today     = new Date().toISOString().split('T')[0];
            const yesterday = new Date(Date.now() - 86400000).toISOString().split('T')[0];

            return Object.keys(groups).sort((a, b) => b.localeCompare(a)).map(date => ({
                date,
                label: date === today ? 'Today'
                     : date === yesterday ? 'Yesterday'
                     : new Date(date + 'T00:00:00').toLocaleDateString('en-PH', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }),
                items: groups[date]
            }));
        }
    };
}
</script>
@endsection
