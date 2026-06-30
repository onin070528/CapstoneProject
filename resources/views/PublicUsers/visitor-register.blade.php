@extends('layouts.app')

@section('title', 'iTOUR - Visitor Registration')

@section('content')
<div class="min-h-screen bg-[#f0f5f7] text-slate-700 font-sans flex flex-col justify-between">
    <!-- Navbar / Header -->
    <header class="bg-white border-b border-slate-100 shadow-xs">
        <div class="max-w-4xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-md bg-[#0e4f5c] text-white flex items-center justify-center font-bold text-xs tracking-tight">iT</div>
                <div class="flex flex-col leading-none">
                    <span class="font-extrabold text-base text-[#0e4f5c] tracking-tight">iTOUR</span>
                    <span class="text-[8px] font-semibold text-[#706f6c] tracking-[0.15em] mt-0.5">DAVAO ORIENTAL</span>
                </div>
            </a>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Visitor Registration</span>
        </div>
    </header>

    <!-- Main Container -->
    <main class="flex-1 max-w-2xl w-full mx-auto px-4 py-8">
        <div class="bg-white rounded-3xl border border-slate-200/60 shadow-xl overflow-hidden">
            <!-- Header Banner -->
            <div class="relative h-32 bg-[#0e4f5c] flex items-center justify-center text-white px-6">
                <div class="absolute inset-0 bg-gradient-to-br from-[#0c3f4a] to-[#125d6c] opacity-90"></div>
                <div class="relative text-center">
                    <h1 class="text-2xl font-extrabold tracking-tight">Visitor Registration</h1>
                    <p class="text-xs text-teal-200 mt-1 font-medium">Please register your visit to help us serve you better.</p>
                </div>
            </div>

            <div class="p-6 sm:p-8 space-y-6" x-data="visitorForm()">
                <!-- Alerts -->
                @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-2xl flex flex-col items-center text-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">
                        <i class="fas fa-circle-check text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-base">Registration Complete!</h4>
                        <p class="text-xs text-slate-500 mt-1">{{ session('success') }}</p>
                    </div>
                    <a href="{{ route('visitor.register', $establishment->uuid) }}" class="mt-2 bg-[#0e4f5c] hover:bg-[#0c3e49] text-white text-xs font-bold px-5 py-2 rounded-xl transition shadow-xs">
                        Register Another Visit
                    </a>
                </div>
                @else

                <!-- Establishment Info -->
                <div class="bg-slate-50 border border-slate-200/80 rounded-2xl p-5 space-y-4">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-200 pb-2">Establishment Info</h3>
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Establishment Name</label>
                        <input type="text" value="{{ $establishment->name }}" disabled class="w-full bg-slate-100 border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 cursor-not-allowed">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Location / Municipality</label>
                            <input type="text" value="{{ $establishment->municipality }}" disabled class="w-full bg-slate-100 border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 cursor-not-allowed">
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Date</label>
                            <input type="text" value="{{ date('Y-m-d') }}" disabled class="w-full bg-slate-100 border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 cursor-not-allowed">
                        </div>
                    </div>
                </div>

                <!-- Validation Errors -->
                @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-800 p-4 rounded-2xl">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                        <h4 class="font-bold text-sm">Please fix the following errors:</h4>
                    </div>
                    <ul class="text-xs space-y-1 list-disc list-inside text-red-700">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- Form -->
                <form action="{{ route('visitor.submit', $establishment->uuid) }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Visitor Entries -->
                    <template x-for="(visitor, index) in visitors" :key="index">
                        <div class="bg-white border border-slate-200 rounded-2xl p-5 space-y-4 relative transition-all duration-300"
                             :class="{ 'ring-2 ring-[#0e4f5c]/20 shadow-lg': visitors.length > 1 }">

                            <!-- Header row with No. and remove button -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full bg-[#0e4f5c] text-white flex items-center justify-center font-bold text-sm shadow-md" x-text="index + 1"></div>
                                    <h4 class="text-sm font-bold text-slate-600">Visitor <span x-text="index + 1"></span></h4>
                                </div>
                                <button type="button"
                                        x-show="visitors.length > 1"
                                        @click="removeVisitor(index)"
                                        class="w-8 h-8 rounded-full bg-red-50 hover:bg-red-100 text-red-400 hover:text-red-600 flex items-center justify-center transition-all cursor-pointer"
                                        title="Remove this visitor">
                                    <i class="fas fa-times text-xs"></i>
                                </button>
                            </div>

                            <!-- Date (read-only) -->
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Date</label>
                                <input type="text" value="{{ date('Y-m-d') }}" disabled class="w-full bg-slate-50 border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-500 cursor-not-allowed">
                            </div>

                            <!-- Name of Visitor -->
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Name of Visitor *</label>
                                <input type="text"
                                       :name="'visitors[' + index + '][visitor_name]'"
                                       x-model="visitor.visitor_name"
                                       placeholder="e.g. Juan Dela Cruz"
                                       required
                                       class="w-full bg-white border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-medium focus:outline-none focus:border-[#0e4f5c] focus:ring-2 focus:ring-[#0e4f5c]/10 transition-all text-slate-800">
                            </div>

                            <!-- Gender -->
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Gender *</label>
                                <select :name="'visitors[' + index + '][gender]'"
                                        x-model="visitor.gender"
                                        required
                                        class="w-full bg-white border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-medium focus:outline-none focus:border-[#0e4f5c] focus:ring-2 focus:ring-[#0e4f5c]/10 transition-all text-slate-800 cursor-pointer appearance-none">
                                    <option value="" disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <!-- Place of Residence -->
                            <div class="space-y-3">
                                <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Place of Residence *</label>

                                <!-- Origin Type: Philippines or Foreigner -->
                                <select :name="'visitors[' + index + '][origin_type]'"
                                        x-model="visitor.origin_type"
                                        @change="onOriginChange(index)"
                                        required
                                        class="w-full bg-white border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-medium focus:outline-none focus:border-[#0e4f5c] focus:ring-2 focus:ring-[#0e4f5c]/10 transition-all text-slate-800 cursor-pointer appearance-none">
                                    <option value="" disabled>Select Origin</option>
                                    <option value="Philippines">Philippines (Filipino)</option>
                                    <option value="Foreigner">Foreigner</option>
                                </select>

                                <!-- Filipino Sub-options -->
                                <div x-show="visitor.origin_type === 'Philippines'" x-transition class="pl-3 border-l-2 border-[#0e4f5c]/20">
                                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-1">Residency Classification</label>
                                    <select :name="'visitors[' + index + '][residency_code]'"
                                            x-model="visitor.residency_code"
                                            :required="visitor.origin_type === 'Philippines'"
                                            class="w-full bg-white border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-medium focus:outline-none focus:border-[#0e4f5c] focus:ring-2 focus:ring-[#0e4f5c]/10 transition-all text-slate-800 cursor-pointer appearance-none">
                                        <option value="" disabled>Select Classification</option>
                                        <option value="R">This City — Resident (R)</option>
                                        <option value="Prov">Province (Prov)</option>
                                        <option value="NR">Non-Resident of Province (NR)</option>
                                    </select>
                                </div>

                                <!-- Foreigner indicator -->
                                <div x-show="visitor.origin_type === 'Foreigner'" x-transition class="pl-3 border-l-2 border-amber-300/40">
                                    <div class="flex items-center gap-2 bg-amber-50 border border-amber-200 px-4 py-2.5 rounded-xl">
                                        <i class="fas fa-globe-americas text-amber-500 text-sm"></i>
                                        <span class="text-sm font-semibold text-amber-700">Classified as Foreigner (FO)</span>
                                    </div>
                                    <input type="hidden" :name="'visitors[' + index + '][residency_code]'" value="FO">
                                </div>
                            </div>

                            <!-- Remarks -->
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">
                                    Remarks
                                    <span class="font-normal text-slate-400" x-text="visitor.origin_type === 'Foreigner' ? '(Country of Residence)' : '(Municipality & Province)'"></span>
                                </label>
                                <input type="text"
                                       :name="'visitors[' + index + '][remarks]'"
                                       x-model="visitor.remarks"
                                       :placeholder="visitor.origin_type === 'Foreigner' ? 'e.g. United States, Japan, South Korea' : 'e.g. Mati City, Davao Oriental'"
                                       class="w-full bg-white border border-slate-200 px-4 py-2.5 rounded-xl text-sm font-medium focus:outline-none focus:border-[#0e4f5c] focus:ring-2 focus:ring-[#0e4f5c]/10 transition-all text-slate-800">
                            </div>
                        </div>
                    </template>

                    <!-- Add Visitor Button -->
                    <div class="flex justify-center">
                        <button type="button"
                                @click="addVisitor()"
                                class="group flex items-center gap-2 bg-white hover:bg-[#0e4f5c] border-2 border-dashed border-[#0e4f5c]/30 hover:border-[#0e4f5c] text-[#0e4f5c] hover:text-white px-6 py-3 rounded-2xl text-sm font-bold transition-all duration-300 cursor-pointer shadow-xs hover:shadow-md">
                            <div class="w-7 h-7 rounded-full bg-[#0e4f5c]/10 group-hover:bg-white/20 flex items-center justify-center transition-all">
                                <i class="fas fa-plus text-xs"></i>
                            </div>
                            Add Another Visitor
                        </button>
                    </div>

                    <!-- Visitor Count Summary -->
                    <div class="flex items-center justify-between bg-slate-50 border border-slate-200/80 rounded-2xl px-5 py-3">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-users text-[#0e4f5c] text-sm"></i>
                            <span class="text-sm font-bold text-slate-600">Total Visitors:</span>
                        </div>
                        <span class="text-lg font-extrabold text-[#0e4f5c]" x-text="visitors.length"></span>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit"
                                class="w-full bg-[#0e4f5c] hover:bg-[#0c3e49] text-white px-6 py-3.5 rounded-2xl text-sm font-bold transition shadow-md flex items-center justify-center gap-2 cursor-pointer active:scale-[0.98]">
                            <i class="fas fa-clipboard-check text-xs"></i>
                            Register Visitor<span x-show="visitors.length > 1">s</span>
                        </button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-100 py-4 text-center text-xs text-slate-400 font-semibold">
        iTOUR Davao Oriental &copy; {{ date('Y') }}. All rights reserved.
    </footer>
</div>

<script>
function visitorForm() {
    return {
        visitors: [
            {
                visitor_name: '',
                gender: '',
                origin_type: '',
                residency_code: '',
                remarks: ''
            }
        ],

        addVisitor() {
            this.visitors.push({
                visitor_name: '',
                gender: '',
                origin_type: '',
                residency_code: '',
                remarks: ''
            });

            // Scroll to the newly added form after a short delay
            this.$nextTick(() => {
                const forms = document.querySelectorAll('[class*="bg-white border border-slate-200 rounded-2xl"]');
                if (forms.length > 0) {
                    forms[forms.length - 1].scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
        },

        removeVisitor(index) {
            if (this.visitors.length > 1) {
                this.visitors.splice(index, 1);
            }
        },

        onOriginChange(index) {
            if (this.visitors[index].origin_type === 'Foreigner') {
                this.visitors[index].residency_code = 'FO';
            } else {
                this.visitors[index].residency_code = '';
            }
            this.visitors[index].remarks = '';
        }
    }
}
</script>

<style>
    /* Custom dropdown arrow styling */
    select.appearance-none {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.75rem center;
        background-repeat: no-repeat;
        background-size: 1.25em 1.25em;
        padding-right: 2.5rem;
    }
</style>
@endsection
