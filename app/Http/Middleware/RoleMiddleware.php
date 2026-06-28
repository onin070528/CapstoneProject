<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Usage in routes:  ->middleware('role:pto_admin')
     *                   ->middleware('role:establishment_owner')
     *                   ->middleware('role:public_tourist')
     *
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Must be authenticated first
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please sign in to continue.');
        }

        $user = Auth::user();

        // Allow if user's role matches any of the required roles
        if (in_array($user->role, $roles, true)) {
            return $next($request);
        }

        // Authenticated but wrong role — redirect to their own dashboard
        return redirect($user->dashboardRoute())
            ->with('error', 'You do not have permission to access that area.');
    }
}
