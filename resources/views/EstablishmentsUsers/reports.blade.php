@extends('EstablishmentsUsers.layout', ['activePage' => 'reports'])

@section('title', 'Blue Bless Resort - Reports')

@section('establishment-content')
<div class="space-y-6" x-data="establishmentReport()">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Establishment Reports</h1>
            <p class="text-sm text-slate-500 mt-1">View and filter tourist arrival records specific to <span class="font-semibold text-[#0a4e5c]">Blue Bless Resort</span>.</p>
        </div>
        <div class="flex items-center gap-2">
            <button @click="exportReport('pdf')" class="flex items-center gap-1.5 bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-2 text-xs font-bold rounded-[6px] transition shadow-xs">
                <i class="fas fa-file-pdf text-rose-500 text-[11px]"></i> PDF
            </button>
            <button @click="exportReport('excel')" class="flex items-center gap-1.5 bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-2 text-xs font-bold rounded-[6px] transition shadow-xs">
                <i class="fas fa-file-excel text-emerald-600 text-[11px]"></i> Excel
            </button>
        </div>
    </div>

    <!-- Filters Bar -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-5 space-y-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h2 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Filter Records</h2>
            <!-- Quick Date Selectors -->
            <div class="flex items-center gap-2 flex-wrap">
                <button @click="setQuick('today')"    :class="quickActive==='today'    ? 'bg-[#0a4e5c] text-white border-[#0a4e5c]' : 'text-[#0a4e5c] border-slate-200 hover:bg-slate-50'" class="px-2.5 py-1 text-xs font-semibold rounded border transition">Today</button>
                <button @click="setQuick('week')"     :class="quickActive==='week'     ? 'bg-[#0a4e5c] text-white border-[#0a4e5c]' : 'text-[#0a4e5c] border-slate-200 hover:bg-slate-50'" class="px-2.5 py-1 text-xs font-semibold rounded border transition">Last 7 Days</button>
                <button @click="setQuick('month')"    :class="quickActive==='month'    ? 'bg-[#0a4e5c] text-white border-[#0a4e5c]' : 'text-[#0a4e5c] border-slate-200 hover:bg-slate-50'" class="px-2.5 py-1 text-xs font-semibold rounded border transition">This Month</button>
                <button @click="setQuick('year')"     :class="quickActive==='year'     ? 'bg-[#0a4e5c] text-white border-[#0a4e5c]' : 'text-[#0a4e5c] border-slate-200 hover:bg-slate-50'" class="px-2.5 py-1 text-xs font-semibold rounded border transition">This Year</button>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Start Date -->
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-600">Start Date</label>
                <div class="relative">
                    <i class="far fa-calendar text-slate-400 text-xs absolute left-3 top-3 pointer-events-none"></i>
                    <input type="date" x-model="startDate" @change="quickActive=''" class="w-full bg-slate-50 border border-slate-200 pl-8 pr-3 py-2 text-sm rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c] transition-all">
                </div>
            </div>
            <!-- End Date -->
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-600">End Date</label>
                <div class="relative">
                    <i class="far fa-calendar text-slate-400 text-xs absolute left-3 top-3 pointer-events-none"></i>
                    <input type="date" x-model="endDate" @change="quickActive=''" class="w-full bg-slate-50 border border-slate-200 pl-8 pr-3 py-2 text-sm rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c] transition-all">
                </div>
            </div>
            <!-- Residence Filter -->
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-600">Place of Residence</label>
                <div class="relative">
                    <select x-model="residenceFilter" class="w-full appearance-none bg-slate-50 border border-slate-200 px-3 py-2 pr-8 text-sm rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]">
                        <option value="all">All</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Foreign">Foreign</option>
                    </select>
                    <i class="fas fa-chevron-down text-[10px] text-slate-400 absolute right-3 top-3 pointer-events-none"></i>
                </div>
            </div>
            <!-- Gender Filter -->
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-600">Gender</label>
                <div class="relative">
                    <select x-model="genderFilter" class="w-full appearance-none bg-slate-50 border border-slate-200 px-3 py-2 pr-8 text-sm rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]">
                        <option value="all">All</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <i class="fas fa-chevron-down text-[10px] text-slate-400 absolute right-3 top-3 pointer-events-none"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- KPI Summary Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-5 flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Total Visitors</p>
                <h3 class="text-2xl font-extrabold text-slate-800 mt-1" x-text="filteredRows().length"></h3>
                <p class="text-[10px] text-slate-400 mt-0.5" x-text="startDate + ' → ' + endDate"></p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-teal-50 flex items-center justify-center shrink-0">
                <i class="fas fa-users text-[#0a4e5c] text-lg"></i>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-5 flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Filipino</p>
                <h3 class="text-2xl font-extrabold text-slate-800 mt-1" x-text="filteredRows().filter(r => r.residence === 'Philippines').length"></h3>
                <p class="text-[10px] text-slate-400 mt-0.5">Local visitors</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-sky-50 flex items-center justify-center shrink-0">
                <i class="fas fa-flag text-sky-600 text-lg"></i>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-5 flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Foreign</p>
                <h3 class="text-2xl font-extrabold text-slate-800 mt-1" x-text="filteredRows().filter(r => r.residence === 'Foreign').length"></h3>
                <p class="text-[10px] text-slate-400 mt-0.5">International visitors</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-purple-50 flex items-center justify-center shrink-0">
                <i class="fas fa-globe text-purple-600 text-lg"></i>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-5 flex items-center justify-between">
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Female Visitors</p>
                <h3 class="text-2xl font-extrabold text-slate-800 mt-1" x-text="filteredRows().filter(r => r.gender === 'Female').length"></h3>
                <p class="text-[10px] text-slate-400 mt-0.5">Gender breakdown</p>
            </div>
            <div class="w-10 h-10 rounded-lg bg-rose-50 flex items-center justify-center shrink-0">
                <i class="fas fa-venus text-rose-500 text-lg"></i>
            </div>
        </div>
    </div>

    <!-- Report Data Table -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
        <!-- Table Header -->
        <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div>
                <h3 class="font-bold text-slate-800 text-sm">Visitor Arrival Log — Blue Bless Resort</h3>
                <p class="text-[11px] text-slate-400 mt-0.5" x-text="`Showing ${filteredRows().length} record(s) from ${startDate} to ${endDate}`"></p>
            </div>
            <!-- Search -->
            <div class="relative w-full sm:w-56">
                <i class="fas fa-search text-slate-300 text-[11px] absolute left-3 top-2.5 pointer-events-none"></i>
                <input type="text" x-model="searchQuery" placeholder="Search visitor name..." class="w-full bg-slate-50 border border-slate-200 pl-8 pr-3 py-2 text-xs rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c] transition-all">
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 border-b border-slate-100 text-slate-400 text-[10px] font-bold tracking-wider uppercase">
                        <th class="py-4 px-5">No.</th>
                        <th class="py-4 px-5">Date</th>
                        <th class="py-4 px-5">Name of Visitor</th>
                        <th class="py-4 px-5">Gender</th>
                        <th class="py-4 px-5">Place of Residence</th>
                        <th class="py-4 px-5">Remarks</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 text-slate-700 text-xs">
                    <template x-for="(row, index) in filteredRows()" :key="row.no">
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-4 px-5 font-semibold text-slate-400" x-text="String(index + 1).padStart(3, '0')"></td>
                            <td class="py-4 px-5 font-medium text-slate-500 whitespace-nowrap" x-text="row.date"></td>
                            <td class="py-4 px-5 font-bold text-slate-800" x-text="row.name"></td>
                            <td class="py-4 px-5 font-medium text-slate-600" x-text="row.gender"></td>
                            <td class="py-4 px-5">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold"
                                    :class="row.residence === 'Philippines' ? 'bg-sky-50 text-sky-700 border border-sky-100/40' : 'bg-purple-50 text-purple-700 border border-purple-100/40'"
                                    x-text="row.residence"></span>
                            </td>
                            <td class="py-4 px-5 font-medium text-slate-500" x-text="row.remarks"></td>
                        </tr>
                    </template>
                    <!-- Empty state -->
                    <template x-if="filteredRows().length === 0">
                        <tr>
                            <td colspan="6" class="py-14 text-center">
                                <i class="fas fa-search text-3xl text-slate-200 mb-3 block"></i>
                                <p class="text-sm font-semibold text-slate-400">No records found for the selected filters.</p>
                                <p class="text-xs text-slate-300 mt-1">Try adjusting the date range or clearing filters.</p>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <!-- Table Footer -->
        <div class="p-5 border-t border-slate-100 flex items-center justify-between text-slate-400 text-xs font-semibold">
            <span x-text="`${filteredRows().length} of ${dataset.length} records`"></span>
            <div class="flex items-center gap-2">
                <button class="border border-slate-200 text-slate-600 px-3 py-1.5 rounded-[6px] hover:bg-slate-50 transition">Previous</button>
                <button class="border border-slate-200 text-slate-600 px-3 py-1.5 rounded-[6px] hover:bg-slate-50 transition">Next</button>
            </div>
        </div>
    </div>
</div>

<script>
function establishmentReport() {
    return {
        startDate: '',
        endDate: '',
        residenceFilter: 'all',
        genderFilter: 'all',
        searchQuery: '',
        quickActive: 'month',

        // Blue Bless Resort specific visitor data
        dataset: [
            { no: 1,  date: '2026-06-28', name: 'Ana Reyes',         gender: 'Female', residence: 'Philippines', remarks: 'Manila, Metro Manila' },
            { no: 2,  date: '2026-06-27', name: 'Kenji Tanaka',       gender: 'Male',   residence: 'Foreign',      remarks: 'Tokyo, Japan' },
            { no: 3,  date: '2026-06-27', name: 'John Smith',         gender: 'Male',   residence: 'Foreign',      remarks: 'Sydney, Australia' },
            { no: 4,  date: '2026-06-25', name: 'Maria Santos',       gender: 'Female', residence: 'Philippines', remarks: 'Davao City, Davao del Sur' },
            { no: 5,  date: '2026-06-24', name: 'Pedro Cruz',         gender: 'Male',   residence: 'Philippines', remarks: 'Cebu City, Cebu' },
            { no: 6,  date: '2026-06-22', name: 'Sophie Martin',      gender: 'Female', residence: 'Foreign',      remarks: 'Paris, France' },
            { no: 7,  date: '2026-06-20', name: 'Liza Gomez',         gender: 'Female', residence: 'Philippines', remarks: 'Mati City, Davao Oriental' },
            { no: 8,  date: '2026-06-18', name: 'Carlos Mendoza',     gender: 'Male',   residence: 'Philippines', remarks: 'Quezon City, Metro Manila' },
            { no: 9,  date: '2026-06-15', name: 'Emma Wilson',        gender: 'Female', residence: 'Foreign',      remarks: 'London, United Kingdom' },
            { no: 10, date: '2026-06-12', name: 'Ricky Bautista',     gender: 'Male',   residence: 'Philippines', remarks: 'General Santos, South Cotabato' },
            { no: 11, date: '2026-06-10', name: 'Hana Kim',           gender: 'Female', residence: 'Foreign',      remarks: 'Seoul, South Korea' },
            { no: 12, date: '2026-06-08', name: 'Jose Villanueva',    gender: 'Male',   residence: 'Philippines', remarks: 'Tagum City, Davao del Norte' },
            { no: 13, date: '2026-06-05', name: 'Li Wei',             gender: 'Male',   residence: 'Foreign',      remarks: 'Beijing, China' },
            { no: 14, date: '2026-05-30', name: 'Grace Dela Torre',   gender: 'Female', residence: 'Philippines', remarks: 'Butuan City, Agusan del Norte' },
            { no: 15, date: '2026-05-25', name: 'Mark Johansson',     gender: 'Male',   residence: 'Foreign',      remarks: 'Stockholm, Sweden' },
            { no: 16, date: '2026-05-18', name: 'Rosario Fernandez',  gender: 'Female', residence: 'Philippines', remarks: 'Cagayan de Oro, Misamis Oriental' },
            { no: 17, date: '2026-05-10', name: 'Ahmed Hassan',       gender: 'Male',   residence: 'Foreign',      remarks: 'Cairo, Egypt' },
            { no: 18, date: '2026-04-22', name: 'Jenny Lim',          gender: 'Female', residence: 'Philippines', remarks: 'Zamboanga City, Zamboanga del Sur' },
        ],

        init() {
            this.setQuick('month');
        },

        setQuick(range) {
            this.quickActive = range;
            const today = new Date();
            const pad = n => String(n).padStart(2, '0');
            const fmt = d => `${d.getFullYear()}-${pad(d.getMonth()+1)}-${pad(d.getDate())}`;

            this.endDate = fmt(today);

            if (range === 'today') {
                this.startDate = fmt(today);
            } else if (range === 'week') {
                const past = new Date(today.getTime() - 7 * 86400000);
                this.startDate = fmt(past);
            } else if (range === 'month') {
                this.startDate = `${today.getFullYear()}-${pad(today.getMonth()+1)}-01`;
            } else if (range === 'year') {
                this.startDate = `${today.getFullYear()}-01-01`;
            }
        },

        filteredRows() {
            return this.dataset.filter(row => {
                // Date range
                if (this.startDate && row.date < this.startDate) return false;
                if (this.endDate   && row.date > this.endDate)   return false;
                // Residence
                if (this.residenceFilter !== 'all' && row.residence !== this.residenceFilter) return false;
                // Gender
                if (this.genderFilter !== 'all' && row.gender !== this.genderFilter) return false;
                // Search
                if (this.searchQuery.trim()) {
                    const q = this.searchQuery.toLowerCase();
                    return Object.values(row).some(v => String(v).toLowerCase().includes(q));
                }
                return true;
            });
        },

        exportReport(type) {
            alert(`Generating ${type.toUpperCase()} report for Blue Bless Resort\nPeriod: ${this.startDate} to ${this.endDate}\nRecords: ${this.filteredRows().length} visitor(s)`);
        }
    };
}
</script>
@endsection
