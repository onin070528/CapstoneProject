@extends('layouts.app')

@section('title', 'Plan a Trip - ITOUR Mati')

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
                <a href="/map-directory" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-map text-lg"></i>
                    <span>Map & Directory</span>
                </a>
                <a href="/plan-trip" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                    <i class="fas fa-calendar text-lg"></i>
                    <span>Plan a Trip</span>
                    <i class="fas fa-chevron-right ml-auto"></i>
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
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Personalized Itinerary</h1>
                <p class="text-gray-500">Rule-based recommendations using preferences, ratings and proximity</p>
            </div>

            <!-- Two Column Layout -->
            <div class="px-8 pb-8 flex gap-6">
                <!-- Preferences Panel -->
                <div class="w-1/2 bg-white rounded-lg border border-gray-200 p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Your preferences</h2>

                    <!-- Travel Duration -->
                    <div class="mb-8">
                        <p class="text-xs font-bold text-gray-500 tracking-wider mb-4">TRAVEL DURATION</p>
                        <div class="flex gap-3">
                            @foreach($durations as $duration)
                                <button class="w-12 h-12 rounded-full font-semibold transition flex items-center justify-center text-sm duration-btn"
                                        style="{{ isset($duration['selected']) && $duration['selected'] ? 'background-color: #0F4C81; color: white;' : 'background-color: white; color: #374151; border: 1px solid #d1d5db;' }}"
                                        onclick="selectDuration(this)"
                                        data-value="{{ $duration['value'] }}">
                                    {{ $duration['label'] }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Interests -->
                    <div class="mb-8">
                        <p class="text-xs font-bold text-gray-500 tracking-wider mb-4">INTERESTS</p>
                        <div class="flex flex-wrap gap-3">
                            @foreach($interests as $interest)
                                <button class="px-5 py-2 rounded-lg font-medium transition text-sm interest-btn"
                                        style="{{ $interest['selected'] ? 'background-color: #0F4C81; color: white;' : 'background-color: white; color: #374151; border: 1px solid #d1d5db;' }}"
                                        onclick="toggleInterest(this)">
                                    {{ $interest['name'] }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Start Location -->
                    <div class="mb-8">
                        <p class="text-xs font-bold text-gray-500 tracking-wider mb-4">START LOCATION</p>
                        <select class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm text-gray-700 focus:outline-none" style="border-color: #d1d5db;" onfocus="this.style.borderColor='#0F4C81'" onblur="this.style.borderColor='#d1d5db'">
                            @foreach($startLocations as $location)
                                <option>{{ $location }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Generate Button -->
                    <button class="w-full text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition" style="background-color: #0F4C81;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='#0F4C81'" onclick="generateItinerary()">
                        <i class="fas fa-wand-magic-sparkles"></i>
                        Generate Itinerary
                    </button>
                </div>

                <!-- Suggested Route Panel -->
                <div class="w-1/2 bg-white rounded-lg border border-gray-200 p-8" id="routePanel">
                    <h2 class="text-xl font-bold text-gray-900 mb-1">Your suggested route will appear here</h2>
                    <p class="text-sm text-gray-500 mb-8">Choose preferences and click generate</p>

                    <!-- Empty State -->
                    <div class="flex flex-col items-center justify-center py-20" id="emptyState">
                        <div class="text-gray-300 mb-4">
                            <i class="fas fa-wand-magic-sparkles text-5xl"></i>
                        </div>
                        <p class="text-gray-400 text-sm">Set your preferences and we'll plan it for you.</p>
                    </div>

                    <!-- Generated Route (hidden by default) -->
                    <div class="hidden" id="generatedRoute">
                        <div class="space-y-6">
                            <!-- Day 1 -->
                            <div>
                                <h3 class="font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <span class="w-8 h-8 rounded-full text-white text-sm flex items-center justify-center" style="background-color: #0F4C81;">1</span>
                                    Day 1
                                </h3>
                                <div class="ml-10 space-y-3">
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <i class="fas fa-sun text-yellow-500 mt-1"></i>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">Morning - Dahican Beach</p>
                                            <p class="text-xs text-gray-500">Surfing and skimboarding · 3 hours</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <i class="fas fa-cloud-sun text-orange-400 mt-1"></i>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">Afternoon - Sleeping Dinosaur Island</p>
                                            <p class="text-xs text-gray-500">Island hopping · 4 hours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Day 2 -->
                            <div>
                                <h3 class="font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <span class="w-8 h-8 rounded-full text-white text-sm flex items-center justify-center" style="background-color: #0F4C81;">2</span>
                                    Day 2
                                </h3>
                                <div class="ml-10 space-y-3">
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <i class="fas fa-sun text-yellow-500 mt-1"></i>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">Morning - Pujada Bay</p>
                                            <p class="text-xs text-gray-500">Kayaking and snorkeling · 3 hours</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <i class="fas fa-cloud-sun text-orange-400 mt-1"></i>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">Afternoon - Subangan Museum</p>
                                            <p class="text-xs text-gray-500">Cultural tour · 2 hours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Day 3 -->
                            <div>
                                <h3 class="font-bold text-gray-900 mb-3 flex items-center gap-2">
                                    <span class="w-8 h-8 rounded-full text-white text-sm flex items-center justify-center" style="background-color: #0F4C81;">3</span>
                                    Day 3
                                </h3>
                                <div class="ml-10 space-y-3">
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <i class="fas fa-sun text-yellow-500 mt-1"></i>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">Morning - Mt. Hamiguitan Range</p>
                                            <p class="text-xs text-gray-500">Trekking and nature walk · 5 hours</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <i class="fas fa-cloud-sun text-orange-400 mt-1"></i>
                                        <div>
                                            <p class="font-semibold text-gray-900 text-sm">Afternoon - Sanghay Falls</p>
                                            <p class="text-xs text-gray-500">Swimming and relaxation · 2 hours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function selectDuration(btn) {
        document.querySelectorAll('.duration-btn').forEach(b => {
            b.style.backgroundColor = 'white';
            b.style.color = '#374151';
            b.style.border = '1px solid #d1d5db';
        });
        btn.style.backgroundColor = '#0F4C81';
        btn.style.color = 'white';
        btn.style.border = 'none';
    }

    function toggleInterest(btn) {
        if (btn.style.backgroundColor === 'rgb(15, 76, 129)') {
            btn.style.backgroundColor = 'white';
            btn.style.color = '#374151';
            btn.style.border = '1px solid #d1d5db';
        } else {
            btn.style.backgroundColor = '#0F4C81';
            btn.style.color = 'white';
            btn.style.border = 'none';
        }
    }

    function generateItinerary() {
        document.getElementById('emptyState').classList.add('hidden');
        document.getElementById('generatedRoute').classList.remove('hidden');
        document.querySelector('#routePanel h2').textContent = 'Your suggested route';
        document.querySelector('#routePanel p').textContent = '3-day itinerary based on your preferences';
    }
</script>
@endsection
