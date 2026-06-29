<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\Feedback;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            [
                'label' => 'DESTINATIONS',
                'value' => '6',
                'icon' => 'fas fa-map-pin',
                'color' => '[#0F4C81]'
            ],
            [
                'label' => 'ACCREDITED SERVICES',
                'value' => '142',
                'icon' => 'fas fa-star',
                'color' => '[#2E8B57]'
            ],
            [
                'label' => 'VISITORS THIS YEAR',
                'value' => '98.4K',
                'change' => '↑ 18% vs 2023',
                'icon' => 'fas fa-users',
                'color' => '[#F4A261]'
            ],
            [
                'label' => 'SATISFACTION RATE',
                'value' => '92%',
                'change' => '↑ 4 pts',
                'icon' => 'fas fa-arrow-trend-up',
                'color' => '[#2E8B57]'
            ]
        ];

        $categories = [
            ['name' => 'Beach', 'status' => 'Active'],
            ['name' => 'Mountain', 'status' => 'Active'],
            ['name' => 'Heritage', 'status' => 'Active'],
            ['name' => 'Adventure', 'status' => 'Active']
        ];

        $destinations = [
            [
                'id' => 1,
                'name' => 'Dahican Beach',
                'type' => 'Beach',
                'location' => 'Mati City',
                'rating' => 4.8,
                'reviews' => 1284,
                'color' => 'from-[#F4A261] to-orange-400'
            ],
            [
                'id' => 2,
                'name' => 'Mt. Hamiguitan Range',
                'type' => 'Mountain',
                'location' => 'San Isidro',
                'rating' => 4.9,
                'reviews' => 642,
                'color' => 'from-[#2E8B57] to-green-600'
            ],
            [
                'id' => 3,
                'name' => 'Pujada Bay',
                'type' => 'Beach',
                'location' => 'Mati City',
                'rating' => 4.7,
                'reviews' => 905,
                'color' => 'from-[#0F4C81] to-blue-700'
            ]
        ];

        return view('LandingPage', [
            'stats' => $stats,
            'destinations' => $destinations,
            'categories' => $categories
        ]);
    }

    public function publicHome()
    {
        return view('PublicUsers.home');
    }

    public function publicEstablishments()
    {
        return view('PublicUsers.establishments');
    }

    public function publicEvents()
    {
        return view('PublicUsers.events');
    }

    public function publicTravelGuide()
    {
        return view('PublicUsers.travel-guide');
    }

    public function publicEmergency()
    {
        return view('PublicUsers.emergency');
    }

    public function showFeedbackForm($uuid)
    {
        $establishment = Establishment::where('uuid', $uuid)->firstOrFail();
        return view('PublicUsers.feedback-form', compact('establishment'));
    }

    public function submitFeedbackForm(Request $request, $uuid)
    {
        $establishment = Establishment::where('uuid', $uuid)->firstOrFail();

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback_text' => 'required|string|max:1000',
            'tourist_name' => 'nullable|string|max:255',
        ]);

        Feedback::create([
            'establishment_id' => $establishment->id,
            'tourist_name' => $validated['tourist_name'] ?: 'Anonymous',
            'rating' => $validated['rating'],
            'feedback_text' => $validated['feedback_text'],
            'visit_date' => now()->toDateString(),
        ]);

        // Recalculate average rating
        $avgRating = $establishment->feedbacks()->avg('rating');
        $establishment->update([
            'rating' => round($avgRating, 1)
        ]);

        return redirect()->back()->with('success', 'Thank you! Your feedback has been submitted successfully.');
    }
}
