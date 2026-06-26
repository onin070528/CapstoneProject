<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private function getAdmin()
    {
        return [
            'name' => 'Atty. R. Bandigan',
            'role' => 'PTO Administrator',
            'initials' => 'RB',
        ];
    }

    public function dashboard()
    {
        $admin = $this->getAdmin();

        $stats = [
            ['label' => 'TOTAL ARRIVALS YTD', 'value' => '98,420', 'change' => '↑ 18% YoY', 'icon' => 'fas fa-users', 'icon_color' => '#0F4C81'],
            ['label' => 'ACCREDITED ESTABLISHMENTS', 'value' => '142', 'change' => '↑ 12 new', 'icon' => 'fas fa-building', 'icon_color' => '#0F4C81'],
            ['label' => 'AVG. SATISFACTION', 'value' => '92%', 'change' => '↑ 4 pts', 'icon' => 'fas fa-face-smile', 'icon_color' => '#2E8B57'],
            ['label' => 'REVENUE IMPACT', 'value' => '₱412M', 'change' => '↑ 22% YoY', 'icon' => 'fas fa-chart-line', 'icon_color' => '#2E8B57'],
        ];

        $arrivalTrend = [
            ['month' => 'Jan', 'domestic' => 4200, 'foreign' => 1800],
            ['month' => 'Feb', 'domestic' => 4800, 'foreign' => 2000],
            ['month' => 'Mar', 'domestic' => 5200, 'foreign' => 2200],
            ['month' => 'Apr', 'domestic' => 5800, 'foreign' => 2400],
            ['month' => 'May', 'domestic' => 6200, 'foreign' => 2600],
            ['month' => 'Jun', 'domestic' => 6800, 'foreign' => 2800],
            ['month' => 'Jul', 'domestic' => 7200, 'foreign' => 2600],
            ['month' => 'Aug', 'domestic' => 7800, 'foreign' => 2800],
            ['month' => 'Sep', 'domestic' => 8200, 'foreign' => 3000],
            ['month' => 'Oct', 'domestic' => 8800, 'foreign' => 3200],
            ['month' => 'Nov', 'domestic' => 9500, 'foreign' => 3400],
            ['month' => 'Dec', 'domestic' => 10200, 'foreign' => 3600],
        ];

        $categoryShare = [
            ['category' => 'Beach', 'percentage' => 35, 'color' => '#0F4C81'],
            ['category' => 'Mountain', 'percentage' => 25, 'color' => '#2E8B57'],
            ['category' => 'Heritage', 'percentage' => 20, 'color' => '#F4A261'],
            ['category' => 'Adventure', 'percentage' => 12, 'color' => '#5BA4D9'],
            ['category' => 'Park', 'percentage' => 8, 'color' => '#C0C0C0'],
        ];

        $destinationPerformance = [
            ['name' => 'Dahican Beach', 'visitors' => 4820, 'satisfaction' => 96],
            ['name' => 'Pujada Bay', 'visitors' => 3210, 'satisfaction' => 94],
            ['name' => 'Mt. Hamiguitan', 'visitors' => 1985, 'satisfaction' => 98],
            ['name' => 'Subangan Museum', 'visitors' => 1102, 'satisfaction' => 88],
            ['name' => 'Sleeping Dinosaur', 'visitors' => 1985, 'satisfaction' => 92],
            ['name' => 'Sanghay Falls', 'visitors' => 740, 'satisfaction' => 90],
        ];

        return view('admin.dashboard', compact('admin', 'stats', 'arrivalTrend', 'categoryShare', 'destinationPerformance'));
    }

    public function arrivalMonitoring()
    {
        $admin = $this->getAdmin();

        $stats = [
            ['label' => 'TODAY', 'value' => '1,284', 'icon' => 'fas fa-users', 'icon_color' => '#0F4C81'],
            ['label' => 'THIS WEEK', 'value' => '8,920', 'icon' => 'fas fa-calendar-week', 'icon_color' => '#2E8B57'],
            ['label' => 'FOREIGN VISITORS (MTD)', 'value' => '2,940', 'icon' => 'fas fa-globe', 'icon_color' => '#F4A261'],
            ['label' => 'ACTIVE MUNICIPALITIES', 'value' => '8', 'icon' => 'fas fa-location-dot', 'icon_color' => '#2E8B57'],
        ];

        $monthlyArrivals = [
            ['month' => 'Jan', 'domestic' => 3500, 'foreign' => 1200],
            ['month' => 'Feb', 'domestic' => 4000, 'foreign' => 1500],
            ['month' => 'Mar', 'domestic' => 4500, 'foreign' => 1800],
            ['month' => 'Apr', 'domestic' => 5000, 'foreign' => 2000],
            ['month' => 'May', 'domestic' => 5500, 'foreign' => 2200],
            ['month' => 'Jun', 'domestic' => 5800, 'foreign' => 2400],
            ['month' => 'Jul', 'domestic' => 6000, 'foreign' => 2600],
            ['month' => 'Aug', 'domestic' => 6500, 'foreign' => 2800],
            ['month' => 'Sep', 'domestic' => 7000, 'foreign' => 2800],
            ['month' => 'Oct', 'domestic' => 7200, 'foreign' => 3000],
            ['month' => 'Nov', 'domestic' => 7500, 'foreign' => 3200],
            ['month' => 'Dec', 'domestic' => 8000, 'foreign' => 4500],
        ];

        $contributions = [
            ['name' => 'Dahican Surf Resort', 'type' => 'Resort', 'municipality' => 'Mati City', 'arrivals' => 842, 'share' => 16],
            ['name' => 'Casa de Oriente Hotel', 'type' => 'Hotel', 'municipality' => 'Mati City', 'arrivals' => 974, 'share' => 18],
            ['name' => 'Botona Beach Resort', 'type' => 'Resort', 'municipality' => 'Mati City', 'arrivals' => 612, 'share' => 12],
            ['name' => 'Badas Grill & Seafood', 'type' => 'Restaurant', 'municipality' => 'Mati City', 'arrivals' => 1320, 'share' => 25],
            ['name' => 'Pujada Bay Tours', 'type' => 'Tour Operator', 'municipality' => 'Mati City', 'arrivals' => 705, 'share' => 13],
        ];

        return view('admin.arrival-monitoring', compact('admin', 'stats', 'monthlyArrivals', 'contributions'));
    }

    public function reportValidation()
    {
        $admin = $this->getAdmin();

        $stats = [
            ['label' => 'PENDING REVIEW', 'value' => '2', 'icon' => 'fas fa-clock', 'icon_color' => '#F4A261'],
            ['label' => 'UNDER REVIEW', 'value' => '1', 'icon' => 'fas fa-eye', 'icon_color' => '#0F4C81'],
            ['label' => 'APPROVED', 'value' => '1', 'icon' => 'fas fa-square-check', 'icon_color' => '#2E8B57'],
            ['label' => 'RETURNED', 'value' => '1', 'icon' => 'fas fa-triangle-exclamation', 'icon_color' => '#DC2626'],
        ];

        $submissions = [
            ['id' => 'R-2412-001', 'establishment' => 'Dahican Surf Resort', 'period' => 'Dec 2024', 'arrivals' => 842, 'status' => 'Approved', 'status_color' => '#2E8B57'],
            ['id' => 'R-2412-002', 'establishment' => 'Casa de Oriente Hotel', 'period' => 'Dec 2024', 'arrivals' => 974, 'status' => 'Reviewed', 'status_color' => '#0F4C81'],
            ['id' => 'R-2412-003', 'establishment' => 'Botona Beach Resort', 'period' => 'Dec 2024', 'arrivals' => 612, 'status' => 'Submitted', 'status_color' => '#F4A261'],
            ['id' => 'R-2412-004', 'establishment' => 'Pujada Bay Tours', 'period' => 'Dec 2024', 'arrivals' => 705, 'status' => 'Submitted', 'status_color' => '#F4A261'],
            ['id' => 'R-2411-014', 'establishment' => 'Hamiguitan Eco Lodge', 'period' => 'Nov 2024', 'arrivals' => 198, 'status' => 'Returned', 'status_color' => '#DC2626'],
        ];

        return view('admin.report-validation', compact('admin', 'stats', 'submissions'));
    }

    public function establishments()
    {
        $admin = $this->getAdmin();

        $stats = [
            ['label' => 'TOTAL ESTABLISHMENTS', 'value' => '7', 'icon' => 'fas fa-building', 'icon_color' => '#0F4C81'],
            ['label' => 'ACCREDITED', 'value' => '6', 'icon' => 'fas fa-circle-check', 'icon_color' => '#2E8B57'],
            ['label' => 'PENDING ACCREDITATION', 'value' => '1', 'icon' => 'fas fa-clock', 'icon_color' => '#F4A261'],
        ];

        $directory = [
            ['name' => 'Dahican Surf Resort', 'type' => 'Resort', 'municipality' => 'Mati City', 'accreditation' => 'Approved', 'accreditation_color' => '#2E8B57', 'arrivals' => 842, 'rating' => 4.7],
            ['name' => 'Botona Beach Resort', 'type' => 'Resort', 'municipality' => 'Mati City', 'accreditation' => 'Approved', 'accreditation_color' => '#2E8B57', 'arrivals' => 612, 'rating' => 4.5],
            ['name' => 'Casa de Oriente Hotel', 'type' => 'Hotel', 'municipality' => 'Mati City', 'accreditation' => 'Approved', 'accreditation_color' => '#2E8B57', 'arrivals' => 974, 'rating' => 4.6],
            ['name' => 'Badas Grill & Seafood', 'type' => 'Restaurant', 'municipality' => 'Mati City', 'accreditation' => 'Approved', 'accreditation_color' => '#2E8B57', 'arrivals' => 1320, 'rating' => 4.4],
            ['name' => 'Mati Pasalubong Hub', 'type' => 'Pasalubong', 'municipality' => 'Mati City', 'accreditation' => 'Approved', 'accreditation_color' => '#2E8B57', 'arrivals' => 510, 'rating' => 4.3],
            ['name' => 'Hamiguitan Eco Lodge', 'type' => 'Hotel', 'municipality' => 'San Isidro', 'accreditation' => 'Submitted', 'accreditation_color' => '#F4A261', 'arrivals' => 198, 'rating' => 4.2],
            ['name' => 'Pujada Bay Tours', 'type' => 'Tour Operator', 'municipality' => 'Mati City', 'accreditation' => 'Approved', 'accreditation_color' => '#2E8B57', 'arrivals' => 705, 'rating' => 4.8],
        ];

        return view('admin.establishments', compact('admin', 'stats', 'directory'));
    }

    public function sentimentAnalytics()
    {
        $admin = $this->getAdmin();

        $stats = [
            ['label' => 'OVERALL POLARITY', 'value' => '+0.62', 'change' => '↑ 0.08', 'icon' => 'fas fa-compass', 'icon_color' => '#0F4C81'],
            ['label' => 'POSITIVE REVIEWS', 'value' => '81%', 'change' => null, 'icon' => 'fas fa-face-smile', 'icon_color' => '#2E8B57'],
            ['label' => 'NEUTRAL', 'value' => '14%', 'change' => null, 'icon' => 'fas fa-face-meh', 'icon_color' => '#F4A261'],
            ['label' => 'NEGATIVE', 'value' => '5%', 'change' => '↓ 1%', 'icon' => 'fas fa-face-frown', 'icon_color' => '#DC2626'],
        ];

        $sentimentTrend = [
            ['month' => 'Jul', 'positive' => 72, 'neutral' => 18, 'negative' => 10],
            ['month' => 'Aug', 'positive' => 75, 'neutral' => 16, 'negative' => 9],
            ['month' => 'Sep', 'positive' => 74, 'neutral' => 17, 'negative' => 9],
            ['month' => 'Oct', 'positive' => 78, 'neutral' => 15, 'negative' => 7],
            ['month' => 'Nov', 'positive' => 80, 'neutral' => 14, 'negative' => 6],
            ['month' => 'Dec', 'positive' => 81, 'neutral' => 14, 'negative' => 5],
        ];

        $serviceThemes = [
            ['theme' => 'Boat safety briefings', 'mentions' => 18, 'sentiment' => 'Negative', 'color' => '#DC2626'],
            ['theme' => 'Signage clarity', 'mentions' => 12, 'sentiment' => 'Neutral', 'color' => '#6B7280'],
            ['theme' => 'Restroom facilities', 'mentions' => 9, 'sentiment' => 'Negative', 'color' => '#DC2626'],
            ['theme' => 'Guide friendliness', 'mentions' => 36, 'sentiment' => 'Positive', 'color' => '#2E8B57'],
            ['theme' => 'Local cuisine', 'mentions' => 41, 'sentiment' => 'Positive', 'color' => '#2E8B57'],
        ];

        $destinationSentiment = [
            ['name' => 'Dahican', 'positive' => 92, 'neutral' => 5, 'negative' => 3],
            ['name' => 'Pujada Bay', 'positive' => 85, 'neutral' => 10, 'negative' => 5],
            ['name' => 'Hamiguitan', 'positive' => 88, 'neutral' => 8, 'negative' => 4],
            ['name' => 'Subangan', 'positive' => 75, 'neutral' => 18, 'negative' => 7],
            ['name' => 'Sleeping Dino', 'positive' => 82, 'neutral' => 12, 'negative' => 6],
            ['name' => 'Sanghay', 'positive' => 80, 'neutral' => 14, 'negative' => 6],
        ];

        return view('admin.sentiment-analytics', compact('admin', 'stats', 'sentimentTrend', 'serviceThemes', 'destinationSentiment'));
    }

    public function performanceRanking()
    {
        $admin = $this->getAdmin();

        $highlights = [
            ['label' => 'TOP DESTINATION', 'value' => 'Dahican Beach', 'change' => null, 'icon' => 'fas fa-trophy', 'icon_color' => '#F4A261'],
            ['label' => 'HIGHEST GROWTH', 'value' => 'Pujada Bay', 'change' => '↑ 34% MoM', 'icon' => 'fas fa-chart-line', 'icon_color' => '#2E8B57'],
            ['label' => 'BEST SATISFACTION', 'value' => 'Mt. Hamiguitan', 'change' => '4.9 ★', 'icon' => 'fas fa-star', 'icon_color' => '#F4A261'],
        ];

        $topDestinations = [
            ['rank' => 1, 'name' => 'Dahican Beach', 'type' => 'Beach', 'municipality' => 'Mati City', 'visits' => '4,820', 'rating' => 4.8],
            ['rank' => 2, 'name' => 'Pujada Bay', 'type' => 'Beach', 'municipality' => 'Mati City', 'visits' => '3,210', 'rating' => 4.7],
            ['rank' => 3, 'name' => 'Sleeping Dinosaur Island', 'type' => 'Park', 'municipality' => 'Mati City', 'visits' => '1,985', 'rating' => 4.6],
            ['rank' => 4, 'name' => 'Mt. Hamiguitan Range', 'type' => 'Mountain', 'municipality' => 'San Isidro', 'visits' => '1,230', 'rating' => 4.9],
            ['rank' => 5, 'name' => 'Subangan Museum', 'type' => 'Heritage', 'municipality' => 'Mati City', 'visits' => '1,102', 'rating' => 4.4],
            ['rank' => 6, 'name' => 'Sanghay Falls', 'type' => 'Adventure', 'municipality' => 'Tarragona', 'visits' => '740', 'rating' => 4.5],
        ];

        $topEstablishments = [
            ['rank' => 1, 'name' => 'Badas Grill & Seafood', 'type' => 'Restaurant', 'municipality' => 'Mati City', 'visits' => '1,320', 'rating' => 4.4],
            ['rank' => 2, 'name' => 'Casa de Oriente Hotel', 'type' => 'Hotel', 'municipality' => 'Mati City', 'visits' => '974', 'rating' => 4.6],
            ['rank' => 3, 'name' => 'Dahican Surf Resort', 'type' => 'Resort', 'municipality' => 'Mati City', 'visits' => '842', 'rating' => 4.7],
            ['rank' => 4, 'name' => 'Pujada Bay Tours', 'type' => 'Tour Operator', 'municipality' => 'Mati City', 'visits' => '705', 'rating' => 4.8],
            ['rank' => 5, 'name' => 'Botona Beach Resort', 'type' => 'Resort', 'municipality' => 'Mati City', 'visits' => '612', 'rating' => 4.5],
            ['rank' => 6, 'name' => 'Mati Pasalubong Hub', 'type' => 'Pasalubong', 'municipality' => 'Mati City', 'visits' => '510', 'rating' => 4.3],
            ['rank' => 7, 'name' => 'Hamiguitan Eco Lodge', 'type' => 'Hotel', 'municipality' => 'San Isidro', 'visits' => '198', 'rating' => 4.2],
        ];

        return view('admin.performance-ranking', compact('admin', 'highlights', 'topDestinations', 'topEstablishments'));
    }
}
