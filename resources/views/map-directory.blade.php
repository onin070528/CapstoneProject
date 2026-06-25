@extends('layouts.app')

@section('title', 'Tourism Directory & Map - ITOUR Mati')

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
                <a href="/destinations" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-map-pin text-lg"></i>
                    <span>Destinations</span>
                </a>
                <a href="/map-directory" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                    <i class="fas fa-map text-lg"></i>
                    <span>Map & Directory</span>
                    <i class="fas fa-chevron-right ml-auto"></i>
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
            <!-- Page Header -->
            <div class="px-8 pt-8 pb-4">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Tourism Directory & Map</h1>
                <p class="text-gray-500">Find nearby services using geospatial nearest-neighbor search</p>
            </div>

            <!-- Map and Details Layout -->
            <div class="px-8 pb-8 flex gap-6" style="height: calc(100vh - 180px);">
                <!-- Map Section -->
                <div class="flex-1 bg-white rounded-lg border border-gray-200 overflow-hidden flex flex-col">
                    <!-- Map Header -->
                    <div class="p-5 border-b border-gray-200 flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Mati Interactive Map</h2>
                            <p class="text-sm text-gray-500">Click a marker to view details</p>
                        </div>
                        <div class="flex items-center gap-5">
                            @foreach($legendItems as $item)
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full" style="background-color: {{ $item['color'] }};"></span>
                                    <span class="text-sm text-gray-600">{{ $item['label'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Map Area -->
                    <div class="flex-1 relative" style="background: linear-gradient(180deg, #d4eaf7 0%, #b8d4e8 40%, #a8c8b0 60%, #8fba8f 75%, #d4eaf7 100%);" id="mapArea">
                        <!-- Water label -->
                        <div class="absolute text-2xl font-bold tracking-widest" style="color: rgba(255,255,255,0.5); top: 30%; left: 35%; transform: rotate(-5deg);">PUJADA BAY</div>

                        <!-- Map markers -->
                        @foreach($markers as $index => $marker)
                            <div class="absolute cursor-pointer group" style="top: {{ 20 + ($index * 12) }}%; left: {{ 25 + ($index * 10) }}%;" onclick="selectMarker({{ $index }})">
                                <div class="flex flex-col items-center">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white shadow-lg transition-transform hover:scale-110" style="background-color: {{ $marker['color'] }};">
                                        <i class="fas fa-map-marker-alt text-sm"></i>
                                    </div>
                                    <span class="text-xs font-semibold mt-1 bg-white px-2 py-0.5 rounded shadow text-gray-700 whitespace-nowrap">{{ $marker['name'] }}</span>
                                </div>
                            </div>
                        @endforeach

                        <!-- Additional colored dots for accommodations, food, etc. -->
                        <div class="absolute w-4 h-4 rounded-full shadow" style="background-color: #2E8B57; top: 35%; left: 30%;"></div>
                        <div class="absolute w-4 h-4 rounded-full shadow" style="background-color: #2E8B57; top: 55%; left: 40%;"></div>
                        <div class="absolute w-4 h-4 rounded-full shadow" style="background-color: #2E8B57; top: 70%; left: 65%;"></div>
                        <div class="absolute w-4 h-4 rounded-full shadow" style="background-color: #6B5B95; top: 48%; left: 62%;"></div>
                        <div class="absolute w-4 h-4 rounded-full shadow" style="background-color: #0F4C81; top: 80%; left: 35%;"></div>
                        <div class="absolute w-4 h-4 rounded-full shadow" style="background-color: #F4A261; top: 85%; left: 55%;"></div>
                        <div class="absolute w-4 h-4 rounded-full shadow" style="background-color: #E74C3C; top: 78%; left: 48%;"></div>

                        <!-- City label -->
                        <div class="absolute text-lg font-bold tracking-widest" style="color: rgba(100,100,100,0.4); bottom: 8%; left: 20%;">MATI CITY</div>
                    </div>
                </div>

                <!-- Location Details Panel -->
                <div class="w-80 bg-white rounded-lg border border-gray-200 overflow-y-auto flex-shrink-0">
                    <div class="p-5 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-gray-900">Location Details</h2>
                        <p class="text-sm text-gray-500" id="detailSubtitle">Mati City</p>
                    </div>

                    <!-- Detail Content -->
                    <div id="locationDetail">
                        <!-- Image -->
                        <div class="h-48 bg-gray-200 overflow-hidden">
                            <img id="detailImage" src="https://via.placeholder.com/400x200?text=Dahican+Beach" alt="Location" class="w-full h-full object-cover">
                        </div>

                        <!-- Info -->
                        <div class="p-5">
                            <p class="text-sm text-gray-500 mb-1" id="detailCategory">Beach</p>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3" id="detailName">Dahican Beach</h3>
                            <p class="text-sm text-gray-600 mb-5" id="detailDescription">A 7-km stretch of cream-colored sand famous for skimboarding, surfing, and sea-turtle conservation.</p>

                            <!-- Get Directions Button -->
                            <button class="w-full text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition" style="background-color: #0F4C81;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='#0F4C81'">
                                <i class="fas fa-location-arrow"></i>
                                Get directions
                            </button>
                        </div>

                        <!-- Nearby Section -->
                        <div class="px-5 pb-5">
                            <p class="text-xs font-bold text-gray-500 tracking-wider mb-4">NEARBY (WITHIN 3 KM)</p>
                            @foreach($nearby as $place)
                                <div class="flex justify-between items-start py-3 border-t border-gray-100">
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $place['name'] }}</p>
                                        <p class="text-xs text-gray-500">{{ $place['type'] }} · {{ $place['location'] }}</p>
                                    </div>
                                    <span class="text-sm text-gray-500">{{ $place['distance'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const markers = @json($markers);

    function selectMarker(index) {
        const marker = markers[index];
        document.getElementById('detailImage').src = marker.image;
        document.getElementById('detailCategory').textContent = marker.category;
        document.getElementById('detailName').textContent = marker.name;
        document.getElementById('detailDescription').textContent = marker.description;
        document.getElementById('detailSubtitle').textContent = marker.location;
    }
</script>
@endsection
