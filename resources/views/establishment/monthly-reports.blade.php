@extends('layouts.app')

@section('title', 'Monthly Reports - Establishment Console - ITOUR Mati')

@section('content')
<div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-56 text-white flex flex-col fixed h-screen" style="background: linear-gradient(to bottom, #0F4C81, #0A3A62);">
        <!-- Logo -->
        <div class="p-6 border-b" style="border-color: #0A3A62;">
            <div class="flex items-center gap-3 mb-1">
                <div class="text-blue-900 rounded-lg p-2 font-bold text-lg" style="background-color: #F4A261;">IT</div>
                <div>
                    <h1 class="font-bold text-lg leading-tight">ITOUR Mati</h1>
                    <p class="text-xs text-blue-200">Tourism Intelligence</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex-1 pt-8">
            <p class="text-xs font-bold text-blue-300 px-6 mb-4">ESTABLISHMENT CONSOLE</p>
            <nav class="space-y-2 px-4">
                <a href="/establishment/overview" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-th-large text-lg"></i>
                    <span>Overview</span>
                </a>
                <a href="/establishment/record-arrivals" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-clipboard-list text-lg"></i>
                    <span>Record Arrivals</span>
                </a>
                <a href="/establishment/monthly-reports" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                    <i class="fas fa-chart-bar text-lg"></i>
                    <span>Monthly Reports</span>
                    <i class="fas fa-chevron-right ml-auto"></i>
                </a>
                <a href="/establishment/guest-feedback" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-comment-dots text-lg"></i>
                    <span>Guest Feedback</span>
                </a>
            </nav>
        </div>

        <!-- Switch Role -->
        <div class="border-t p-6" style="border-color: #0A3A62;">
            <p class="text-xs font-bold text-blue-300 mb-4">SWITCH ROLE</p>
            <a href="/" class="block w-full text-white text-center py-2 px-4 rounded-lg mb-2 transition text-sm" style="background-color: #0A3A62;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                Public Tourist
            </a>
            <button class="w-full text-blue-900 font-bold py-2 px-4 rounded-lg mb-2 transition" style="background-color: #F4A261;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                Establishment
            </button>
            <a href="/admin/dashboard" class="block w-full text-white text-center py-2 px-4 rounded-lg transition text-sm" style="background-color: #0A3A62;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                PTO Admin
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="ml-56 flex-1 flex flex-col">
        <!-- Top Header -->
        <div class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
            <div class="flex-1 max-w-md">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" placeholder="Search destinations, establishments, reports..."
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none" style="border-color: #d1d5db;" onfocus="this.style.borderColor='#0F4C81'" onblur="this.style.borderColor='#d1d5db'">
                </div>
            </div>
            <div class="flex items-center gap-6 ml-8">
                <button class="text-gray-600 text-xl relative">
                    <i class="fas fa-bell"></i>
                    <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center" style="font-size: 10px; top: -4px; right: -4px;">1</span>
                </button>
                <div class="flex items-center gap-3">
                    <div class="text-white rounded-full w-10 h-10 flex items-center justify-center font-bold" style="background-color: #0F4C81;">{{ $establishment['initials'] }}</div>
                    <div>
                        <p class="text-sm font-semibold">{{ $establishment['name'] }}</p>
                        <p class="text-xs text-gray-500">Establishment Console</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 overflow-y-auto bg-gray-50">
            <!-- Page Title + Submit Button -->
            <div class="px-8 pt-8 pb-4 flex justify-between items-start">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Monthly Arrival Reports</h1>
                    <p class="text-gray-500 mt-1">Compile, review and submit reports to the Provincial Tourism Office</p>
                </div>
                <button class="flex items-center gap-2 text-white px-6 py-3 rounded-lg font-semibold transition" style="background-color: #0F4C81;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='#0F4C81'">
                    <i class="fas fa-paper-plane"></i>
                    Submit Jan 2025
                </button>
            </div>

            <!-- Content: Table + Draft Sidebar -->
            <div class="px-8 pb-8 flex gap-6">
                <!-- Submission History Table -->
                <div class="flex-1 bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Submission History</h2>
                    <table class="w-full">
                        <thead>
                            <tr class="text-left">
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">REPORT ID</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">PERIOD</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">SUBMITTED</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">ARRIVALS</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">STATUS</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                            <tr class="border-t border-gray-100">
                                <td class="py-4 text-sm font-mono text-gray-700">{{ $report['id'] }}</td>
                                <td class="py-4 text-sm text-gray-900 font-medium">{{ $report['period'] }}</td>
                                <td class="py-4 text-sm text-gray-500">{{ $report['submitted'] }}</td>
                                <td class="py-4 text-sm text-gray-900 font-bold">{{ $report['arrivals'] }}</td>
                                <td class="py-4">
                                    <span class="flex items-center gap-1 text-sm font-medium" style="color: {{ $report['status_color'] }};">
                                        <span class="w-2 h-2 rounded-full" style="background-color: {{ $report['status_color'] }};"></span>
                                        {{ $report['status'] }}
                                    </span>
                                </td>
                                <td class="py-4">
                                    <a href="#" class="flex items-center gap-1 text-sm font-medium" style="color: #0F4C81;">
                                        <i class="fas fa-download text-xs"></i>
                                        PDF
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- January 2025 Draft Sidebar -->
                <div class="w-72 bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">{{ $draft['month'] }} Draft</h2>

                    <!-- Encoded So Far -->
                    <div class="bg-gray-50 rounded-lg p-4 mb-4 border border-gray-100">
                        <p class="text-xs font-semibold text-gray-500 tracking-wide mb-1">ENCODED SO FAR</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $draft['encoded'] }} <span class="text-base font-normal text-gray-500">guests</span></p>
                        <p class="text-xs text-gray-400 mt-1">Auto-aggregated from daily encoding</p>
                    </div>

                    <!-- Breakdown -->
                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div class="bg-gray-50 rounded-lg p-3 border border-gray-100">
                            <p class="text-xs text-gray-500 mb-1">Domestic</p>
                            <p class="text-xl font-bold text-gray-900">{{ $draft['domestic'] }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3 border border-gray-100">
                            <p class="text-xs text-gray-500 mb-1">Foreign</p>
                            <p class="text-xl font-bold text-gray-900">{{ $draft['foreign'] }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3 border border-gray-100">
                            <p class="text-xs text-gray-500 mb-1">Leisure</p>
                            <p class="text-xl font-bold text-gray-900">{{ $draft['leisure'] }}</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3 border border-gray-100">
                            <p class="text-xs text-gray-500 mb-1">Business</p>
                            <p class="text-xl font-bold text-gray-900">{{ $draft['business'] }}</p>
                        </div>
                    </div>

                    <!-- Preview Report Button -->
                    <button class="w-full flex items-center justify-center gap-2 py-3 border border-gray-300 rounded-lg text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
                        <i class="fas fa-file-alt"></i>
                        Preview Report
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
