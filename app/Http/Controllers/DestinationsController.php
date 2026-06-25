<?php

namespace App\Http\Controllers;

class DestinationsController extends Controller
{
    public function index()
    {
        $categories = [
            ['name' => 'All', 'active' => true],
            ['name' => 'Beach', 'active' => false],
            ['name' => 'Mountain', 'active' => false],
            ['name' => 'Heritage', 'active' => false],
            ['name' => 'Park', 'active' => false],
            ['name' => 'Adventure', 'active' => false]
        ];

        $destinations = [
            [
                'id' => 1,
                'name' => 'Dahican Beach',
                'type' => 'Beach',
                'location' => 'Mati City',
                'rating' => 4.8,
                'reviews' => 1284,
                'description' => 'A 7-km stretch of cream-colored sand famous for skimboarding, surfing, and sea-turtle conservation.',
                'image' => 'https://via.placeholder.com/400x300?text=Dahican+Beach',
                'featured' => true
            ],
            [
                'id' => 2,
                'name' => 'Mt. Hamiguitan Range',
                'type' => 'Mountain',
                'location' => 'San Isidro',
                'rating' => 4.9,
                'reviews' => 642,
                'description' => 'UNESCO World Heritage Site with a unique pygmy forest and rich biodiversity.',
                'image' => 'https://via.placeholder.com/400x300?text=Mt.+Hamiguitan',
                'featured' => true
            ],
            [
                'id' => 3,
                'name' => 'Pujada Bay',
                'type' => 'Beach',
                'location' => 'Mati City',
                'rating' => 4.7,
                'reviews' => 905,
                'description' => 'Member of the Most Beautiful Bays in the World Club. Crystal waters and pristine islets.',
                'image' => 'https://via.placeholder.com/400x300?text=Pujada+Bay',
                'featured' => true
            ],
            [
                'id' => 4,
                'name' => 'Camera Museum',
                'type' => 'Heritage',
                'location' => 'Mati City',
                'rating' => 4.5,
                'reviews' => 380,
                'description' => 'Collection of vintage and modern cameras from around the world.',
                'image' => 'https://via.placeholder.com/400x300?text=Camera+Museum',
                'featured' => false
            ],
            [
                'id' => 5,
                'name' => 'Samal Island',
                'type' => 'Adventure',
                'location' => 'Samal',
                'rating' => 4.6,
                'reviews' => 520,
                'description' => 'Gateway to adventure with water sports and island-hopping activities.',
                'image' => 'https://via.placeholder.com/400x300?text=Samal+Island',
                'featured' => false
            ],
            [
                'id' => 6,
                'name' => 'Heritage Museum',
                'type' => 'Heritage',
                'location' => 'Mati City',
                'rating' => 4.4,
                'reviews' => 290,
                'description' => 'Showcase of local culture, history, and artifacts of Davao Oriental.',
                'image' => 'https://via.placeholder.com/400x300?text=Heritage+Museum',
                'featured' => false
            ]
        ];

        return view('destinations', [
            'categories' => $categories,
            'destinations' => $destinations
        ]);
    }
}
