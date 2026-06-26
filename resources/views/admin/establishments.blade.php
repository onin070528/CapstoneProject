@extends('layouts.app')

@section('title', 'Establishments - PTO Admin - ITOUR Mati')

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
            <p class="text-xs font-bold text-blue-300 px-6 mb-4">PTO ADMINISTRATOR</p>
            <nav class="space-y-2 px-4">
                <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-th-large text-lg"></i>
                    <span>Executive Dashboard</span>
                </a>
                <a href="/admin/arrival-monitoring" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-chart-line text-lg"></i>
                    <span>Arrival Monitoring</span>
                </a>
                <a href="/admin/report-validation" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-clipboard-check text-lg"></i>
                    <span>Report Validation</span>
                </a>
                <a href="/admin/establishments" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                    <i class="fas fa-building text-lg"></i>
                    <span>Establishments</span>
                    <i class="fas fa-chevron-right ml-auto"></i>
                </a>
                <a href="/admin/sentiment-analytics" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-atom text-lg"></i>
                    <span>Sentiment Analytics</span>
                </a>
                <a href="/admin/performance-ranking" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-ranking-star text-lg"></i>
                    <span>Performance Ranking</span>
                </a>
            </nav>
        </div>

        <!-- Switch Role -->
        <div class="border-t p-6" style="border-color: #0A3A62;">
            <p class="text-xs font-bold text-blue-300 mb-4">SWITCH ROLE</p>
            <a href="/" class="block w-full text-white text-center py-2 px-4 rounded-lg mb-2 transition text-sm" style="background-color: #0A3A62;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                Public Tourist
            </a>
            <a href="/establishment/overview" class="block w-full text-white text-center py-2 px-4 rounded-lg mb-2 transition text-sm" style="background-color: #0A3A62;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                Establishment
            </a>
            <button class="w-full text-blue-900 font-bold py-2 px-4 rounded-lg mb-2 transition" style="background-color: #F4A261;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                PTO Admin
            </button>
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
                    <div class="text-white rounded-full w-10 h-10 flex items-center justify-center font-bold" style="background-color: #0F4C81;">{{ $admin['initials'] }}</div>
                    <div>
                        <p class="text-sm font-semibold">{{ $admin['name'] }}</p>
                        <p class="text-xs text-gray-500">{{ $admin['role'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 overflow-y-auto bg-gray-50">
            <!-- Page Title -->
            <div class="px-8 pt-8 pb-4 flex justify-between items-start">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Tourism Establishments</h1>
                    <p class="text-gray-500 mt-1">Manage accreditation, performance and compliance</p>
                </div>
                <button class="flex items-center gap-2 px-5 py-2.5 rounded-lg text-sm font-medium text-white transition" style="background-color: #0F4C81;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    <i class="fas fa-plus"></i>
                    Add Establishment
                </button>
            </div>

            <!-- Stat Cards -->
            <div class="grid grid-cols-3 gap-6 px-8 pb-6">
                @foreach($stats as $stat)
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 tracking-wide mb-2">{{ $stat['label'] }}</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stat['value'] }}</p>
                        </div>
                        <div class="w-10 h-10 rounded-full flex items-center justify-center" style="background-color: {{ $stat['icon_color'] }}15;">
                            <i class="{{ $stat['icon'] }}" style="color: {{ $stat['icon_color'] }};"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Directory Table -->
            <div class="px-8 pb-8">
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold text-gray-900">Directory</h2>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-2.5 text-gray-400 text-sm"></i>
                            <input type="text" placeholder="Search establishments..."
                                   class="pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none" style="border-color: #d1d5db; width: 220px;" onfocus="this.style.borderColor='#0F4C81'" onblur="this.style.borderColor='#d1d5db'">
                        </div>
                    </div>
                    <table class="w-full">
                        <thead>
                            <tr class="text-left">
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">NAME</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">TYPE</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">MUNICIPALITY</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">ACCREDITATION</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3 text-right">ARRIVALS MTD</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3 text-right">RATING</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3 text-right">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($directory as $est)
                            <tr class="border-t border-gray-100">
                                <td class="py-3 text-sm font-medium text-gray-900">{{ $est['name'] }}</td>
                                <td class="py-3 text-sm text-gray-500">{{ $est['type'] }}</td>
                                <td class="py-3 text-sm text-gray-500">{{ $est['municipality'] }}</td>
                                <td class="py-3">
                                    <span class="flex items-center gap-1.5 text-sm font-medium" style="color: {{ $est['accreditation_color'] }};">
                                        <span class="w-2 h-2 rounded-full" style="background-color: {{ $est['accreditation_color'] }};"></span>
                                        {{ $est['accreditation'] }}
                                    </span>
                                </td>
                                <td class="py-3 text-sm text-gray-900 font-medium text-right">{{ number_format($est['arrivals']) }}</td>
                                <td class="py-3 text-sm font-bold text-right" style="color: #2E8B57;">{{ $est['rating'] }}</td>
                                <td class="py-3 text-sm text-right">
                                    <a href="#" class="font-medium transition" style="color: #0F4C81;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">Manage</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
