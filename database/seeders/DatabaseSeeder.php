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
    }
}
