@extends('layouts.app')

@section('title', 'Record Arrivals - Establishment Console - ITOUR Mati')

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
                <a href="/establishment/record-arrivals" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                    <i class="fas fa-clipboard-list text-lg"></i>
                    <span>Record Arrivals</span>
                    <i class="fas fa-chevron-right ml-auto"></i>
                </a>
                <a href="/establishment/monthly-reports" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-chart-bar text-lg"></i>
                    <span>Monthly Reports</span>
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
                    <h1 class="text-3xl font-bold text-gray-900">Record Tourist Arrivals</h1>
                    <p class="text-gray-500 mt-1">Digital encoding · Today: January 13, 2025</p>
                </div>
                <button class="flex items-center gap-2 text-white px-6 py-3 rounded-lg font-semibold transition" style="background-color: #0F4C81;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='#0F4C81'">
                    <i class="fas fa-save"></i>
                    Submit Daily Log
                </button>
            </div>

            <!-- Stat Cards -->
            <div class="grid grid-cols-3 gap-6 px-8 pb-6">
                @foreach($todayStats as $stat)
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

            <!-- New Entry Form -->
            <div class="px-8 pb-6">
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">New entry</h2>
                    <div class="flex gap-4 items-end">
                        <div class="flex-1">
                            <input type="date" value="2025-01-13" class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:outline-none" style="border-color: #d1d5db;" onfocus="this.style.borderColor='#0F4C81'" onblur="this.style.borderColor='#d1d5db'">
                        </div>
                        <div class="flex-1">
                            <input type="text" placeholder="Guest name" class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:outline-none" style="border-color: #d1d5db;" onfocus="this.style.borderColor='#0F4C81'" onblur="this.style.borderColor='#d1d5db'">
                        </div>
                        <div class="flex-1">
                            <input type="text" placeholder="Origin" class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:outline-none" style="border-color: #d1d5db;" onfocus="this.style.borderColor='#0F4C81'" onblur="this.style.borderColor='#d1d5db'">
                        </div>
                        <div class="flex-1">
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:outline-none bg-white" style="border-color: #d1d5db;" onfocus="this.style.borderColor='#0F4C81'" onblur="this.style.borderColor='#d1d5db'">
                                <option>Domestic</option>
                                <option>Foreign</option>
                            </select>
                        </div>
                        <button class="flex items-center gap-2 text-white px-8 py-3 rounded-lg font-semibold transition whitespace-nowrap" style="background-color: #0F4C81;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='#0F4C81'">
                            <i class="fas fa-plus"></i>
                            Add
                        </button>
                    </div>
                </div>
            </div>

            <!-- Today's Encoded Arrivals Table -->
            <div class="px-8 pb-8">
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-1">Today's encoded arrivals</h2>
                    <p class="text-sm text-gray-500 mb-4">{{ count($todayArrivals) }} entries</p>
                    <table class="w-full">
                        <thead>
                            <tr class="text-left">
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">DATE</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">GUEST</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">ORIGIN</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">TYPE</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">PARTY</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">PURPOSE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todayArrivals as $arrival)
                            <tr class="border-t border-gray-100">
                                <td class="py-3 text-sm font-mono text-gray-700">{{ $arrival['date'] }}</td>
                                <td class="py-3 text-sm text-gray-900 font-medium">{{ $arrival['guest'] }}</td>
                                <td class="py-3 text-sm text-gray-700">{{ $arrival['origin'] }}</td>
                                <td class="py-3 text-sm text-gray-700">{{ $arrival['type'] }}</td>
                                <td class="py-3 text-sm text-gray-900 font-medium text-center">{{ $arrival['party'] }}</td>
                                <td class="py-3 text-sm text-gray-700">{{ $arrival['purpose'] }}</td>
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
