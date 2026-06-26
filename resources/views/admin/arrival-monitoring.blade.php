@extends('layouts.app')

@section('title', 'Arrival Monitoring - PTO Admin - ITOUR Mati')

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
                <a href="/admin/arrival-monitoring" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                    <i class="fas fa-chart-line text-lg"></i>
                    <span>Arrival Monitoring</span>
                    <i class="fas fa-chevron-right ml-auto"></i>
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
            <div class="px-8 pt-8 pb-4">
                <h1 class="text-3xl font-bold text-gray-900">Tourist Arrival Monitoring</h1>
                <p class="text-gray-500 mt-1">Real-time arrivals across all accredited establishments</p>
            </div>

            <!-- Stat Cards -->
            <div class="grid grid-cols-4 gap-6 px-8 pb-6">
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

            <!-- Monthly Arrivals by Origin Chart -->
            <div class="px-8 pb-6">
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-6">Monthly arrivals by origin</h2>

                    @php
                        $maxVal = 14000;
                        $chartW = 830;
                        $chartH = 260;
                        $left = 50;
                        $top = 20;
                        $chartBottom = $top + $chartH;
                        $barCount = count($monthlyArrivals);
                        $barGroupW = $chartW / $barCount;
                        $barW = $barGroupW * 0.6;
                        $barGap = $barGroupW * 0.2;
                    @endphp

                    <svg viewBox="0 0 900 340" class="w-full" style="height: 300px;">
                        <!-- Grid lines -->
                        @for($i = 0; $i <= 4; $i++)
                            @php
                                $gy = $chartBottom - ($i * $chartH / 4);
                                $label = $i * ($maxVal / 4);
                            @endphp
                            <line x1="{{ $left }}" y1="{{ $gy }}" x2="{{ $left + $chartW }}" y2="{{ $gy }}" stroke="#f3f4f6" stroke-width="1" stroke-dasharray="4,4"/>
                            <text x="{{ $left - 5 }}" y="{{ $gy + 4 }}" text-anchor="end" font-size="11" fill="#9ca3af">{{ number_format($label) }}</text>
                        @endfor

                        <!-- Stacked Bars -->
                        @foreach($monthlyArrivals as $i => $month)
                            @php
                                $x = $left + $barGap + ($i * $barGroupW);
                                $total = $month['domestic'] + $month['foreign'];

                                // Domestic (bottom)
                                $domH = ($month['domestic'] / $maxVal) * $chartH;
                                $domY = $chartBottom - $domH;

                                // Foreign (top, stacked)
                                $forH = ($month['foreign'] / $maxVal) * $chartH;
                                $forY = $domY - $forH;
                            @endphp
                            <rect x="{{ $x }}" y="{{ $domY }}" width="{{ $barW }}" height="{{ $domH }}" rx="0" fill="#0F4C81"/>
                            <rect x="{{ $x }}" y="{{ $forY }}" width="{{ $barW }}" height="{{ $forH }}" rx="3" fill="#F4A261"/>
                            <text x="{{ $x + $barW / 2 }}" y="{{ $chartBottom + 18 }}" text-anchor="middle" font-size="11" fill="#9ca3af">{{ $month['month'] }}</text>
                        @endforeach

                        <!-- Legend -->
                        <rect x="360" y="318" width="14" height="14" rx="2" fill="#0F4C81"/>
                        <text x="380" y="330" font-size="12" fill="#0F4C81" font-weight="500">domestic</text>
                        <rect x="460" y="318" width="14" height="14" rx="2" fill="#F4A261"/>
                        <text x="480" y="330" font-size="12" fill="#F4A261" font-weight="500">foreign</text>
                    </svg>
                </div>
            </div>

            <!-- Establishment Contributions Table -->
            <div class="px-8 pb-8">
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Establishment contributions (MTD)</h2>
                    <table class="w-full">
                        <thead>
                            <tr class="text-left">
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">ESTABLISHMENT</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">TYPE</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3">MUNICIPALITY</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3 text-right">ARRIVALS MTD</th>
                                <th class="text-xs font-semibold text-gray-500 tracking-wide pb-3 text-right">SHARE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contributions as $contrib)
                            <tr class="border-t border-gray-100">
                                <td class="py-3 text-sm font-medium text-gray-900">{{ $contrib['name'] }}</td>
                                <td class="py-3 text-sm text-gray-500">{{ $contrib['type'] }}</td>
                                <td class="py-3 text-sm text-gray-500">{{ $contrib['municipality'] }}</td>
                                <td class="py-3 text-sm text-gray-900 font-bold text-right">
                                    <div class="flex items-center justify-end gap-3">
                                        <span>{{ number_format($contrib['arrivals']) }}</span>
                                        <div class="w-24 h-2 bg-gray-100 rounded-full overflow-hidden">
                                            <div class="h-full rounded-full" style="width: {{ $contrib['share'] * 4 }}%; background-color: #0F4C81;"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 text-sm text-gray-500 text-right">{{ $contrib['share'] }}%</td>
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
