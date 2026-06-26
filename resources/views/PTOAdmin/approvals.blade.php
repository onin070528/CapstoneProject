@extends('PTOAdmin.layout', ['activePage' => 'approvals'])

@section('title', 'iTOUR - Pending Approvals')

@section('admin-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Pending Approvals</h1>
            <p class="text-sm text-slate-500 mt-1">Review applications for new tourist establishments, tour guides, and event registrations.</p>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
        <!-- Table View -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/70 border-b border-slate-100 text-slate-400 text-[10px] font-bold tracking-wider uppercase">
                        <th class="py-4 px-6">ID</th>
                        <th class="py-4 px-6">Target / Subject</th>
                        <th class="py-4 px-6">Type</th>
                        <th class="py-4 px-6">Requestor</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700 text-sm font-medium">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">EST-005</td>
                        <td class="py-4 px-6">
                            <span class="font-semibold text-slate-800">Pacific View Inn</span>
                        </td>
                        <td class="py-4 px-6 text-slate-500">Establishment Registration</td>
                        <td class="py-4 px-6 text-slate-600">Carlos Mendoza</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-600 shadow-2xs">PENDING</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <button class="bg-[#0a5c51] hover:bg-[#07463d] text-white px-3 py-1.5 text-xs font-bold rounded-[6px] transition">Approve</button>
                                <button class="bg-rose-600 hover:bg-rose-700 text-white px-3 py-1.5 text-xs font-bold rounded-[6px] transition">Reject</button>
                                <button class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 px-3 py-1.5 text-xs font-bold rounded-[6px] transition">Review</button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">TRG-012</td>
                        <td class="py-4 px-6">
                            <span class="font-semibold text-slate-800">John Doe</span>
                        </td>
                        <td class="py-4 px-6 text-slate-500">Tour Guide Accreditation</td>
                        <td class="py-4 px-6 text-slate-600">John Doe</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-600 shadow-2xs">PENDING</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <button class="bg-[#0a5c51] hover:bg-[#07463d] text-white px-3 py-1.5 text-xs font-bold rounded-[6px] transition">Approve</button>
                                <button class="bg-rose-600 hover:bg-rose-700 text-white px-3 py-1.5 text-xs font-bold rounded-[6px] transition">Reject</button>
                                <button class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 px-3 py-1.5 text-xs font-bold rounded-[6px] transition">Review</button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">EVT-034</td>
                        <td class="py-4 px-6">
                            <span class="font-semibold text-slate-800">Sambuokan Festival</span>
                        </td>
                        <td class="py-4 px-6 text-slate-500">Event Permit Request</td>
                        <td class="py-4 px-6 text-slate-600">City Government of Mati</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-600 shadow-2xs">PENDING</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <button class="bg-[#0a5c51] hover:bg-[#07463d] text-white px-3 py-1.5 text-xs font-bold rounded-[6px] transition">Approve</button>
                                <button class="bg-rose-600 hover:bg-rose-700 text-white px-3 py-1.5 text-xs font-bold rounded-[6px] transition">Reject</button>
                                <button class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 px-3 py-1.5 text-xs font-bold rounded-[6px] transition">Review</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
