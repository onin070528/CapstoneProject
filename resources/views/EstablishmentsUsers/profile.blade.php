@extends('EstablishmentsUsers.layout', ['activePage' => 'profile'])

@section('title', 'Blue Bless Resort - Establishment Profile')

@section('establishment-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Establishment Profile</h1>
        <p class="text-sm text-slate-500 mt-1">Manage business information, contact details, services, and gallery.</p>
    </div>

    <!-- Alert Notice -->
    <div class="bg-sky-50/60 border border-sky-100/80 rounded-xl p-4 flex items-start sm:items-center gap-3 text-sky-800 shadow-3xs">
        <i class="fas fa-info-circle text-sky-500 text-base mt-0.5 sm:mt-0 shrink-0"></i>
        <p class="text-xs sm:text-sm font-medium">Changes to verified information (business name, ownership) require re-verification by the Provincial Tourism Office.</p>
    </div>

    <!-- Main Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <!-- Left Column: Business Info -->
        <form class="lg:col-span-7 bg-white rounded-xl border border-slate-100 shadow-sm p-6 space-y-6" onsubmit="event.preventDefault();">
            <h3 class="font-bold text-slate-800 text-base border-b border-slate-50 pb-3">Business Information</h3>

            <!-- Business Name -->
            <div class="space-y-2">
                <label for="business_name" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Business Name *</label>
                <input type="text" id="business_name" value="Blue Bless Resort" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
            </div>

            <!-- Establishment ID & Category Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label for="establishment_id" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Establishment ID</label>
                    <input type="text" id="establishment_id" value="EST-001" readonly class="w-full bg-slate-100 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-500 font-medium cursor-not-allowed">
                </div>
                <div class="space-y-2">
                    <label for="category" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Category</label>
                    <select id="category" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                        <option value="resort" selected>Resort</option>
                        <option value="hotel">Hotel</option>
                        <option value="restaurant">Restaurant</option>
                        <option value="homestay">Homestay</option>
                    </select>
                </div>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <label for="description" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Description</label>
                <textarea id="description" rows="4" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all resize-none">Beachfront resort along Dahican with private cottages, pool, and surf school.</textarea>
            </div>

            <!-- Municipality & Address Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label for="municipality" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Municipality</label>
                    <input type="text" id="municipality" value="Mati City" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>
                <div class="space-y-2">
                    <label for="address" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Address</label>
                    <input type="text" id="address" value="Dahican Beach Road" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-4 pt-2">
                <button type="submit" class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-5 py-2.5 rounded-[6px] font-semibold text-sm transition shadow-sm">
                    Save changes
                </button>
                <button type="button" class="text-slate-500 font-medium text-sm hover:text-slate-700 hover:underline transition">
                    Cancel
                </button>
            </div>
        </form>

        <!-- Right Column: Contact Info & Services -->
        <div class="lg:col-span-5 space-y-6">
            <!-- Contact Info Form -->
            <form class="bg-white rounded-xl border border-slate-100 shadow-sm p-6 space-y-5" onsubmit="event.preventDefault();">
                <h3 class="font-bold text-slate-800 text-base border-b border-slate-50 pb-3">Contact Information</h3>

                <!-- Owner Name -->
                <div class="space-y-2">
                    <label for="owner_name" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Owner Name</label>
                    <input type="text" id="owner_name" value="Juan Dela Cruz" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>

                <!-- Phone -->
                <div class="space-y-2">
                    <label for="phone" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Phone</label>
                    <input type="text" id="phone" value="+63 917 123 4567" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label for="email" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Email</label>
                    <input type="email" id="email" value="juan@blueblessresort.com" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>

                <!-- Website -->
                <div class="space-y-2">
                    <label for="website" class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Website</label>
                    <input type="text" id="website" value="https://blueblessresort.com" class="w-full bg-slate-50/50 border border-slate-200 rounded-[6px] px-4 py-2.5 text-sm text-slate-800 font-medium focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]/30 focus:border-[#0a4e5c] transition-all">
                </div>
            </form>

            <!-- Services Offered Card -->
            <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6">
                <h3 class="font-bold text-slate-800 text-base border-b border-slate-50 pb-3">Services Offered</h3>

                <div class="mt-4 flex flex-wrap gap-2">
                    <span class="bg-sky-50 text-sky-800 text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-[6px] border border-sky-100/50">Accommodation</span>
                    <span class="bg-sky-50 text-sky-800 text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-[6px] border border-sky-100/50">Restaurant</span>
                    <span class="bg-sky-50 text-sky-800 text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-[6px] border border-sky-100/50">Pool</span>
                    <span class="bg-sky-50 text-sky-800 text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-[6px] border border-sky-100/50">Surfing</span>
                    <span class="bg-sky-50 text-sky-800 text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-[6px] border border-sky-100/50">Tours</span>
                    <span class="bg-sky-50 text-sky-800 text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-[6px] border border-sky-100/50">Event Hall</span>
                    <span class="bg-sky-50 text-sky-800 text-[10px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-[6px] border border-sky-100/50">Spa</span>
                </div>

                <div class="mt-6 border-t border-slate-100 pt-4">
                    <button class="border border-slate-200 hover:bg-slate-50 hover:border-slate-300 text-slate-600 px-3.5 py-1.5 text-xs font-semibold rounded-[6px] flex items-center gap-1.5 transition">
                        <i class="fas fa-plus text-[10px]"></i> Add service
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
