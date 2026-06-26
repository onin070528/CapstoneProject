@extends('layouts.app')

@section('title', 'Guest Feedback - Establishment Console - ITOUR Mati')

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
                <a href="/establishment/monthly-reports" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-chart-bar text-lg"></i>
                    <span>Monthly Reports</span>
                </a>
                <a href="/establishment/guest-feedback" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                    <i class="fas fa-comment-dots text-lg"></i>
                    <span>Guest Feedback</span>
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
            <!-- Page Title -->
            <div class="px-8 pt-8 pb-4">
                <h1 class="text-3xl font-bold text-gray-900">Guest Feedback</h1>
                <p class="text-gray-500 mt-1">Reviews and sentiment specific to your establishment</p>
            </div>

            <!-- Stat Cards -->
            <div class="grid grid-cols-4 gap-6 px-8 pb-6">
                @foreach($feedbackStats as $stat)
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-semibold text-gray-500 tracking-wide mb-2">{{ $stat['label'] }}</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $stat['value'] }}</p>
                            @if($stat['change'])
                                <p class="text-xs mt-1" style="color: {{ $stat['change_color'] ?? '#2E8B57' }};">{{ $stat['change'] }}</p>
                            @endif
                        </div>
                        <div class="w-10 h-10 rounded-full flex items-center justify-center" style="background-color: {{ $stat['icon_color'] }}15;">
                            <i class="{{ $stat['icon'] }}" style="color: {{ $stat['icon_color'] }};"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Sentiment Trend Chart -->
            <div class="px-8 pb-6">
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-1">Sentiment Trend</h2>
                    <p class="text-sm text-gray-500 mb-6">6-month rolling sentiment polarity</p>

                    <svg viewBox="0 0 800 300" class="w-full" style="height: 260px;">
                        <!-- Grid lines -->
                        <line x1="40" y1="20" x2="760" y2="20" stroke="#f3f4f6" stroke-width="1"/>
                        <line x1="40" y1="80" x2="760" y2="80" stroke="#f3f4f6" stroke-width="1"/>
                        <line x1="40" y1="140" x2="760" y2="140" stroke="#f3f4f6" stroke-width="1"/>
                        <line x1="40" y1="200" x2="760" y2="200" stroke="#f3f4f6" stroke-width="1"/>
                        <line x1="40" y1="260" x2="760" y2="260" stroke="#f3f4f6" stroke-width="1"/>

                        <!-- Y-axis labels -->
                        <text x="35" y="24" text-anchor="end" font-size="11" fill="#9ca3af">100</text>
                        <text x="35" y="84" text-anchor="end" font-size="11" fill="#9ca3af">75</text>
                        <text x="35" y="144" text-anchor="end" font-size="11" fill="#9ca3af">50</text>
                        <text x="35" y="204" text-anchor="end" font-size="11" fill="#9ca3af">25</text>
                        <text x="35" y="264" text-anchor="end" font-size="11" fill="#9ca3af">0</text>

                        <!-- Positive line (green) - hovering around 70-80 -->
                        <polyline points="50,80 170,78 290,76 410,74 530,72 650,70 760,68"
                                stroke="#2E8B57" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        <!-- Positive dots -->
                        <circle cx="50" cy="80" r="4" fill="#2E8B57"/>
                        <circle cx="170" cy="78" r="4" fill="#2E8B57"/>
                        <circle cx="290" cy="76" r="4" fill="#2E8B57"/>
                        <circle cx="410" cy="74" r="4" fill="#2E8B57"/>
                        <circle cx="530" cy="72" r="4" fill="#2E8B57"/>
                        <circle cx="650" cy="70" r="4" fill="#2E8B57"/>
                        <circle cx="760" cy="68" r="4" fill="#2E8B57"/>

                        <!-- Neutral line (gray) - hovering around 15-20 -->
                        <polyline points="50,210 170,205 290,200 410,195 530,192 650,190 760,188"
                                stroke="#9ca3af" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        <!-- Neutral dots -->
                        <circle cx="50" cy="210" r="4" fill="#9ca3af"/>
                        <circle cx="170" cy="205" r="4" fill="#9ca3af"/>
                        <circle cx="290" cy="200" r="4" fill="#9ca3af"/>
                        <circle cx="410" cy="195" r="4" fill="#9ca3af"/>
                        <circle cx="530" cy="192" r="4" fill="#9ca3af"/>
                        <circle cx="650" cy="190" r="4" fill="#9ca3af"/>
                        <circle cx="760" cy="188" r="4" fill="#9ca3af"/>

                        <!-- Negative line (red) - hovering around 5-10 -->
                        <polyline points="50,248 170,246 290,245 410,244 530,242 650,244 760,243"
                                stroke="#DC2626" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        <!-- Negative dots -->
                        <circle cx="50" cy="248" r="4" fill="#DC2626"/>
                        <circle cx="170" cy="246" r="4" fill="#DC2626"/>
                        <circle cx="290" cy="245" r="4" fill="#DC2626"/>
                        <circle cx="410" cy="244" r="4" fill="#DC2626"/>
                        <circle cx="530" cy="242" r="4" fill="#DC2626"/>
                        <circle cx="650" cy="244" r="4" fill="#DC2626"/>
                        <circle cx="760" cy="243" r="4" fill="#DC2626"/>

                        <!-- X-axis labels -->
                        <text x="50" y="280" text-anchor="middle" font-size="11" fill="#9ca3af">Jul</text>
                        <text x="170" y="280" text-anchor="middle" font-size="11" fill="#9ca3af">Aug</text>
                        <text x="290" y="280" text-anchor="middle" font-size="11" fill="#9ca3af">Sep</text>
                        <text x="410" y="280" text-anchor="middle" font-size="11" fill="#9ca3af">Oct</text>
                        <text x="530" y="280" text-anchor="middle" font-size="11" fill="#9ca3af">Nov</text>
                        <text x="650" y="280" text-anchor="middle" font-size="11" fill="#9ca3af">Dec</text>
                    </svg>

                    <!-- Legend -->
                    <div class="flex items-center justify-center gap-6 mt-2">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full" style="background-color: #2E8B57;"></span>
                            <span class="text-xs text-gray-500">positive</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full" style="background-color: #9ca3af;"></span>
                            <span class="text-xs text-gray-500">neutral</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full" style="background-color: #DC2626;"></span>
                            <span class="text-xs text-gray-500">negative</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Reviews -->
            <div class="px-8 pb-8">
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Recent Reviews</h2>

                    <div class="space-y-6">
                        @foreach($recentReviews as $review)
                        <div class="border-b border-gray-100 pb-5 last:border-0 last:pb-0">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <span class="font-semibold text-gray-900">{{ $review['name'] }}</span>
                                    <span class="text-sm text-gray-400 ml-2">{{ $review['date'] }} · {{ $review['location'] }}</span>
                                </div>
                                <div class="text-right">
                                    <span class="flex items-center gap-1 text-sm font-medium" style="color: {{ $review['sentiment'] === 'Positive' ? '#2E8B57' : ($review['sentiment'] === 'Negative' ? '#DC2626' : '#F4A261') }};">
                                        <span class="w-2 h-2 rounded-full" style="background-color: {{ $review['sentiment'] === 'Positive' ? '#2E8B57' : ($review['sentiment'] === 'Negative' ? '#DC2626' : '#F4A261') }};"></span>
                                        {{ $review['sentiment'] }}
                                    </span>
                                    <p class="text-xs text-gray-400 mt-1">polarity {{ $review['polarity'] }}</p>
                                </div>
                            </div>
                            <!-- Star Rating -->
                            <div class="flex items-center gap-0.5 mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review['rating'])
                                        <i class="fas fa-star text-sm" style="color: #F4A261;"></i>
                                    @else
                                        <i class="fas fa-star text-sm text-gray-300"></i>
                                    @endif
                                @endfor
                            </div>
                            <p class="text-sm text-gray-600">{{ $review['comment'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
