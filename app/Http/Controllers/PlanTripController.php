<?php

namespace App\Http\Controllers;

class PlanTripController extends Controller
{
    public function index()
    {
        $durations = [
            ['value' => '1d', 'label' => '1d'],
            ['value' => '2d', 'label' => '2d'],
            ['value' => '3d', 'label' => '3d', 'selected' => true],
            ['value' => '4d', 'label' => '4d'],
            ['value' => '5d', 'label' => '5d'],
        ];

        $interests = [
            ['name' => 'Beach', 'selected' => true],
            ['name' => 'Mountain', 'selected' => false],
            ['name' => 'Heritage', 'selected' => false],
            ['name' => 'Adventure', 'selected' => true],
            ['name' => 'Food', 'selected' => false],
        ];

        $startLocations = [
            'Mati City Proper',
            'Dahican Beach Area',
            'San Isidro',
            'Lupon',
            'Tarragona',
        ];

        return view('plan-trip', [
            'durations' => $durations,
            'interests' => $interests,
            'startLocations' => $startLocations
        ]);
    }
}
