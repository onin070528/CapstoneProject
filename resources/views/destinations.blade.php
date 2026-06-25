@extends('layouts.app')

@section('title', 'Explore Destinations - ITOUR Mati')

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
                <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-compass text-lg"></i>
                    <span>Discover</span>
                </a>
                <a href="/destinations" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                    <i class="fas fa-map-pin text-lg"></i>
                    <span>Destinations</span>
                    <i class="fas fa-chevron-right ml-auto"></i>
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
                    <div class="text-white rounded-full w-10 h-10 flex items-center justify-center font-bold" style="background-color: #0F4C81;">GV</div>
                    <div>
                        <p class="text-sm font-semibold">Guest Visitor</p>
                        <p class="text-xs text-gray-500">Tourist Portal</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 overflow-y-auto bg-gray-50">
            <!-- Header Section -->
            <div class="px-8 py-8 bg-white border-b border-gray-200">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-2">Explore Destinations</h1>
                        <p class="text-gray-500">Curated places across Mati and Davao Oriental</p>
                    </div>
                    <button class="px-6 py-2 text-white font-semibold rounded-lg transition" style="background-color: #0F4C81;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='#0F4C81'">
                        Build my itinerary
                    </button>
                </div>

                <!-- Category Filters -->
                <div class="flex gap-3">
                    @foreach($categories as $category)
                        <button class="px-4 py-2 rounded-lg font-medium transition"
                                style="{{ $category['active'] ? 'background-color: #0F4C81; color: white;' : 'background-color: white; color: #0F4C81; border: 1px solid #0F4C81;' }}"
                                onmouseover="this.style.backgroundColor='#0F4C81'; this.style.color='white';"
                                onmouseout="this.style.backgroundColor='{{ $category['active'] ? '#0F4C81' : 'white' }}'; this.style.color='{{ $category['active'] ? 'white' : '#0F4C81' }}';">
                            {{ $category['name'] }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Destinations Grid -->
            <div class="px-8 py-8">
                <div class="grid grid-cols-3 gap-6">
                    @foreach($destinations as $destination)
                        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                            <!-- Image Container -->
                            <div class="relative h-64 bg-gray-200 overflow-hidden group">
                                <img src="{{ $destination['image'] }}" alt="{{ $destination['name'] }}" class="w-full h-full object-cover">

                                <!-- Type Label -->
                                <div class="absolute bottom-3 left-3 bg-white px-3 py-1 rounded text-sm font-medium" style="color: #0F4C81;">
                                    {{ $destination['type'] }}
                                </div>

                                <!-- Wishlist Button -->
                                <button class="absolute top-3 right-3 bg-white rounded-full w-10 h-10 flex items-center justify-center text-gray-400 hover:text-red-500 transition shadow-md">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>

                            <!-- Card Content -->
                            <div class="p-5">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="text-lg font-bold text-gray-900">{{ $destination['name'] }}</h3>
                                    <div class="flex items-center gap-1" style="color: #2E8B57;">
                                        <i class="fas fa-star text-sm"></i>
                                        <span class="font-bold text-sm">{{ $destination['rating'] }}</span>
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="flex items-center gap-2 text-gray-500 text-sm mb-3">
                                    <i class="fas fa-map-pin text-xs" style="color: #0F4C81;"></i>
                                    <span>{{ $destination['location'] }}</span>
                                </div>

                                <!-- Description -->
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $destination['description'] }}</p>

                                <!-- Footer -->
                                <div class="flex justify-between items-center">
                                    <span class="text-xs text-gray-500">{{ $destination['reviews'] }} reviews</span>
                                    <a href="#" class="text-sm font-semibold flex items-center gap-1" style="color: #0F4C81;">
                                        View on map
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
