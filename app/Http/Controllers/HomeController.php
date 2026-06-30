<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\Feedback;
use App\Models\VisitorRegistration;
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

    /**
     * Show the visitor registration form (QR code scan landing).
     */
    public function showVisitorForm($uuid)
    {
        $establishment = Establishment::where('uuid', $uuid)->firstOrFail();
        return view('PublicUsers.visitor-register', compact('establishment'));
    }

    /**
     * Handle batch submission of visitor registrations.
     */
    public function submitVisitorRegistration(Request $request, $uuid)
    {
        $establishment = Establishment::where('uuid', $uuid)->firstOrFail();

        $validated = $request->validate([
            'visitors' => 'required|array|min:1',
            'visitors.*.visitor_name' => 'required|string|max:255',
            'visitors.*.gender' => 'required|in:Male,Female',
            'visitors.*.origin_type' => 'required|in:Philippines,Foreigner',
            'visitors.*.residency_code' => 'required|in:R,Prov,NR,FO',
            'visitors.*.remarks' => 'nullable|string|max:500',
        ]);

        // Get the last visitor number for this establishment today
        $lastNumber = VisitorRegistration::where('establishment_id', $establishment->id)
            ->whereDate('visit_date', now()->toDateString())
            ->max('visitor_number') ?? 0;

        foreach ($validated['visitors'] as $index => $visitor) {
            VisitorRegistration::create([
                'establishment_id' => $establishment->id,
                'visitor_number' => $lastNumber + $index + 1,
                'visit_date' => now()->toDateString(),
                'visitor_name' => $visitor['visitor_name'],
                'gender' => $visitor['gender'],
                'origin_type' => $visitor['origin_type'],
                'residency_code' => $visitor['residency_code'],
                'remarks' => $visitor['remarks'] ?? null,
            ]);
        }

        $count = count($validated['visitors']);
        return redirect()->back()->with('success', "{$count} visitor(s) registered successfully. Thank you!");
    }
}

