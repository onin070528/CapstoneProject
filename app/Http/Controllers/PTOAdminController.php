<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('PTOAdmin.establishments');
    }

    public function qrGeneration()
    {
        return view('PTOAdmin.qr-generation');
    }

    public function destinations()
    {
        return view('PTOAdmin.destinations');
    }

    public function approvals()
    {
        return view('PTOAdmin.approvals');
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
