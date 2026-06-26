@extends('PTOAdmin.layout', ['activePage' => 'destinations'])

@section('title', 'iTOUR - Destination Management')

@section('admin-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Destination Management</h1>
            <p class="text-sm text-slate-500 mt-1">Manage public destinations, tourist spots, and natural attractions in Davao Oriental.</p>
        </div>
        <div>
            <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-sm font-semibold rounded-[6px] transition flex items-center gap-2 shadow-sm">
                <i class="fas fa-plus text-xs"></i> Add Destination
            </button>
        </div>
    </div>

    <!-- Filters Box -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-6">
        <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
            <!-- Search -->
            <div class="relative flex-1 max-w-md">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-slate-400 text-sm"></i>
                </span>
                <input type="text" placeholder="Search destinations..." class="w-full bg-slate-50 border border-slate-200 pl-10 pr-4 py-2 text-sm rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all">
            </div>

            <!-- Dropdown -->
            <div class="flex items-center gap-3">
                <div class="relative">
                    <select class="appearance-none bg-slate-50 border border-slate-200 text-slate-700 text-xs px-4 py-2 pr-10 rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]">
                        <option>All Types</option>
                        <option>Beach</option>
                        <option>Mountain</option>
                        <option>Waterfall</option>
                        <option>Heritage</option>
                        <option>Landmark</option>
                    </select>
                    <i class="fas fa-chevron-down text-[10px] text-slate-400 absolute right-3.5 top-3 pointer-events-none"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Destinations Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Destination 1 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden hover:shadow-md transition duration-200 flex flex-col justify-between">
            <div>
                <!-- Image or visual spacer -->
                <div class="h-40 bg-slate-100 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&auto=format&fit=crop&q=60')">
                    <span class="absolute top-3 left-3 bg-[#0a5c51] text-white px-2 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase shadow-2xs">Beach</span>
                    <span class="absolute top-3 right-3 bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-full text-[10px] font-bold shadow-2xs">ACTIVE</span>
                </div>
                <div class="p-6">
                    <h3 class="font-extrabold text-base text-slate-800">Dahican Beach</h3>
                    <p class="text-xs text-slate-400 font-semibold mt-1"><i class="fas fa-map-marker-alt text-red-400 mr-1"></i> Mati City, Davao Oriental</p>
                    <p class="text-xs text-slate-500 font-medium leading-relaxed mt-3">A popular destination for surfers, skimboarders, and beach lovers, featuring a 7-kilometer crescent of fine white sand.</p>
                </div>
            </div>
            <div class="px-6 pb-6 pt-3 border-t border-slate-50 flex items-center justify-between">
                <div class="flex items-center gap-1 text-amber-500">
                    <i class="fas fa-star text-xs"></i>
                    <span class="text-slate-700 text-xs font-bold">4.8</span>
                    <span class="text-slate-400 text-[10px] font-semibold">(1,284 reviews)</span>
                </div>
                <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">Edit Details</a>
            </div>
        </div>

        <!-- Destination 2 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden hover:shadow-md transition duration-200 flex flex-col justify-between">
            <div>
                <div class="h-40 bg-slate-100 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=600&auto=format&fit=crop&q=60')">
                    <span class="absolute top-3 left-3 bg-[#0a5c51] text-white px-2 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase shadow-2xs">Mountain</span>
                    <span class="absolute top-3 right-3 bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-full text-[10px] font-bold shadow-2xs">ACTIVE</span>
                </div>
                <div class="p-6">
                    <h3 class="font-extrabold text-base text-slate-800">Mt. Hamiguitan Range</h3>
                    <p class="text-xs text-slate-400 font-semibold mt-1"><i class="fas fa-map-marker-alt text-red-400 mr-1"></i> San Isidro, Davao Oriental</p>
                    <p class="text-xs text-slate-500 font-medium leading-relaxed mt-3">A UNESCO World Heritage Site featuring a unique pygmy forest of century-old dwarf trees and diverse wildlife.</p>
                </div>
            </div>
            <div class="px-6 pb-6 pt-3 border-t border-slate-50 flex items-center justify-between">
                <div class="flex items-center gap-1 text-amber-500">
                    <i class="fas fa-star text-xs"></i>
                    <span class="text-slate-700 text-xs font-bold">4.9</span>
                    <span class="text-slate-400 text-[10px] font-semibold">(642 reviews)</span>
                </div>
                <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">Edit Details</a>
            </div>
        </div>

        <!-- Destination 3 -->
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden hover:shadow-md transition duration-200 flex flex-col justify-between">
            <div>
                <div class="h-40 bg-slate-100 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=600&auto=format&fit=crop&q=60')">
                    <span class="absolute top-3 left-3 bg-[#0a5c51] text-white px-2 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase shadow-2xs">Beach</span>
                    <span class="absolute top-3 right-3 bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-full text-[10px] font-bold shadow-2xs">ACTIVE</span>
                </div>
                <div class="p-6">
                    <h3 class="font-extrabold text-base text-slate-800">Pujada Bay</h3>
                    <p class="text-xs text-slate-400 font-semibold mt-1"><i class="fas fa-map-marker-alt text-red-400 mr-1"></i> Mati City, Davao Oriental</p>
                    <p class="text-xs text-slate-500 font-medium leading-relaxed mt-3">Known as one of the Most Beautiful Bays in the World, featuring crystal clear turquoise waters and rich marine life.</p>
                </div>
            </div>
            <div class="px-6 pb-6 pt-3 border-t border-slate-50 flex items-center justify-between">
                <div class="flex items-center gap-1 text-amber-500">
                    <i class="fas fa-star text-xs"></i>
                    <span class="text-slate-700 text-xs font-bold">4.7</span>
                    <span class="text-slate-400 text-[10px] font-semibold">(905 reviews)</span>
                </div>
                <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">Edit Details</a>
            </div>
        </div>
    </div>
</div>
@endsection
