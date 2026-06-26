@extends('PTOAdmin.layout', ['activePage' => 'user-management'])

@section('title', 'iTOUR - User Management')

@section('admin-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">User Management</h1>
            <p class="text-sm text-slate-500 mt-1">Manage personnel, establishment, and tourist accounts.</p>
        </div>
        <div>
            <button class="bg-[#0a4e5c] hover:bg-[#073640] text-white px-4 py-2 text-sm font-semibold rounded-[6px] transition flex items-center gap-2 shadow-sm">
                <i class="fas fa-plus text-xs"></i> Create User
            </button>
        </div>
    </div>

    <!-- Main Container Card -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
        <!-- Filters Box -->
        <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
            <!-- Search -->
            <div class="relative flex-1 max-w-md">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-slate-400 text-sm"></i>
                </span>
                <input type="text" placeholder="Search users..." class="w-full bg-slate-50 border border-slate-200 pl-10 pr-4 py-2 text-sm rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all">
            </div>

            <!-- Dropdown -->
            <div class="flex items-center gap-3">
                <div class="relative">
                    <select class="appearance-none bg-slate-50 border border-slate-200 text-slate-700 text-xs px-4 py-2 pr-10 rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]">
                        <option>All roles</option>
                        <option>Tourism Officer</option>
                        <option>Super Administrator</option>
                        <option>Analytics Officer</option>
                        <option>Establishment Owner</option>
                        <option>Establishment Staff</option>
                        <option>Tourist</option>
                    </select>
                    <i class="fas fa-chevron-down text-[10px] text-slate-400 absolute right-3.5 top-3 pointer-events-none"></i>
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
                        <th class="py-4 px-6">Email</th>
                        <th class="py-4 px-6">Role</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700 text-sm font-medium">
                    <!-- U-001 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">U-001</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Maria Santos</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">maria.santos@davaooriental.gov.ph</td>
                        <td class="py-4 px-6 text-slate-600">Tourism Officer</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-end gap-3">
                                <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">Edit</a>
                                <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Roles</button>
                                <button class="bg-rose-700 hover:bg-rose-800 text-white px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Suspend</button>
                            </div>
                        </td>
                    </tr>

                    <!-- U-002 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">U-002</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Jose Reyes</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">jose.reyes@davaooriental.gov.ph</td>
                        <td class="py-4 px-6 text-slate-600">Super Administrator</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-end gap-3">
                                <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">Edit</a>
                                <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Roles</button>
                                <button class="bg-rose-700 hover:bg-rose-800 text-white px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Suspend</button>
                            </div>
                        </td>
                    </tr>

                    <!-- U-003 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">U-003</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Liza Bautista</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">liza.bautista@davaooriental.gov.ph</td>
                        <td class="py-4 px-6 text-slate-600">Analytics Officer</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-end gap-3">
                                <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">Edit</a>
                                <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Roles</button>
                                <button class="bg-rose-700 hover:bg-rose-800 text-white px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Suspend</button>
                            </div>
                        </td>
                    </tr>

                    <!-- U-004 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">U-004</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Juan Dela Cruz</td>
                        <td class="py-4 px-6 text-slate-500 font-normal font-normal">juan@blueblessresort.com</td>
                        <td class="py-4 px-6 text-slate-600">Establishment Owner</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-end gap-3">
                                <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">Edit</a>
                                <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Roles</button>
                                <button class="bg-rose-700 hover:bg-rose-800 text-white px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Suspend</button>
                            </div>
                        </td>
                    </tr>

                    <!-- U-005 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">U-005</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Carlos Mendoza</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">carlos@pacificviewinn.com</td>
                        <td class="py-4 px-6 text-slate-600">Establishment Owner</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-600 shadow-2xs">PENDING</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-end gap-3">
                                <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">Edit</a>
                                <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Roles</button>
                                <button class="bg-rose-700 hover:bg-rose-800 text-white px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Suspend</button>
                            </div>
                        </td>
                    </tr>

                    <!-- U-006 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">U-006</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Mark Tan</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">mtan@example.com</td>
                        <td class="py-4 px-6 text-slate-600">Tourist</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-end gap-3">
                                <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">Edit</a>
                                <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Roles</button>
                                <button class="bg-rose-700 hover:bg-rose-800 text-white px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Suspend</button>
                            </div>
                        </td>
                    </tr>

                    <!-- U-007 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">U-007</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Anna Cruz</td>
                        <td class="py-4 px-6 text-slate-500 font-normal font-normal">anna@pujadabaydiving.com</td>
                        <td class="py-4 px-6 text-slate-600">Establishment Staff</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 shadow-2xs">ACTIVE</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-end gap-3">
                                <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">Edit</a>
                                <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Roles</button>
                                <button class="bg-rose-700 hover:bg-rose-800 text-white px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Suspend</button>
                            </div>
                        </td>
                    </tr>

                    <!-- U-008 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">U-008</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Pedro Sayson</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">pedro@bostonsurf.com</td>
                        <td class="py-4 px-6 text-slate-600">Establishment Owner</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-600 shadow-2xs">DRAFT</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center justify-end gap-3">
                                <a href="#" class="text-[#0a4e5c] hover:underline text-xs font-bold">Edit</a>
                                <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Roles</button>
                                <button class="bg-rose-700 hover:bg-rose-800 text-white px-3 py-1 text-xs font-bold rounded-[4px] shadow-2xs">Suspend</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100 bg-slate-50/30 flex items-center justify-between">
            <span class="text-xs text-slate-400">Showing 8 users</span>
            <div class="flex items-center gap-1.5">
                <button class="w-8 h-8 flex items-center justify-center border border-slate-200 rounded text-slate-500 hover:bg-white text-xs disabled:opacity-50" disabled><i class="fas fa-chevron-left"></i></button>
                <button class="w-8 h-8 flex items-center justify-center bg-[#0a4e5c] text-white rounded text-xs font-bold">1</button>
                <button class="w-8 h-8 flex items-center justify-center border border-slate-200 rounded text-slate-500 hover:bg-white text-xs disabled:opacity-50" disabled><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection
