@extends('layouts.app')

@section('title', 'Sentiment Analytics - PTO Admin - ITOUR Mati')

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
                <a href="/admin/sentiment-analytics" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                    <i class="fas fa-atom text-lg"></i>
                    <span>Sentiment Analytics</span>
                    <i class="fas fa-chevron-right ml-auto"></i>
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
                <h1 class="text-3xl font-bold text-gray-900">Tourist Experience Analytics</h1>
                <p class="text-gray-500 mt-1">Lexicon-based sentiment analysis with polarity scoring</p>
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
                                <p class="text-xs mt-1" style="color: {{ str_contains($stat['change'], '↓') ? '#DC2626' : '#2E8B57' }};">{{ $stat['change'] }}</p>
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
                <!-- Sentiment Over Time -->
                <div class="flex-1 bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-6">Sentiment Over Time</h2>

                    @php
                        $maxVal = 100;
                        $chartW = 650;
                        $chartH = 230;
                        $left = 50;
                        $top = 20;
                        $bottom = $top + $chartH;
                        $count = count($sentimentTrend);
                        $xStep = $chartW / ($count - 1);

                        // Build stacked area paths (bottom to top: positive, then positive+neutral, then all)
                        $positiveLine = '';
                        $neutralTopLine = '';
                        $negativeTopLine = '';

                        $positiveAreaUp = '';
                        $neutralAreaUp = '';
                        $negativeAreaUp = '';

                        foreach ($sentimentTrend as $i => $d) {
                            $x = $left + ($i * $xStep);
                            $yPos = $bottom - ($d['positive'] / $maxVal * $chartH);
                            $yNeuTop = $bottom - (($d['positive'] + $d['neutral']) / $maxVal * $chartH);
                            $yNegTop = $bottom - (($d['positive'] + $d['neutral'] + $d['negative']) / $maxVal * $chartH);

                            $positiveLine .= ($i === 0 ? 'M' : 'L') . " {$x} {$yPos} ";
                            $neutralTopLine .= ($i === 0 ? 'M' : 'L') . " {$x} {$yNeuTop} ";
                            $negativeTopLine .= ($i === 0 ? 'M' : 'L') . " {$x} {$yNegTop} ";

                            $positiveAreaUp .= "L {$x} {$yPos} ";
                            $neutralAreaUp .= "L {$x} {$yNeuTop} ";
                            $negativeAreaUp .= "L {$x} {$yNegTop} ";
                        }

                        $firstX = $left;
                        $lastX = $left + (($count - 1) * $xStep);

                        // Positive area: bottom → positive line → back
                        $positiveArea = "M {$firstX} {$bottom} {$positiveAreaUp} L {$lastX} {$bottom} Z";

                        // Neutral area: positive line → neutral top line → back along positive line reversed
                        $neutralAreaDown = '';
                        for ($i = $count - 1; $i >= 0; $i--) {
                            $x = $left + ($i * $xStep);
                            $yPos = $bottom - ($sentimentTrend[$i]['positive'] / $maxVal * $chartH);
                            $neutralAreaDown .= "L {$x} {$yPos} ";
                        }
                        $firstYNeuTop = $bottom - (($sentimentTrend[0]['positive'] + $sentimentTrend[0]['neutral']) / $maxVal * $chartH);
                        $neutralArea = "M {$firstX} {$firstYNeuTop} {$neutralAreaUp} {$neutralAreaDown} Z";

                        // Negative area: neutral top line → negative top line → back along neutral reversed
                        $negativeAreaDown = '';
                        for ($i = $count - 1; $i >= 0; $i--) {
                            $x = $left + ($i * $xStep);
                            $yNeuTop = $bottom - (($sentimentTrend[$i]['positive'] + $sentimentTrend[$i]['neutral']) / $maxVal * $chartH);
                            $negativeAreaDown .= "L {$x} {$yNeuTop} ";
                        }
                        $firstYNegTop = $bottom - (($sentimentTrend[0]['positive'] + $sentimentTrend[0]['neutral'] + $sentimentTrend[0]['negative']) / $maxVal * $chartH);
                        $negativeArea = "M {$firstX} {$firstYNegTop} {$negativeAreaUp} {$negativeAreaDown} Z";
                    @endphp

                    <svg viewBox="0 0 720 300" class="w-full" style="height: 260px;">
                        <!-- Grid lines -->
                        @for($i = 0; $i <= 4; $i++)
                            @php
                                $gy = $bottom - ($i * $chartH / 4);
                                $label = $i * 25;
                            @endphp
                            <line x1="{{ $left }}" y1="{{ $gy }}" x2="{{ $left + $chartW }}" y2="{{ $gy }}" stroke="#f3f4f6" stroke-width="1" stroke-dasharray="4,4"/>
                            <text x="{{ $left - 5 }}" y="{{ $gy + 4 }}" text-anchor="end" font-size="11" fill="#9ca3af">{{ $label }}</text>
                        @endfor

                        <!-- Stacked areas -->
                        <path d="{{ $negativeArea }}" fill="#DC2626" fill-opacity="0.4"/>
                        <path d="{{ $neutralArea }}" fill="#9CA3AF" fill-opacity="0.35"/>
                        <path d="{{ $positiveArea }}" fill="#2E8B57" fill-opacity="0.4"/>

                        <!-- Lines -->
                        <path d="{{ $negativeTopLine }}" fill="none" stroke="#DC2626" stroke-width="2"/>
                        <path d="{{ $neutralTopLine }}" fill="none" stroke="#9CA3AF" stroke-width="2"/>
                        <path d="{{ $positiveLine }}" fill="none" stroke="#2E8B57" stroke-width="2"/>

                        <!-- X-axis labels -->
                        @foreach($sentimentTrend as $i => $d)
                            @php $x = $left + ($i * $xStep); @endphp
                            <text x="{{ $x }}" y="{{ $bottom + 20 }}" text-anchor="middle" font-size="11" fill="#9ca3af">{{ $d['month'] }}</text>
                        @endforeach

                        <!-- Legend -->
                        <circle cx="230" cy="290" r="4" fill="#2E8B57"/>
                        <text x="240" y="294" font-size="11" fill="#6b7280">positive</text>
                        <circle cx="310" cy="290" r="4" fill="#9CA3AF"/>
                        <text x="320" y="294" font-size="11" fill="#6b7280">neutral</text>
                        <circle cx="385" cy="290" r="4" fill="#DC2626"/>
                        <text x="395" y="294" font-size="11" fill="#6b7280">negative</text>
                    </svg>
                </div>

                <!-- Top Service Themes -->
                <div class="w-80 bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Top Service Themes</h2>
                    <div class="space-y-4">
                        @foreach($serviceThemes as $theme)
                        <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-0">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $theme['theme'] }}</p>
                                <p class="text-xs text-gray-500">{{ $theme['mentions'] }} mentions</p>
                            </div>
                            <span class="flex items-center gap-1.5 text-xs font-medium" style="color: {{ $theme['color'] }};">
                                <span class="w-2 h-2 rounded-full" style="background-color: {{ $theme['color'] }};"></span>
                                {{ $theme['sentiment'] }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Per-Destination Sentiment Breakdown -->
            <div class="px-8 pb-8">
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-6">Per-Destination Sentiment Breakdown</h2>

                    @php
                        $destCount = count($destinationSentiment);
                        $destBarW = 60;
                        $destGap = 120;
                        $destStartX = 80;
                        $destBottom = 220;
                        $destH = 180;
                        $destMax = 100;
                    @endphp

                    <svg viewBox="0 0 820 280" class="w-full" style="height: 240px;">
                        <!-- Grid lines -->
                        @for($i = 0; $i <= 4; $i++)
                            @php
                                $gy = $destBottom - ($i * $destH / 4);
                                $label = $i * 25;
                            @endphp
                            <line x1="{{ $destStartX }}" y1="{{ $gy }}" x2="780" y2="{{ $gy }}" stroke="#f3f4f6" stroke-width="1"/>
                            <text x="{{ $destStartX - 5 }}" y="{{ $gy + 4 }}" text-anchor="end" font-size="11" fill="#9ca3af">{{ $label }}%</text>
                        @endfor

                        @foreach($destinationSentiment as $i => $dest)
                            @php
                                $x = $destStartX + ($i * $destGap);
                                $total = $dest['positive'] + $dest['neutral'] + $dest['negative'];

                                // Positive (bottom)
                                $posH = ($dest['positive'] / $destMax) * $destH;
                                $posY = $destBottom - $posH;

                                // Neutral (middle)
                                $neuH = ($dest['neutral'] / $destMax) * $destH;
                                $neuY = $posY - $neuH;

                                // Negative (top)
                                $negH = ($dest['negative'] / $destMax) * $destH;
                                $negY = $neuY - $negH;
                            @endphp
                            <rect x="{{ $x }}" y="{{ $posY }}" width="{{ $destBarW }}" height="{{ $posH }}" fill="#2E8B57"/>
                            <rect x="{{ $x }}" y="{{ $neuY }}" width="{{ $destBarW }}" height="{{ $neuH }}" fill="#9CA3AF" fill-opacity="0.5"/>
                            <rect x="{{ $x }}" y="{{ $negY }}" width="{{ $destBarW }}" height="{{ $negH }}" rx="3" fill="#DC2626"/>
                            <text x="{{ $x + $destBarW / 2 }}" y="{{ $destBottom + 18 }}" text-anchor="middle" font-size="10" fill="#9ca3af">{{ $dest['name'] }}</text>
                        @endforeach

                        <!-- Legend -->
                        <rect x="280" y="258" width="12" height="12" rx="2" fill="#2E8B57"/>
                        <text x="296" y="268" font-size="11" fill="#6b7280">Positive</text>
                        <rect x="360" y="258" width="12" height="12" rx="2" fill="#9CA3AF" fill-opacity="0.5"/>
                        <text x="376" y="268" font-size="11" fill="#6b7280">Neutral</text>
                        <rect x="440" y="258" width="12" height="12" rx="2" fill="#DC2626"/>
                        <text x="456" y="268" font-size="11" fill="#6b7280">Negative</text>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
