<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Establishment;

class PTOAdminController extends Controller
{
    public function dashboard()
    {
        return view('PTOAdmin.dashboard');
    }

    public function touristMonitoring()
    {
        return view('PTOAdmin.tourist-monitoring');
    }

    public function experienceAnalytics()
    {
        return view('PTOAdmin.experience-analytics');
    }

    public function establishments()
    {
        $establishments = Establishment::orderBy('id', 'desc')->get();
        return view('PTOAdmin.establishments', compact('establishments'));
    }

    public function storeEstablishment(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'owner_name' => 'nullable|string|max:255',
            'owner_phone' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
        ]);

        $establishment = Establishment::create($validated);

        return redirect()->route('admin.establishments')->with('success', 'Establishment ' . $establishment->name . ' registered successfully!');
    }

    public function qrGeneration()
    {
        return view('PTOAdmin.qr-generation');
    }

    public function destinations()
    {
        return view('PTOAdmin.destinations');
    }

    public function reports()
    {
        return view('PTOAdmin.reports');
    }

    public function userManagement()
    {
        return view('PTOAdmin.user-management');
    }

    public function auditLogs()
    {
        return view('PTOAdmin.audit-logs');
    }

    public function systemSettings()
    {
        return view('PTOAdmin.system-settings');
    }
}
