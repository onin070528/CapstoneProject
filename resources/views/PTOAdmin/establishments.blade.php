@extends('PTOAdmin.layout', ['activePage' => 'establishments'])

@section('title', 'iTOUR - Establishments Management')

@section('admin-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Establishment Management</h1>
            <p class="text-sm text-slate-500 mt-1">Review, accredit, and manage all tourism establishments in the province.</p>
        </div>
        <div>
            <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-sm font-semibold rounded-[6px] transition flex items-center gap-2 shadow-sm">
                <i class="fas fa-plus text-xs"></i> Add Establishment
            </button>
        </div>
    </div>

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

            <!-- Export Button Row -->
            <div class="flex justify-end">
                <button class="bg-white border border-slate-200 text-slate-700 px-4 py-1.5 text-xs font-semibold rounded-[6px] hover:bg-slate-50 transition flex items-center gap-2 shadow-xs">
                    <i class="fas fa-arrow-down text-xs"></i> Export
                </button>
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
                    <!-- EST-001 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">EST-001</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-slate-800">Blue Bless Resort</span>
                                <span class="bg-[#eefaf8] text-[#0a5c51] px-2 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase shadow-2xs">VERIFIED</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-500">Resort</td>
                        <td class="py-4 px-6 text-slate-500">Mati City</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="text-slate-800 font-semibold">Juan Dela Cruz</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">+63 917 123 4567</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-1 text-amber-500">
                                <i class="fas fa-star text-xs"></i>
                                <span class="text-slate-700 text-xs font-bold">4.7</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">View</a>
                        </td>
                    </tr>

                    <!-- EST-002 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">EST-002</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-slate-800">Botona Beach Resort</span>
                                <span class="bg-[#eefaf8] text-[#0a5c51] px-2 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase shadow-2xs">VERIFIED</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-500">Resort</td>
                        <td class="py-4 px-6 text-slate-500">Mati City</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="text-slate-800 font-semibold">Liza Garcia</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">+63 917 234 5678</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-1 text-amber-500">
                                <i class="fas fa-star text-xs"></i>
                                <span class="text-slate-700 text-xs font-bold">4.5</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">View</a>
                        </td>
                    </tr>

                    <!-- EST-003 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">EST-003</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-slate-800">Mati Marina Hotel</span>
                                <span class="bg-[#eefaf8] text-[#0a5c51] px-2 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase shadow-2xs">VERIFIED</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-500">Hotel</td>
                        <td class="py-4 px-6 text-slate-500">Mati City</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="text-slate-800 font-semibold">Roberto Lim</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">+63 918 345 6789</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-1 text-amber-500">
                                <i class="fas fa-star text-xs"></i>
                                <span class="text-slate-700 text-xs font-bold">4.6</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">View</a>
                        </td>
                    </tr>

                    <!-- EST-004 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">EST-004</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-slate-800">Aliwagwag Eco Lodge</span>
                                <span class="bg-[#eefaf8] text-[#0a5c51] px-2 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase shadow-2xs">VERIFIED</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-500">Lodge</td>
                        <td class="py-4 px-6 text-slate-500">Cateel</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="text-slate-800 font-semibold">Marites Bayan</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">+63 919 456 7890</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-1 text-amber-500">
                                <i class="fas fa-star text-xs"></i>
                                <span class="text-slate-700 text-xs font-bold">4.8</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">View</a>
                        </td>
                    </tr>

                    <!-- EST-005 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">EST-005</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-slate-800">Pacific View Inn</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-500">Inn</td>
                        <td class="py-4 px-6 text-slate-500">Governor Generoso</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="text-slate-800 font-semibold">Carlos Mendoza</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">+63 920 567 8901</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-400 font-normal">—</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-600 shadow-2xs">PENDING</span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">View</a>
                        </td>
                    </tr>

                    <!-- EST-006 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">EST-006</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-slate-800">Pujada Bay Diving Center</span>
                                <span class="bg-[#eefaf8] text-[#0a5c51] px-2 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase shadow-2xs">VERIFIED</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-500">Tour Operator</td>
                        <td class="py-4 px-6 text-slate-500">Mati City</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="text-slate-800 font-semibold">Anna Cruz</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">+63 921 678 9012</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-1 text-amber-500">
                                <i class="fas fa-star text-xs"></i>
                                <span class="text-slate-700 text-xs font-bold">4.9</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">View</a>
                        </td>
                    </tr>

                    <!-- EST-007 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">EST-007</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-slate-800">Cateel Heritage Café</span>
                                <span class="bg-[#eefaf8] text-[#0a5c51] px-2 py-0.5 rounded-[4px] text-[9px] font-extrabold tracking-wider uppercase shadow-2xs">VERIFIED</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-500">Restaurant</td>
                        <td class="py-4 px-6 text-slate-500">Cateel</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="text-slate-800 font-semibold">Jose Cabrera</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">+63 922 789 0123</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-1 text-amber-500">
                                <i class="fas fa-star text-xs"></i>
                                <span class="text-slate-700 text-xs font-bold">4.4</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">View</a>
                        </td>
                    </tr>

                    <!-- EST-008 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">EST-008</td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <span class="font-semibold text-slate-800">Sunrise Surf Hostel</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-500">Hostel</td>
                        <td class="py-4 px-6 text-slate-500">Mati City</td>
                        <td class="py-4 px-6">
                            <div class="flex flex-col">
                                <span class="text-slate-800 font-semibold">Mike Tan</span>
                                <span class="text-xs text-slate-400 font-normal mt-0.5">+63 923 890 1234</span>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-slate-400 font-normal">—</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-600 shadow-2xs">DRAFT</span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">View</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100 bg-slate-50/30 flex items-center justify-between">
            <span class="text-xs text-slate-400">Showing 8 establishments</span>
            <div class="flex items-center gap-1.5">
                <button class="w-8 h-8 flex items-center justify-center border border-slate-200 rounded text-slate-500 hover:bg-white text-xs disabled:opacity-50" disabled><i class="fas fa-chevron-left"></i></button>
                <button class="w-8 h-8 flex items-center justify-center bg-[#0a4e5c] text-white rounded text-xs font-bold">1</button>
                <button class="w-8 h-8 flex items-center justify-center border border-slate-200 rounded text-slate-500 hover:bg-white text-xs disabled:opacity-50" disabled><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection
