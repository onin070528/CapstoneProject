@extends('layouts.app')

@section('title', 'Share Feedback - ITOUR Mati')

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
                <a href="/plan-trip" class="flex items-center gap-3 px-4 py-3 rounded-lg text-blue-100 transition" style="border-radius: 0.5rem;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='transparent'">
                    <i class="fas fa-calendar text-lg"></i>
                    <span>Plan a Trip</span>
                </a>
                <a href="/feedback" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white" style="background-color: #0A3A62;">
                    <i class="fas fa-comment text-lg"></i>
                    <span>Share Feedback</span>
                    <i class="fas fa-chevron-right ml-auto"></i>
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
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Share Your Experience</h1>
                <p class="text-gray-500">Your reviews directly improve Mati's tourism services</p>
            </div>

            <!-- Two Column Layout -->
            <div class="px-8 pb-8 flex gap-6">
                <!-- Feedback Form -->
                <div class="flex-1 bg-white rounded-lg border border-gray-200 p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Tell us about your visit</h2>

                    <!-- Name and Destination Row -->
                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <div>
                            <p class="text-xs font-bold text-gray-500 tracking-wider mb-3">YOUR NAME (OPTIONAL)</p>
                            <input type="text" placeholder="e.g. Andrea Lim"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm text-gray-700 focus:outline-none"
                                   onfocus="this.style.borderColor='#0F4C81'" onblur="this.style.borderColor='#d1d5db'">
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-500 tracking-wider mb-3">DESTINATION VISITED</p>
                            <select class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm text-gray-700 focus:outline-none"
                                    onfocus="this.style.borderColor='#0F4C81'" onblur="this.style.borderColor='#d1d5db'">
                                @foreach($destinations as $dest)
                                    <option>{{ $dest }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Overall Rating -->
                    <div class="mb-6">
                        <p class="text-xs font-bold text-gray-500 tracking-wider mb-3">OVERALL RATING</p>
                        <div class="flex gap-2" id="starRating">
                            @for($i = 1; $i <= 5; $i++)
                                <button class="text-3xl text-gray-300 hover:text-yellow-400 transition" onclick="setRating({{ $i }})" id="star-{{ $i }}">
                                    <i class="fas fa-star"></i>
                                </button>
                            @endfor
                        </div>
                    </div>

                    <!-- Comments -->
                    <div class="mb-4">
                        <p class="text-xs font-bold text-gray-500 tracking-wider mb-3">YOUR COMMENTS</p>
                        <textarea rows="6" placeholder="Share what made your visit memorable, or what could be improved..."
                                  class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm text-gray-700 focus:outline-none resize-y"
                                  onfocus="this.style.borderColor='#0F4C81'" onblur="this.style.borderColor='#d1d5db'"></textarea>
                    </div>

                    <p class="text-xs text-gray-400 mb-6">Comments are analyzed using lexicon-based sentiment scoring to surface common themes.</p>

                    <!-- Submit Button -->
                    <button class="text-white font-semibold py-3 px-8 rounded-lg flex items-center gap-2 transition" style="background-color: #0F4C81;" onmouseover="this.style.backgroundColor='#0A3A62'" onmouseout="this.style.backgroundColor='#0F4C81'">
                        <i class="fas fa-paper-plane"></i>
                        Submit Feedback
                    </button>
                </div>

                <!-- Why Feedback Matters Panel -->
                <div class="w-80 bg-white rounded-lg border border-gray-200 p-8 flex-shrink-0 h-fit">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Why your feedback matters</h2>

                    <div class="space-y-6">
                        @foreach($feedbackReasons as $reason)
                            <div class="flex gap-4">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-7 h-7 rounded-full flex items-center justify-center" style="background-color: #e6f4ea;">
                                        <i class="fas fa-check text-sm" style="color: #2E8B57;"></i>
                                    </div>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900 mb-1" style="color: #0F4C81;">{{ $reason['title'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $reason['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let currentRating = 0;

    function setRating(rating) {
        currentRating = rating;
        for (let i = 1; i <= 5; i++) {
            const star = document.getElementById('star-' + i);
            if (i <= rating) {
                star.style.color = '#FBBF24';
            } else {
                star.style.color = '#D1D5DB';
            }
        }
    }
</script>
@endsection
