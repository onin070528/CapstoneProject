@extends('layouts.app')

@section('title', 'Performance Ranking - PTO Admin - ITOUR Mati')

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
                <a href="/admin/establishments" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-building text-lg"></i>
                    <span>Establishments</span>
                </a>
                <a href="/admin/sentiment-analytics" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-atom text-lg"></i>
                    <span>Sentiment Analytics</span>
                </a>
                <a href="/admin/performance-ranking" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                    <i class="fas fa-ranking-star text-lg"></i>
                    <span>Performance Ranking</span>
                    <i class="fas fa-chevron-right ml-auto"></i>
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
            <div class="px-8 pt-8 pb-4">
                <h1 class="text-3xl font-bold text-gray-900">Tourism Performance Ranking</h1>
                <p class="text-gray-500 mt-1">Top performers by visits and satisfaction</p>
            </div>

            <!-- Highlight Cards -->
            <div class="grid grid-cols-3 gap-6 px-8 pb-6">
                @foreach($highlights as $hl)
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 tracking-wide mb-2">{{ $hl['label'] }}</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $hl['value'] }}</p>
                            @if($hl['change'])
                                <p class="text-xs mt-1" style="color: #2E8B57;">{{ $hl['change'] }}</p>
                            @endif
                        </div>
                        <div class="w-10 h-10 rounded-full flex items-center justify-center" style="background-color: {{ $hl['icon_color'] }}15;">
                            <i class="{{ $hl['icon'] }}" style="color: {{ $hl['icon_color'] }};"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Rankings Row -->
            <div class="px-8 pb-8 flex gap-6">
                <!-- Top Destinations -->
                <div class="flex-1 bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Top Destinations</h2>
                    <div class="space-y-0">
                        @foreach($topDestinations as $dest)
                        <div class="flex items-center gap-4 py-3 border-b border-gray-100 last:border-0">
                            <!-- Rank Badge -->
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold
                                {{ $dest['rank'] <= 3 ? 'text-white' : 'text-gray-500 bg-gray-100' }}"
                                @if($dest['rank'] <= 3) style="background-color: #2E8B57;" @endif>
                                {{ $dest['rank'] }}
                            </div>

                            <!-- Thumbnail -->
                            @php
                                $colors = ['#0F4C81', '#1A6B9C', '#2E8B57', '#3A7D44', '#F4A261', '#5BA4D9'];
                                $thumbColor = $colors[($dest['rank'] - 1) % count($colors)];
                            @endphp
                            <div class="w-12 h-10 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, {{ $thumbColor }}, {{ $thumbColor }}88);">
                                <i class="fas fa-image text-white text-xs opacity-60"></i>
                            </div>

                            <!-- Info -->
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-900">{{ $dest['name'] }}</p>
                                <p class="text-xs text-gray-500">{{ $dest['type'] }} · {{ $dest['municipality'] }}</p>
                            </div>

                            <!-- Stats -->
                            <div class="text-right">
                                <p class="text-sm font-bold text-gray-900">{{ $dest['visits'] }}</p>
                                <p class="text-xs font-medium" style="color: #F4A261;">★ {{ $dest['rating'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Top Establishments -->
                <div class="flex-1 bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Top Establishments</h2>
                    <div class="space-y-0">
                        @foreach($topEstablishments as $est)
                        <div class="flex items-center gap-4 py-3 border-b border-gray-100 last:border-0">
                            <!-- Rank Badge -->
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-sm font-bold
                                {{ $est['rank'] <= 3 ? 'text-white' : 'text-gray-500 bg-gray-100' }}"
                                @if($est['rank'] <= 3) style="background-color: #2E8B57;" @endif>
                                {{ $est['rank'] }}
                            </div>

                            <!-- Info -->
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-900">{{ $est['name'] }}</p>
                                <p class="text-xs text-gray-500">{{ $est['type'] }} · {{ $est['municipality'] }}</p>
                            </div>

                            <!-- Stats -->
                            <div class="text-right">
                                <p class="text-sm font-bold text-gray-900">{{ $est['visits'] }}</p>
                                <p class="text-xs font-medium" style="color: #F4A261;">★ {{ $est['rating'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
