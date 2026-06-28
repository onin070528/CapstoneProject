<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        // If already logged in, redirect to their dashboard
        if (Auth::check()) {
            return redirect(Auth::user()->dashboardRoute());
        }

        return view('auth.login'); // maps to resources/views/auth/login.blade.php
    }

    /**
     * Handle login form submission.
     * Validates credentials, logs in the user, and redirects by role.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Regenerate session to prevent fixation attacks
            $request->session()->regenerate();

            $user = Auth::user();

            // Role-based redirect
            return redirect($user->dashboardRoute())
                ->with('success', 'Welcome back, ' . $user->name . '!');
        }

        // Authentication failed
        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
    }

    /**
     * Show the registration form.
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect(Auth::user()->dashboardRoute());
        }

        return view('auth.register');
    }

    /**
     * Log the user out and destroy the session.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'You have been logged out successfully.');
    }
}
