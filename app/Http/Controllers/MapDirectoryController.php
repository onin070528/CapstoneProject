<?php

namespace App\Http\Controllers;

class MapDirectoryController extends Controller
{
    public function index()
    {
        $markers = [
            [
                'id' => 1,
                'name' => 'Dahican Beach',
                'type' => 'Attractions',
                'category' => 'Beach',
                'location' => 'Mati City',
                'description' => 'A 7-km stretch of cream-colored sand famous for skimboarding, surfing, and sea-turtle conservation.',
                'lat' => 6.78,
                'lng' => 126.22,
                'color' => '#0F4C81',
                'image' => 'https://via.placeholder.com/400x200?text=Dahican+Beach'
            ],
            [
                'id' => 2,
                'name' => 'Sanghay Falls',
                'type' => 'Attractions',
                'category' => 'Waterfall',
                'location' => 'Mati City',
                'description' => 'A hidden gem waterfall nestled in the lush forests of Mati.',
                'lat' => 6.85,
                'lng' => 126.15,
                'color' => '#0F4C81',
                'image' => 'https://via.placeholder.com/400x200?text=Sanghay+Falls'
            ],
            [
                'id' => 3,
                'name' => 'Subangan Museum',
                'type' => 'Attractions',
                'category' => 'Heritage',
                'location' => 'Mati City',
                'description' => 'A museum showcasing the cultural heritage and history of Davao Oriental.',
                'lat' => 6.75,
                'lng' => 126.18,
                'color' => '#0F4C81',
                'image' => 'https://via.placeholder.com/400x200?text=Subangan+Museum'
            ],
            [
                'id' => 4,
                'name' => 'Mt. Hamiguitan Range',
                'type' => 'Attractions',
                'category' => 'Mountain',
                'location' => 'San Isidro',
                'description' => 'UNESCO World Heritage Site with a unique pygmy forest and rich biodiversity.',
                'lat' => 6.72,
                'lng' => 126.10,
                'color' => '#0F4C81',
                'image' => 'https://via.placeholder.com/400x200?text=Mt+Hamiguitan'
            ],
            [
                'id' => 5,
                'name' => 'Pujada Bay',
                'type' => 'Attractions',
                'category' => 'Beach',
                'location' => 'Mati City',
                'description' => 'Member of the Most Beautiful Bays in the World Club. Crystal waters and pristine islets.',
                'lat' => 6.74,
                'lng' => 126.25,
                'color' => '#0F4C81',
                'image' => 'https://via.placeholder.com/400x200?text=Pujada+Bay'
            ],
            [
                'id' => 6,
                'name' => 'Sleeping Dinosaur Island',
                'type' => 'Attractions',
                'category' => 'Island',
                'location' => 'Mati City',
                'description' => 'An island formation resembling a sleeping dinosaur, visible from the coast.',
                'lat' => 6.77,
                'lng' => 126.27,
                'color' => '#0F4C81',
                'image' => 'https://via.placeholder.com/400x200?text=Sleeping+Dinosaur'
            ],
        ];

        $nearby = [
            [
                'name' => 'Dahican Surf Resort',
                'type' => 'Resort',
                'location' => 'Mati City',
                'distance' => '1.6 km'
            ],
            [
                'name' => 'Botona Beach Resort',
                'type' => 'Resort',
                'location' => 'Mati City',
                'distance' => '2.1 km'
            ],
            [
                'name' => 'Casa de Oriente Hotel',
                'type' => 'Hotel',
                'location' => 'Mati City',
                'distance' => '2.2 km'
            ],
            [
                'name' => 'Badas Grill & Seafood',
                'type' => 'Restaurant',
                'location' => 'Mati City',
                'distance' => '2.3 km'
            ],
        ];

        $legendItems = [
            ['label' => 'Attractions', 'color' => '#0F4C81'],
            ['label' => 'Accommodations', 'color' => '#2E8B57'],
            ['label' => 'Food', 'color' => '#F4A261'],
            ['label' => 'Pasalubong', 'color' => '#6B5B95'],
            ['label' => 'Coastguard', 'color' => '#E74C3C'],
        ];

        return view('map-directory', [
            'markers' => $markers,
            'nearby' => $nearby,
            'legendItems' => $legendItems
        ]);
    }
}
