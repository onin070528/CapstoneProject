@extends('layouts.app')

@section('title', 'Executive Dashboard - PTO Admin - ITOUR Mati')

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
                <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                    <i class="fas fa-th-large text-lg"></i>
                    <span>Executive Dashboard</span>
                    <i class="fas fa-chevron-right ml-auto"></i>
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
                    <h1 class="text-3xl font-bold text-gray-900">Executive Tourism Dashboard</h1>
                    <p class="text-gray-500 mt-1">Province of Davao Oriental · January 2025</p>
                </div>
                <button class="flex items-center gap-2 px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition">
                    <i class="fas fa-download"></i>
                    Export Report
                </button>
            </div>

            <!-- Stat Cards -->
            <div class="grid grid-cols-4 gap-6 px-8 pb-6">
                @foreach($stats as $stat)
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 tracking-wide mb-2">{{ $stat['label'] }}</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stat['value'] }}</p>
                            @if($stat['change'])
                                <p class="text-xs mt-1" style="color: #2E8B57;">{{ $stat['change'] }}</p>
                            @endif
                        </div>
                        <div class="w-10 h-10 rounded-full flex items-center justify-center" style="background-color: {{ $stat['icon_color'] }}15;">
                            <i class="{{ $stat['icon'] }}" style="color: {{ $stat['icon_color'] }};"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Charts Row -->
            <div class="px-8 pb-6 flex gap-6">
                <!-- Tourist Arrival Trend -->
                <div class="flex-1 bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900">Tourist Arrival Trend</h2>
                    <p class="text-sm text-gray-500 mb-4">Domestic vs Foreign · 12 months</p>

                    @php
                        $maxVal = 12000;
                        $chartW = 650;
                        $chartH = 230;
                        $left = 50;
                        $top = 20;
                        $bottom = $top + $chartH;
                        $count = count($arrivalTrend);
                        $xStep = $chartW / ($count - 1);

                        // Build path strings
                        $domesticLine = '';
                        $foreignLine = '';
                        $domesticArea = "M {$left} {$bottom} ";
                        $foreignArea = "M {$left} {$bottom} ";

                        foreach ($arrivalTrend as $i => $d) {
                            $x = $left + ($i * $xStep);
                            $yD = $bottom - ($d['domestic'] / $maxVal * $chartH);
                            $yF = $bottom - ($d['foreign'] / $maxVal * $chartH);
                            $domesticLine .= ($i === 0 ? 'M' : 'L') . " {$x} {$yD} ";
                            $foreignLine .= ($i === 0 ? 'M' : 'L') . " {$x} {$yF} ";
                            $domesticArea .= "L {$x} {$yD} ";
                            $foreignArea .= "L {$x} {$yF} ";
                        }
                        $lastX = $left + (($count - 1) * $xStep);
                        $domesticArea .= "L {$lastX} {$bottom} Z";
                        $foreignArea .= "L {$lastX} {$bottom} Z";
                    @endphp

                    <svg viewBox="0 0 720 300" class="w-full" style="height: 260px;">
                        <!-- Grid lines -->
                        @for($i = 0; $i <= 4; $i++)
                            @php
                                $gy = $bottom - ($i * $chartH / 4);
                                $label = $i * ($maxVal / 4);
                            @endphp
                            <line x1="{{ $left }}" y1="{{ $gy }}" x2="{{ $left + $chartW }}" y2="{{ $gy }}" stroke="#f3f4f6" stroke-width="1" stroke-dasharray="4,4"/>
                            <text x="{{ $left - 5 }}" y="{{ $gy + 4 }}" text-anchor="end" font-size="11" fill="#9ca3af">{{ number_format($label) }}</text>
                        @endfor

                        <!-- Areas -->
                        <path d="{{ $domesticArea }}" fill="#0F4C81" fill-opacity="0.15"/>
                        <path d="{{ $foreignArea }}" fill="#2E8B57" fill-opacity="0.15"/>

                        <!-- Lines -->
                        <path d="{{ $domesticLine }}" fill="none" stroke="#0F4C81" stroke-width="2.5"/>
                        <path d="{{ $foreignLine }}" fill="none" stroke="#2E8B57" stroke-width="2.5"/>

                        <!-- Dots -->
                        @foreach($arrivalTrend as $i => $d)
                            @php
                                $x = $left + ($i * $xStep);
                                $yD = $bottom - ($d['domestic'] / $maxVal * $chartH);
                                $yF = $bottom - ($d['foreign'] / $maxVal * $chartH);
                            @endphp
                            <circle cx="{{ $x }}" cy="{{ $yD }}" r="3" fill="#0F4C81"/>
                            <circle cx="{{ $x }}" cy="{{ $yF }}" r="3" fill="#2E8B57"/>
                        @endforeach

                        <!-- X-axis labels -->
                        @foreach($arrivalTrend as $i => $d)
                            @php $x = $left + ($i * $xStep); @endphp
                            <text x="{{ $x }}" y="{{ $bottom + 20 }}" text-anchor="middle" font-size="11" fill="#9ca3af">{{ $d['month'] }}</text>
                        @endforeach

                        <!-- Legend -->
                        <circle cx="260" cy="290" r="4" fill="#0F4C81"/>
                        <text x="270" y="294" font-size="11" fill="#6b7280">domestic</text>
                        <circle cx="340" cy="290" r="4" fill="#2E8B57"/>
                        <text x="350" y="294" font-size="11" fill="#6b7280">foreign</text>
                    </svg>
                </div>

                <!-- Visit Share by Category -->
                <div class="w-80 bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-6">Visit Share by Category</h2>

                    @php
                        $radius = 70;
                        $circumference = 2 * M_PI * $radius;
                        $cumulativeOffset = 0;
                    @endphp

                    <svg viewBox="0 0 220 220" class="w-full" style="height: 200px;">
                        @foreach($categoryShare as $cat)
                            @php
                                $segLen = ($cat['percentage'] / 100) * $circumference;
                                $offset = -$cumulativeOffset;
                                $cumulativeOffset += $segLen;
                            @endphp
                            <circle cx="110" cy="110" r="{{ $radius }}" fill="none"
                                    stroke="{{ $cat['color'] }}" stroke-width="35"
                                    stroke-dasharray="{{ $segLen }} {{ $circumference }}"
                                    stroke-dashoffset="{{ $offset }}"
                                    transform="rotate(-90 110 110)"/>
                        @endforeach
                    </svg>

                    <!-- Legend -->
                    <div class="flex flex-wrap gap-x-4 gap-y-2 mt-4 justify-center">
                        @foreach($categoryShare as $cat)
                        <div class="flex items-center gap-1.5">
                            <span class="w-3 h-3 rounded-full" style="background-color: {{ $cat['color'] }};"></span>
                            <span class="text-xs text-gray-600">{{ $cat['category'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Destination Performance -->
            <div class="px-8 pb-8">
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900">Destination Performance</h2>
                    <p class="text-sm text-gray-500 mb-6">Monthly visitors and satisfaction rate</p>

                    @php
                        $maxVisitors = 6000;
                        $barW = 50;
                        $gap = 110;
                        $startX = 60;
                        $perfBottom = 220;
                        $perfHeight = 200;
                    @endphp

                    <svg viewBox="0 0 750 280" class="w-full" style="height: 240px;">
                        <!-- Grid lines -->
                        @for($i = 0; $i <= 4; $i++)
                            @php
                                $gy = $perfBottom - ($i * $perfHeight / 4);
                                $label = $i * ($maxVisitors / 4);
                            @endphp
                            <line x1="{{ $startX }}" y1="{{ $gy }}" x2="720" y2="{{ $gy }}" stroke="#f3f4f6" stroke-width="1"/>
                            <text x="{{ $startX - 5 }}" y="{{ $gy + 4 }}" text-anchor="end" font-size="11" fill="#9ca3af">{{ number_format($label) }}</text>
                        @endfor

                        @foreach($destinationPerformance as $i => $dest)
                            @php
                                $x = $startX + ($i * $gap);
                                $barH = ($dest['visitors'] / $maxVisitors) * $perfHeight;
                                $y = $perfBottom - $barH;
                                $satH = ($dest['satisfaction'] / 100) * $perfHeight;
                                $satY = $perfBottom - $satH;
                            @endphp
                            <rect x="{{ $x }}" y="{{ $y }}" width="{{ $barW }}" height="{{ $barH }}" rx="3" fill="#0F4C81"/>
                            <rect x="{{ $x + $barW + 4 }}" y="{{ $satY }}" width="{{ $barW * 0.4 }}" height="{{ $satH }}" rx="3" fill="#F4A261" fill-opacity="0.6"/>
                            <text x="{{ $x + $barW / 2 }}" y="{{ $perfBottom + 18 }}" text-anchor="middle" font-size="10" fill="#9ca3af">{{ $dest['name'] }}</text>
                        @endforeach

                        <!-- Legend -->
                        <rect x="280" y="258" width="12" height="12" rx="2" fill="#0F4C81"/>
                        <text x="296" y="268" font-size="11" fill="#6b7280">Visitors</text>
                        <rect x="360" y="258" width="12" height="12" rx="2" fill="#F4A261" fill-opacity="0.6"/>
                        <text x="376" y="268" font-size="11" fill="#6b7280">Satisfaction</text>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
