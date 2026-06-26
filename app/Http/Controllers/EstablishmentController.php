<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function overview()
    {
        $establishment = [
            'name' => 'Dahican Surf Resort',
            'initials' => 'DS',
            'location' => 'Mati City',
            'accredited_since' => '2021',
        ];

        $stats = [
            [
                'label' => 'ARRIVALS (MTD)',
                'value' => '842',
                'change' => '↑ 12% vs last month',
                'icon' => 'fas fa-users',
                'icon_color' => '#0F4C81',
            ],
            [
                'label' => 'AVG. RATING',
                'value' => '4.7',
                'change' => '↑ 0.2',
                'icon' => 'fas fa-star',
                'icon_color' => '#F4A261',
            ],
            [
                'label' => 'OCCUPANCY',
                'value' => '74%',
                'change' => '↑ 6%',
                'icon' => 'fas fa-chart-line',
                'icon_color' => '#2E8B57',
            ],
            [
                'label' => 'REPORTS APPROVED',
                'value' => '11/12',
                'change' => null,
                'icon' => 'fas fa-clipboard-check',
                'icon_color' => '#0F4C81',
            ],
        ];

        $arrivals = [
            ['month' => 'Jan', 'value' => 380],
            ['month' => 'Feb', 'value' => 420],
            ['month' => 'Mar', 'value' => 480],
            ['month' => 'Apr', 'value' => 560],
            ['month' => 'May', 'value' => 620],
            ['month' => 'Jun', 'value' => 680],
            ['month' => 'Jul', 'value' => 650],
            ['month' => 'Aug', 'value' => 700],
            ['month' => 'Sep', 'value' => 720],
            ['month' => 'Oct', 'value' => 750],
            ['month' => 'Nov', 'value' => 900],
            ['month' => 'Dec', 'value' => 980],
        ];

        $recentFeedback = [
            [
                'name' => 'Andrea L.',
                'sentiment' => 'Positive',
                'comment' => 'Pristine sand and the skimboarding lessons were unforgettable. Locals were so warm.',
            ],
            [
                'name' => 'Marco R.',
                'sentiment' => 'Positive',
                'comment' => 'Crystal clear water, island hopping was perfectly organized.',
            ],
            [
                'name' => 'Jenny S.',
                'sentiment' => 'Positive',
                'comment' => 'Challenging hike but the pygmy forest is otherworldly.',
            ],
            [
                'name' => 'Paolo C.',
                'sentiment' => 'Neutral',
                'comment' => 'Informative exhibits but the building could use better signage.',
            ],
        ];

        $recentReports = [
            [
                'id' => 'R-2412-001',
                'period' => 'Dec 2024',
                'submitted' => '2025-01-03',
                'arrivals' => 842,
                'status' => 'Approved',
            ],
        ];

        return view('establishment.overview', compact(
            'establishment', 'stats', 'arrivals', 'recentFeedback', 'recentReports'
        ));
    }

    public function recordArrivals()
    {
        $establishment = [
            'name' => 'Dahican Surf Resort',
            'initials' => 'DS',
        ];

        $todayStats = [
            ['label' => 'TOTAL GUESTS TODAY', 'value' => '9', 'icon' => 'fas fa-users', 'icon_color' => '#0F4C81'],
            ['label' => 'DOMESTIC', 'value' => '7', 'icon' => 'fas fa-users', 'icon_color' => '#0F4C81'],
            ['label' => 'FOREIGN', 'value' => '2', 'icon' => 'fas fa-globe', 'icon_color' => '#0F4C81'],
        ];

        $todayArrivals = [
            [
                'date' => '2025-01-12',
                'guest' => 'Lim, Andrea',
                'origin' => 'Davao City',
                'type' => 'Domestic',
                'party' => 3,
                'purpose' => 'Leisure',
            ],
            [
                'date' => '2025-01-12',
                'guest' => 'Tanaka, Hiro',
                'origin' => 'Japan',
                'type' => 'Foreign',
                'party' => 2,
                'purpose' => 'Leisure',
            ],
            [
                'date' => '2025-01-11',
                'guest' => 'Reyes, Marco',
                'origin' => 'Manila',
                'type' => 'Domestic',
                'party' => 4,
                'purpose' => 'Family',
            ],
        ];

        return view('establishment.record-arrivals', compact(
            'establishment', 'todayStats', 'todayArrivals'
        ));
    }

    public function monthlyReports()
    {
        $establishment = [
            'name' => 'Dahican Surf Resort',
            'initials' => 'DS',
        ];

        $reports = [
            [
                'id' => 'R-2412-001',
                'period' => 'Dec 2024',
                'submitted' => '2025-01-03',
                'arrivals' => 842,
                'status' => 'Approved',
                'status_color' => '#2E8B57',
            ],
            [
                'id' => 'R-2412-002',
                'period' => 'Dec 2024',
                'submitted' => '2025-01-04',
                'arrivals' => 974,
                'status' => 'Reviewed',
                'status_color' => '#0F4C81',
            ],
            [
                'id' => 'R-2412-003',
                'period' => 'Dec 2024',
                'submitted' => '2025-01-05',
                'arrivals' => 612,
                'status' => 'Submitted',
                'status_color' => '#F4A261',
            ],
            [
                'id' => 'R-2412-004',
                'period' => 'Dec 2024',
                'submitted' => '2025-01-05',
                'arrivals' => 705,
                'status' => 'Submitted',
                'status_color' => '#F4A261',
            ],
            [
                'id' => 'R-2411-014',
                'period' => 'Nov 2024',
                'submitted' => '2024-12-06',
                'arrivals' => 198,
                'status' => 'Returned',
                'status_color' => '#DC2626',
            ],
        ];

        $draft = [
            'month' => 'January 2025',
            'encoded' => 412,
            'domestic' => 358,
            'foreign' => 54,
            'leisure' => 288,
            'business' => 42,
        ];

        return view('establishment.monthly-reports', compact(
            'establishment', 'reports', 'draft'
        ));
    }

    public function guestFeedback()
    {
        $establishment = [
            'name' => 'Dahican Surf Resort',
            'initials' => 'DS',
        ];

        $feedbackStats = [
            [
                'label' => 'TOTAL REVIEWS',
                'value' => '284',
                'change' => null,
                'icon' => 'fas fa-comment',
                'icon_color' => '#0F4C81',
            ],
            [
                'label' => 'AVG. RATING',
                'value' => '4.7',
                'change' => null,
                'icon' => 'fas fa-star',
                'icon_color' => '#F4A261',
            ],
            [
                'label' => 'POSITIVE',
                'value' => '81%',
                'change' => '↑ 3%',
                'icon' => 'fas fa-thumbs-up',
                'icon_color' => '#2E8B57',
            ],
            [
                'label' => 'NEGATIVE',
                'value' => '5%',
                'change' => '↓ 1%',
                'change_color' => '#2E8B57',
                'icon' => 'fas fa-thumbs-down',
                'icon_color' => '#DC2626',
            ],
        ];

        $recentReviews = [
            [
                'name' => 'Andrea L.',
                'date' => '2025-01-12',
                'location' => 'Dahican Beach',
                'rating' => 5,
                'sentiment' => 'Positive',
                'polarity' => 0.82,
                'comment' => 'Pristine sand and the skimboarding lessons were unforgettable. Locals were so warm.',
            ],
            [
                'name' => 'Marco R.',
                'date' => '2025-01-11',
                'location' => 'Pujangi Bay',
                'rating' => 4,
                'sentiment' => 'Positive',
                'polarity' => 0.71,
                'comment' => 'Crystal clear water, island hopping was perfectly organized.',
            ],
        ];

        return view('establishment.guest-feedback', compact(
            'establishment', 'feedbackStats', 'recentReviews'
        ));
    }
}
