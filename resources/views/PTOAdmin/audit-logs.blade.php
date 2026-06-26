@extends('PTOAdmin.layout', ['activePage' => 'audit-logs'])

@section('title', 'iTOUR - Audit Logs')

@section('admin-content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Audit Logs</h1>
            <p class="text-sm text-slate-500 mt-1">Track logins, approvals, and administrative activity for accountability.</p>
        </div>
        <div>
            <button class="bg-white border border-slate-200 text-slate-700 px-4 py-2 text-sm font-semibold rounded-[6px] hover:bg-slate-50 transition flex items-center gap-2 shadow-xs">
                <i class="fas fa-arrow-down text-xs"></i> Export
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
                <input type="text" placeholder="Search activity..." class="w-full bg-slate-50 border border-slate-200 pl-10 pr-4 py-2 text-sm rounded-[6px] focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#0a4e5c] transition-all">
            </div>

            <!-- Dropdown -->
            <div class="flex items-center gap-3">
                <div class="relative">
                    <select class="appearance-none bg-slate-50 border border-slate-200 text-slate-700 text-xs px-4 py-2 pr-10 rounded-[6px] focus:outline-none focus:ring-1 focus:ring-[#0a4e5c]">
                        <option>All actions</option>
                        <option>Logins</option>
                        <option>Approvals</option>
                        <option>QR Generation</option>
                        <option>Announcements</option>
                        <option>Settings Updates</option>
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
                        <th class="py-4 px-6">Log ID</th>
                        <th class="py-4 px-6">User</th>
                        <th class="py-4 px-6">Action</th>
                        <th class="py-4 px-6">Target</th>
                        <th class="py-4 px-6">Timestamp</th>
                        <th class="py-4 px-6">IP Address</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700 text-sm font-medium">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1000</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Maria Santos</td>
                        <td class="py-4 px-6 text-slate-600">Logged in</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">Pacific View Inn</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-20 08:00</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.50</td>
                    </tr>
                    
                    <!-- Row 2 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1001</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Jose Reyes</td>
                        <td class="py-4 px-6 text-slate-600">Approved establishment</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">EST-004</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-19 09:07</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.51</td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1002</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Liza Bautista</td>
                        <td class="py-4 px-6 text-slate-600">Generated QR code</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">Dahican Beach</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-18 10:14</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.52</td>
                    </tr>

                    <!-- Row 4 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1003</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Admin</td>
                        <td class="py-4 px-6 text-slate-600">Updated destination</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">EST-007</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-17 11:21</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.53</td>
                    </tr>

                    <!-- Row 5 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1004</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Maria Santos</td>
                        <td class="py-4 px-6 text-slate-600">Rejected application</td>
                        <td class="py-4 px-6 text-slate-400 font-normal">—</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-16 12:28</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.54</td>
                    </tr>

                    <!-- Row 6 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1005</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Jose Reyes</td>
                        <td class="py-4 px-6 text-slate-600">Created announcement</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">Pacific View Inn</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-15 13:35</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.55</td>
                    </tr>

                    <!-- Row 7 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1006</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Liza Bautista</td>
                        <td class="py-4 px-6 text-slate-600">Logged in</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">EST-004</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-14 14:42</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.56</td>
                    </tr>

                    <!-- Row 8 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1007</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Admin</td>
                        <td class="py-4 px-6 text-slate-600">Approved establishment</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">Dahican Beach</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-13 15:49</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.57</td>
                    </tr>

                    <!-- Row 9 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1008</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Maria Santos</td>
                        <td class="py-4 px-6 text-slate-600">Generated QR code</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">EST-007</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-12 16:56</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.58</td>
                    </tr>

                    <!-- Row 10 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1009</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Jose Reyes</td>
                        <td class="py-4 px-6 text-slate-600">Updated destination</td>
                        <td class="py-4 px-6 text-slate-450 font-normal">—</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-11 17:03</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.59</td>
                    </tr>

                    <!-- Row 11 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1010</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Liza Bautista</td>
                        <td class="py-4 px-6 text-slate-600">Rejected application</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">Pacific View Inn</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-10 08:10</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.60</td>
                    </tr>

                    <!-- Row 12 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1011</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Admin</td>
                        <td class="py-4 px-6 text-slate-600">Created announcement</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">EST-004</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-09 09:17</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.61</td>
                    </tr>

                    <!-- Row 13 -->
                    <tr class="hover:bg-slate-50/50 transition duration-150">
                        <td class="py-4 px-6 text-slate-800 font-bold">AL-1012</td>
                        <td class="py-4 px-6 font-semibold text-slate-800">Maria Santos</td>
                        <td class="py-4 px-6 text-slate-600">Logged in</td>
                        <td class="py-4 px-6 text-slate-500 font-normal">Dahican Beach</td>
                        <td class="py-4 px-6 text-slate-500">2026-06-08 10:24</td>
                        <td class="py-4 px-6 text-slate-400 font-mono text-xs">192.168.1.62</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100 bg-slate-50/30 flex items-center justify-between">
            <span class="text-xs text-slate-400">Showing 13 log activities</span>
            <div class="flex items-center gap-1.5">
                <button class="w-8 h-8 flex items-center justify-center border border-slate-200 rounded text-slate-500 hover:bg-white text-xs disabled:opacity-50" disabled><i class="fas fa-chevron-left"></i></button>
                <button class="w-8 h-8 flex items-center justify-center bg-[#0a4e5c] text-white rounded text-xs font-bold">1</button>
                <button class="w-8 h-8 flex items-center justify-center border border-slate-200 rounded text-slate-500 hover:bg-white text-xs disabled:opacity-50" disabled><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection
