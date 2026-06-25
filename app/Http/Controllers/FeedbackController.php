<?php

namespace App\Http\Controllers;

class FeedbackController extends Controller
{
    public function index()
    {
        $destinations = [
            'Dahican Beach',
            'Mt. Hamiguitan Range',
            'Pujada Bay',
            'Camera Museum',
            'Samal Island',
            'Heritage Museum',
            'Sleeping Dinosaur Island',
            'Subangan Museum',
            'Sanghay Falls',
        ];

        $feedbackReasons = [
            [
                'title' => 'Improves services',
                'description' => 'PTO uses sentiment trends to address recurring concerns within 30 days.'
            ],
            [
                'title' => 'Recognizes establishments',
                'description' => 'Top-rated establishments are featured in our directory and promotions.'
            ],
            [
                'title' => 'Smarter recommendations',
                'description' => 'Reviews train our itinerary engine to suggest better matches.'
            ],
        ];

        return view('feedback', [
            'destinations' => $destinations,
            'feedbackReasons' => $feedbackReasons
        ]);
    }
}
