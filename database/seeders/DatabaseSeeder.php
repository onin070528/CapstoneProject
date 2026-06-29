<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with one account per RBAC role.
     */
    public function run(): void
    {
        // ─── 1. PTO Admin ──────────────────────────────────────────────
        User::create([
            'name'     => 'PTO Administrator',
            'email'    => 'admin@itour.gov.ph',
            'password' => Hash::make('Admin@123'),
            'role'     => 'pto_admin',
        ]);

        // ─── 2. Establishment Owner ─────────────────────────────────────
        User::create([
            'name'     => 'Establishment Owner',
            'email'    => 'establishment@itour.gov.ph',
            'password' => Hash::make('Establish@123'),
            'role'     => 'establishment_owner',
        ]);

        // ─── 3. Public Tourist ──────────────────────────────────────────
        User::create([
            'name'     => 'Public Tourist',
            'email'    => 'tourist@itour.gov.ph',
            'password' => Hash::make('Tourist@123'),
            'role'     => 'public_tourist',
        ]);

        // ─── 4. Establishments ──────────────────────────────────────────
        \App\Models\Establishment::create([
            'name' => 'Blue Bless Resort',
            'category' => 'Resort',
            'municipality' => 'Mati City',
            'owner_name' => 'Juan Dela Cruz',
            'owner_phone' => '+63 917 123 4567',
            'rating' => 4.7,
            'status' => 'ACTIVE',
            'description' => 'A beautiful cliffside resort overlooking Pujada Bay, featuring pristine pools and cozy villas.',
            'location' => 'Brgy. Dahican, Mati City',
            'lat' => 6.7212,
            'lng' => 126.2730,
        ]);

        \App\Models\Establishment::create([
            'name' => 'Botona Beach Resort',
            'category' => 'Resort',
            'municipality' => 'Mati City',
            'owner_name' => 'Liza Garcia',
            'owner_phone' => '+63 917 234 5678',
            'rating' => 4.5,
            'status' => 'ACTIVE',
            'description' => 'A cozy beachfront sanctuary ideal for family gatherings and relaxing weekend getaways.',
            'location' => 'Brgy. Dahican, Mati City',
            'lat' => 6.7258,
            'lng' => 126.2711,
        ]);

        \App\Models\Establishment::create([
            'name' => 'Mati Marina Hotel',
            'category' => 'Hotel',
            'municipality' => 'Mati City',
            'owner_name' => 'Roberto Lim',
            'owner_phone' => '+63 918 345 6789',
            'rating' => 4.6,
            'status' => 'ACTIVE',
            'description' => 'Modern marina-front hotel offering premium accommodation and business amenities.',
            'location' => 'Mati City Center',
            'lat' => 6.9555,
            'lng' => 126.2173,
        ]);

        \App\Models\Establishment::create([
            'name' => 'Aliwagwag Eco Lodge',
            'category' => 'Lodge',
            'municipality' => 'Cateel',
            'owner_name' => 'Marites Bayan',
            'owner_phone' => '+63 919 456 7890',
            'rating' => 4.8,
            'status' => 'ACTIVE',
            'description' => 'Ecotourism lodge situated right next to the famous multi-tiered Aliwagwag Falls.',
            'location' => 'Cateel, Davao Oriental',
            'lat' => 7.7917,
            'lng' => 126.4528,
        ]);

        \App\Models\Establishment::create([
            'name' => 'Pacific View Inn',
            'category' => 'Inn',
            'municipality' => 'Governor Generoso',
            'owner_name' => 'Carlos Mendoza',
            'owner_phone' => '+63 920 567 8901',
            'rating' => 0.0,
            'status' => 'PENDING',
            'description' => 'A scenic inn overlooking the Pacific Ocean, offering budget rooms for travelers.',
            'location' => 'Governor Generoso, Davao Oriental',
            'lat' => 6.4215,
            'lng' => 126.0821,
        ]);

        \App\Models\Establishment::create([
            'name' => 'Pujada Bay Diving Center',
            'category' => 'Tour Operator',
            'municipality' => 'Mati City',
            'owner_name' => 'Anna Cruz',
            'owner_phone' => '+63 921 678 9012',
            'rating' => 4.9,
            'status' => 'ACTIVE',
            'description' => 'Accredited dive center offering guided dives and scuba certifications in Pujada Bay.',
            'location' => 'Mati City',
            'lat' => 6.9450,
            'lng' => 126.2300,
        ]);

        \App\Models\Establishment::create([
            'name' => 'Cateel Heritage Café',
            'category' => 'Restaurant',
            'municipality' => 'Cateel',
            'owner_name' => 'Jose Cabrera',
            'owner_phone' => '+63 922 789 0123',
            'rating' => 4.4,
            'status' => 'ACTIVE',
            'description' => 'Charming local cafe serving authentic local dishes and heirloom coffees.',
            'location' => 'Cateel town center',
            'lat' => 7.7950,
            'lng' => 126.4560,
        ]);

        \App\Models\Establishment::create([
            'name' => 'Sunrise Surf Hostel',
            'category' => 'Hostel',
            'municipality' => 'Mati City',
            'owner_name' => 'Mike Tan',
            'owner_phone' => '+63 923 890 1234',
            'rating' => 0.0,
            'status' => 'DRAFT',
            'description' => 'Budget surf hostel located steps away from the Dahican surfing shore.',
            'location' => 'Dahican Beach, Mati City',
            'lat' => 6.7301,
            'lng' => 126.2625,
        ]);
    }
}

