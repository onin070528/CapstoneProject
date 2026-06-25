@extends('layouts.app')

@section('title', 'ITOUR Mati - Tourism Intelligence')

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
                <p class="text-xs font-bold text-blue-300 px-6 mb-4">TOURIST PORTAL</p>
                <nav class="space-y-2 px-4">
                    <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                        <i class="fas fa-compass text-lg"></i>
                        <span>Discover</span>
                        <i class="fas fa-chevron-right ml-auto"></i>
                    </a>
                    <a href="/destinations" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                        <i class="fas fa-map-pin text-lg"></i>
                        <span>Destinations</span>
                    </a>
                    <a href="/map-directory" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                        <i class="fas fa-map text-lg"></i>
                        <span>Map & Directory</span>
                    </a>
                    <a href="/plan-trip" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                        <i class="fas fa-calendar text-lg"></i>
                        <span>Plan a Trip</span>
                    </a>
                    <a href="/feedback" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                        <i class="fas fa-comment text-lg"></i>
                        <span>Share Feedback</span>
                    </a>
                </nav>
            </div>

            <!-- Switch Role -->
            <div class="border-t p-6" style="border-color: #0A3A62;">
                <p class="text-xs font-bold text-blue-300 mb-4">SWITCH ROLE</p>
                <button class="w-full text-blue-900 font-bold py-2 px-4 rounded-lg mb-2 transition" style="background-color: #F4A261;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    Public Tourist
                </button>
                <button class="w-full text-white py-2 px-4 rounded-lg mb-2 transition text-sm" style="background-color: #0A3A62;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    Establishment
                </button>
                <button class="w-full text-white py-2 px-4 rounded-lg transition text-sm" style="background-color: #0A3A62;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
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
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none" style="border-color: #0F4C81;" onblur="this.style.borderColor='#d1d5db'" onfocus="this.style.borderColor='#0F4C81'">
                    </div>
                </div>
                <div class="flex items-center gap-6 ml-8">
                    <button class="text-gray-600 text-xl relative">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">1</span>
                    </button>
                    <div class="flex items-center gap-3">
                        <div class="bg-blue-900 text-white rounded-full w-10 h-10 flex items-center justify-center font-bold">GV</div>
                        <div>
                            <p class="text-sm font-semibold">Guest Visitor</p>
                            <p class="text-xs text-gray-500">Tourist Portal</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="flex-1 overflow-y-auto">
                <!-- Hero Section -->
                <div class="mx-8 mt-8 rounded-2xl p-12 text-white" style="background: linear-gradient(to right, #0F4C81, #0A3A62);">
                    <div class="flex items-center gap-2 mb-6">
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm" style="background-color: #0A3A62;">
                            <i class="fas fa-map-pin" style="color: #F4A261;"></i>
                            Provincial Tourism Office - Mati, Davao Oriental
                        </span>
                    </div>

                    <h1 class="text-5xl font-bold mb-4 leading-tight">Discover Mati — the City of Sun, Sand, and Mountains.</h1>
                    <p class="text-lg text-blue-100 mb-8 max-w-2xl">Plan your visit, find nearby services, and help shape a smarter tourism experience for the Pearl of the Pacific.</p>

                    <div class="flex gap-3 mb-8">
                        <div class="flex-1 max-w-lg relative">
                            <i class="fas fa-search absolute left-4 top-3.5 text-gray-400"></i>
                            <input type="text" placeholder="Search destinations, beaches, food..."
                                   class="w-full pl-12 pr-4 py-3 rounded-lg text-gray-800 focus:outline-none" style="box-shadow: 0 0 0 3px #F4A261 inset;"  onblur="this.style.boxShadow='none'" onfocus="this.style.boxShadow='0 0 0 3px #F4A261 inset'">
                        </div>
                        <button class="text-white px-8 py-3 rounded-lg font-semibold transition flex items-center gap-2" style="background-color: #0F4C81;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='#0F4C81'">
                            Search <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <div class="flex gap-3">
                        @foreach($categories as $category)
                            <span class="px-4 py-2 rounded-full text-sm cursor-pointer transition" style="background-color: #0A3A62;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
                                {{ $category['name'] }}
                                <span class="ml-2 text-xs" style="color: #2E8B57;">● {{ $category['status'] }}</span>
                            </span>
                        @endforeach
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="grid grid-cols-4 gap-6 mx-8 my-8">
                    @foreach($stats as $stat)
                        <div class="bg-white rounded-lg p-6 border border-gray-200">
                            <p class="text-gray-500 text-sm font-semibold mb-2">{{ $stat['label'] }}</p>
                            <p class="text-4xl font-bold text-gray-900 mb-4" style="color: {{ $stat['color'] }};">{{ $stat['value'] }}</p>
                            @if(isset($stat['change']))
                                <p class="text-xs text-green-500 mb-2" style="color: #2E8B57;">{{ $stat['change'] }}</p>
                            @endif
                            <i class="{{ $stat['icon'] }} text-2xl" style="color: {{ $stat['color'] }};"></i>
                        </div>
                    @endforeach
                </div>

                <!-- Featured Destinations -->
                <div class="mx-8 mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Featured Destinations</h2>
                            <p class="text-gray-500 text-sm">Most loved by recent visitors</p>
                        </div>
                        <a href="/destinations" class="text-blue-600 font-semibold flex items-center gap-2 hover:text-blue-800">
                            Browse all <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <div class="grid grid-cols-3 gap-6">
                        @foreach($destinations as $destination)
                            <div class="bg-white rounded-lg overflow-hidden border border-gray-200 hover:shadow-lg transition">
                                <div class="relative h-48 bg-gradient-to-br {{ $destination['color'] }} overflow-hidden">
                                    <div class="w-full h-full flex items-center justify-center text-white">
                                        <i class="fas fa-image text-4xl text-white/30"></i>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <p class="text-xs text-gray-500 mb-1">{{ $destination['type'] }} · {{ $destination['location'] }}</p>
                                    <h3 class="font-bold text-lg text-gray-900 mb-3">{{ $destination['name'] }}</h3>
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold flex items-center gap-1" style="color: #2E8B57;">
                                            <i class="fas fa-star"></i> {{ $destination['rating'] }}
                                        </span>
                                        <span class="text-gray-500 text-sm">{{ number_format($destination['reviews']) }} reviews</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Visitor Activity Chart -->
                <div class="mx-8 mb-12">
                    <div class="bg-white rounded-lg border border-gray-200 p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">Visitor Activity</h2>
                        <p class="text-gray-500 text-sm mb-8">12-month arrivals across Mati</p>

                        <svg viewBox="0 0 1200 300" class="w-full h-64">
                            <!-- Grid lines -->
                            <line x1="60" y1="250" x2="1150" y2="250" stroke="#e5e7eb" stroke-width="1"/>
                            <line x1="60" y1="200" x2="1150" y2="200" stroke="#e5e7eb" stroke-width="1"/>
                            <line x1="60" y1="150" x2="1150" y2="150" stroke="#e5e7eb" stroke-width="1"/>
                            <line x1="60" y1="100" x2="1150" y2="100" stroke="#e5e7eb" stroke-width="1"/>
                            <line x1="60" y1="50" x2="1150" y2="50" stroke="#e5e7eb" stroke-width="1"/>

                            <!-- Y-axis labels -->
                            <text x="40" y="255" text-anchor="end" font-size="12" fill="#9ca3af">0</text>
                            <text x="40" y="205" text-anchor="end" font-size="12" fill="#9ca3af">3000</text>
                            <text x="40" y="155" text-anchor="end" font-size="12" fill="#9ca3af">6000</text>
                            <text x="40" y="105" text-anchor="end" font-size="12" fill="#9ca3af">9000</text>
                            <text x="40" y="55" text-anchor="end" font-size="12" fill="#9ca3af">12000</text>

                            <!-- Chart area background -->
                            <defs>
                                <linearGradient id="gradient1" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" style="stop-color:#0F4C81;stop-opacity:0.6" />
                                    <stop offset="100%" style="stop-color:#0F4C81;stop-opacity:0.1" />
                                </linearGradient>
                                <linearGradient id="gradient2" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" style="stop-color:#2E8B57;stop-opacity:0.6" />
                                    <stop offset="100%" style="stop-color:#2E8B57;stop-opacity:0.1" />
                                </linearGradient>
                            </defs>

                            <!-- First line area (Blue) -->
                            <polygon points="60,210 150,200 240,195 330,180 420,170 510,160 600,170 690,165 780,160 870,150 960,130 1050,100 1150,50 1150,250 60,250" fill="url(#gradient1)"/>

                            <!-- Second line area (Green) -->
                            <polygon points="60,235 150,230 240,225 330,220 420,215 510,210 600,215 690,213 780,210 870,205 960,200 1050,195 1150,185 1150,250 60,250" fill="url(#gradient2)"/>

                            <!-- First line -->
                            <polyline points="60,210 150,200 240,195 330,180 420,170 510,160 600,170 690,165 780,160 870,150 960,130 1050,100 1150,50"
                                    stroke="#0F4C81" stroke-width="2" fill="none"/>

                            <!-- Second line -->
                            <polyline points="60,235 150,230 240,225 330,220 420,215 510,210 600,215 690,213 780,210 870,205 960,200 1050,195 1150,185"
                                    stroke="#2E8B57" stroke-width="2" fill="none"/>

                            <!-- X-axis -->
                            <line x1="60" y1="250" x2="1150" y2="250" stroke="#d1d5db" stroke-width="2"/>
                            <!-- Y-axis -->
                            <line x1="60" y1="50" x2="60" y2="250" stroke="#d1d5db" stroke-width="2"/>

                            <!-- X-axis labels -->
                            <text x="60" y="275" text-anchor="middle" font-size="12" fill="#9ca3af">Jan</text>
                            <text x="150" y="275" text-anchor="middle" font-size="12" fill="#9ca3af">Feb</text>
                            <text x="240" y="275" text-anchor="middle" font-size="12" fill="#9ca3af">Mar</text>
                            <text x="330" y="275" text-anchor="middle" font-size="12" fill="#9ca3af">Apr</text>
                            <text x="420" y="275" text-anchor="middle" font-size="12" fill="#9ca3af">May</text>
                            <text x="510" y="275" text-anchor="middle" font-size="12" fill="#9ca3af">Jun</text>
                            <text x="600" y="275" text-anchor="middle" font-size="12" fill="#9ca3af">Jul</text>
                            <text x="690" y="275" text-anchor="middle" font-size="12" fill="#9ca3af">Aug</text>
                            <text x="780" y="275" text-anchor="middle" font-size="12" fill="#9ca3af">Sep</text>
                            <text x="870" y="275" text-anchor="middle" font-size="12" fill="#9ca3af">Oct</text>
                            <text x="960" y="275" text-anchor="middle" font-size="12" fill="#9ca3af">Nov</text>
                            <text x="1050" y="275" text-anchor="middle" font-size="12" fill="#9ca3af">Dec</text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
