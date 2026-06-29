@extends('PTOAdmin.layout', ['activePage' => 'establishments'])

@section('title', 'iTOUR - Establishments Management')

@section('admin-content')
<div class="space-y-6" x-data="{ 
    showAddModal: false, 
    showDetailModal: false, 
    selectedEst: {
        id: '',
        name: '',
        category: '',
        municipality: '',
        owner_name: '',
        owner_phone: '',
        rating: '',
        status: '',
        location: '',
        description: '',
        uuid: '',
        qrUrl: ''
    },
    openDetail(est) {
        this.selectedEst = est;
        // Find QR Code svg from hidden container and inject it
        const qrSvg = document.getElementById('qr-svg-' + est.id).innerHTML;
        document.getElementById('modal-qr-container').innerHTML = qrSvg;
        this.showDetailModal = true;
    }
}">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Establishment Management</h1>
            <p class="text-sm text-slate-500 mt-1">Review, accredit, and manage all tourism establishments in the province.</p>
        </div>
        <div>
            <button @click="showAddModal = true" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-sm font-semibold rounded-[6px] transition flex items-center gap-2 shadow-sm cursor-pointer">
                <i class="fas fa-plus text-xs"></i> Add Establishment
            </button>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg flex items-center gap-3">
        <i class="fas fa-circle-check text-emerald-500 text-lg"></i>
        <span class="text-sm font-semibold">{{ session('success') }}</span>
    </div>
    @endif

    @if ($errors->any())
    <div class="bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 rounded-lg space-y-1">
        <div class="flex items-center gap-3">
            <i class="fas fa-circle-exclamation text-rose-500 text-lg"></i>
            <span class="text-sm font-bold">Please correct the following errors:</span>
        </div>
        <ul class="list-disc list-inside text-xs pl-6">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Main Container Card -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
        <!-- Filters Box -->
        <div class="p-6 border-b border-slate-100 space-y-4">
            <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
                <!-- Search -->
                <div class="relative flex-1 max-w-md">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-slate-400 text-sm"></i>
                    </span>
                    <input type="text" placeholder="Search establishments..." class="w-full bg-slate-50 border border-slate-200 pl-10 pr-4 py-2 text-sm rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all">
                </div>

                <!-- Dropdown -->
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <select class="appearance-none bg-slate-50 border border-slate-200 text-slate-700 text-xs px-4 py-2 pr-10 rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]">
                            <option>All</option>
                            <option>Verified</option>
                            <option>Pending</option>
                            <option>Draft</option>
                        </select>
                        <i class="fas fa-chevron-down text-[10px] text-slate-400 absolute right-3.5 top-3 pointer-events-none"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table View -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-100 text-slate-400 text-[10px] font-bold tracking-wider uppercase">
                        <th class="py-4 px-6">ID</th>
                        <th class="py-4 px-6">Name</th>
                        <th class="py-4 px-6">Category</th>
                        <th class="py-4 px-6">Municipality</th>
                        <th class="py-4 px-6">Owner</th>
                        <th class="py-4 px-6">Rating</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700 text-sm font-medium">
                    @forelse ($establishments as $est)
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">EST-{{ str_pad($est->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-slate-800">{{ $est->name }}</span>
                                @if($est->status == 'ACTIVE')
                                <span class="bg-[#eefaf8] text-[#0a5c51] px-2 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase shadow-2xs">VERIFIED</span>
                                @endif
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-500">{{ $est->category }}</td>
                        <td class="py-4 px-6 text-slate-500">{{ $est->municipality }}</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="text-slate-800 font-semibold">{{ $est->owner_name ?? '—' }}</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">{{ $est->owner_phone ?? '—' }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-1 text-amber-500">
                                <i class="fas fa-star text-xs"></i>
                                <span class="text-slate-700 text-xs font-bold">{{ $est->rating ?: '0.0' }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            @if($est->status == 'ACTIVE')
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                            @elseif($est->status == 'PENDING')
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-600 shadow-2xs">PENDING</span>
                            @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-600 shadow-2xs">DRAFT</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-right">
                            <!-- Hidden QR container to be read by detail modal -->
                            <div id="qr-svg-{{ $est->id }}" class="hidden">
                                {!! QrCode::size(220)->generate(route('feedback.show', $est->uuid)) !!}
                            </div>
                            
                            <button 
                                @click="openDetail({
                                    id: '{{ $est->id }}',
                                    name: '{{ addslashes($est->name) }}',
                                    category: '{{ addslashes($est->category) }}',
                                    municipality: '{{ addslashes($est->municipality) }}',
                                    owner_name: '{{ addslashes($est->owner_name) }}',
                                    owner_phone: '{{ addslashes($est->owner_phone) }}',
                                    rating: '{{ $est->rating }}',
                                    status: '{{ $est->status }}',
                                    location: '{{ addslashes($est->location) }}',
                                    description: '{{ addslashes($est->description) }}',
                                    uuid: '{{ $est->uuid }}',
                                    qrUrl: '{{ route('feedback.show', $est->uuid) }}'
                                })"
                                class="text-[#0a4e5c] hover:underline text-xs font-bold bg-transparent border-0 cursor-pointer">
                                View Details & QR
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="py-8 text-center text-slate-400">No establishments found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100 bg-slate-50/30 flex items-center justify-between">
            <span class="text-xs text-slate-400">Showing {{ $establishments->count() }} establishments</span>
        </div>
    </div>

<!-- Modal: Add Establishment -->
<div x-show="showAddModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs" x-cloak style="display: none;">
    <div class="bg-white rounded-xl shadow-2xl border border-slate-100 w-full max-w-lg overflow-hidden relative z-10 animate-modalIn" @click.away="showAddModal = false">
        <div class="bg-[#0a4e5c] text-white px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <i class="fas fa-building text-lg"></i>
                <h3 class="font-extrabold text-base leading-none">Register New Establishment</h3>
            </div>
            <button @click="showAddModal = false" class="text-white/80 hover:text-white focus:outline-none cursor-pointer">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <form action="{{ route('admin.establishments.store') }}" method="POST" class="p-6 space-y-4 max-h-[80vh] overflow-y-auto">
            @csrf
            
            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Establishment Name *</label>
                <input type="text" name="name" required placeholder="e.g. Ocean View Resort" class="w-full bg-slate-50 border border-slate-200 px-3.5 py-2 rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all text-slate-800 text-sm">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Category *</label>
                    <select name="category" required class="w-full bg-slate-50 border border-slate-200 px-3 py-2 rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] text-sm text-slate-800">
                        <option value="Resort">Resort</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Restaurant">Restaurant</option>
                        <option value="Lodge">Lodge</option>
                        <option value="Inn">Inn</option>
                        <option value="Hostel">Hostel</option>
                        <option value="Tour Operator">Tour Operator</option>
                        <option value="Tourist Attraction">Tourist Attraction</option>
                    </select>
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Municipality *</label>
                    <select name="municipality" required class="w-full bg-slate-50 border border-slate-200 px-3 py-2 rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] text-sm text-slate-800">
                        <option value="Mati City">Mati City</option>
                        <option value="Cateel">Cateel</option>
                        <option value="San Isidro">San Isidro</option>
                        <option value="Governor Generoso">Governor Generoso</option>
                        <option value="Boston">Boston</option>
                        <option value="Caraga">Caraga</option>
                        <option value="Manay">Manay</option>
                        <option value="Baganga">Baganga</option>
                        <option value="Banaybanay">Banaybanay</option>
                        <option value="Lupon">Lupon</option>
                        <option value="San Victor">San Victor</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Owner Name</label>
                    <input type="text" name="owner_name" placeholder="e.g. Juan Dela Cruz" class="w-full bg-slate-50 border border-slate-200 px-3.5 py-2 rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all text-slate-800 text-sm">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Owner Phone</label>
                    <input type="text" name="owner_phone" placeholder="e.g. +63 917 123 4567" class="w-full bg-slate-50 border border-slate-200 px-3.5 py-2 rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all text-slate-800 text-sm">
                </div>
            </div>

            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Detailed Address / Location</label>
                <input type="text" name="location" placeholder="e.g. Brgy. Dahican, Mati City" class="w-full bg-slate-50 border border-slate-200 px-3.5 py-2 rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all text-slate-800 text-sm">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Latitude</label>
                    <input type="text" name="lat" placeholder="e.g. 6.7212" class="w-full bg-slate-50 border border-slate-200 px-3.5 py-2 rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all text-slate-800 text-sm">
                </div>

                <div class="space-y-1">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Longitude</label>
                    <input type="text" name="lng" placeholder="e.g. 126.2730" class="w-full bg-slate-50 border border-slate-200 px-3.5 py-2 rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all text-slate-800 text-sm">
                </div>
            </div>

            <div class="space-y-1">
                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider">Description</label>
                <textarea name="description" rows="3" placeholder="Brief description of the establishment..." class="w-full bg-slate-50 border border-slate-200 px-3.5 py-2 text-sm rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all resize-none text-slate-800"></textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-3 border-t border-slate-100">
                <button type="button" @click="showAddModal = false" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-4 py-2 text-xs font-bold rounded-[6px] transition cursor-pointer">
                    Cancel
                </button>
                <button type="submit" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-5 py-2 text-xs font-bold rounded-[6px] transition flex items-center gap-1.5 shadow-sm cursor-pointer">
                    <i class="fas fa-save"></i> Register Establishment
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal: View Details & QR -->
<div x-show="showDetailModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs" x-cloak style="display: none;">
    <div class="bg-white rounded-xl shadow-2xl border border-slate-100 w-full max-w-2xl overflow-hidden relative z-10 animate-modalIn" @click.away="showDetailModal = false">
        <div class="bg-[#0a4e5c] text-white px-6 py-4 flex items-center justify-between">
            <h3 class="font-extrabold text-base leading-none" x-text="selectedEst.name">Establishment Details</h3>
            <button @click="showDetailModal = false" class="text-white/80 hover:text-white focus:outline-none cursor-pointer">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Details -->
            <div class="space-y-4">
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">UUID / Identifier</span>
                    <span class="text-xs font-semibold text-slate-700 bg-slate-50 border border-slate-150 px-2 py-1 rounded inline-block select-all mt-1" x-text="selectedEst.uuid"></span>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Category</span>
                        <span class="text-sm font-semibold text-slate-800" x-text="selectedEst.category"></span>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Municipality</span>
                        <span class="text-sm font-semibold text-slate-800" x-text="selectedEst.municipality"></span>
                    </div>
                </div>

                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Owner Contact</span>
                    <p class="text-sm font-semibold text-slate-800" x-text="selectedEst.owner_name || '—'"></p>
                    <p class="text-xs text-slate-500" x-text="selectedEst.owner_phone || '—'"></p>
                </div>

                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Detailed Address</span>
                    <span class="text-sm text-slate-600 block" x-text="selectedEst.location || '—'"></span>
                </div>

                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block">Description</span>
                    <p class="text-xs text-slate-500 leading-relaxed" x-text="selectedEst.description || 'No description provided.'"></p>
                </div>
            </div>

            <!-- QR Code Box -->
            <div class="flex flex-col items-center justify-center bg-slate-50 rounded-xl p-6 border border-slate-200/60">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Feedback QR Code</span>
                
                <!-- Container injected with SVG -->
                <div id="modal-qr-container" class="bg-white p-3 rounded-lg border border-slate-200 shadow-2xs flex items-center justify-center">
                </div>

                <p class="text-[10px] text-slate-400 text-center mt-3 font-semibold break-all max-w-[220px]" x-text="selectedEst.qrUrl"></p>
                
                <!-- Print/Download buttons -->
                <div class="flex items-center gap-2 mt-4">
                    <button onclick="window.print()" class="bg-white border border-slate-350 hover:bg-slate-50 text-slate-700 px-3 py-1.5 rounded text-xs font-bold flex items-center gap-1.5 shadow-2xs transition cursor-pointer">
                        <i class="fas fa-print"></i> Print QR
                    </button>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end px-6 py-4 border-t border-slate-100 bg-slate-50/50">
            <button @click="showDetailModal = false" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-4 py-2 text-xs font-bold rounded-[6px] transition cursor-pointer">
                Close
            </button>
        </div>
    </div>
</div>
</div>
@endsection
