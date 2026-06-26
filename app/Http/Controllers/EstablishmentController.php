<?php

namespace App\Http\Controllers;

class EstablishmentController extends Controller
{
    public function dashboard()
    {
        return view('EstablishmentsUsers.dashboard');
    }

    public function profile()
    {
        return view('EstablishmentsUsers.profile');
    }

    public function qrCode()
    {
        return view('EstablishmentsUsers.qr-code');
    }

    public function registrations()
    {
        return view('EstablishmentsUsers.registrations');
    }

    public function manualEncoding()
    {
        return view('EstablishmentsUsers.manual-encoding');
    }

    public function feedback()
    {
        return view('EstablishmentsUsers.feedback');
    }

    public function reports()
    {
        return view('EstablishmentsUsers.reports');
    }

    public function notifications()
    {
        return view('EstablishmentsUsers.notifications');
    }
}
