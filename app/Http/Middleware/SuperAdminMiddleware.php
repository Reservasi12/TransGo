<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     * Only allow users with 'admin' role (not staff)
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Only pure admin role allowed (not staff)
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized access. Super admin access required.');
        }

        return $next($request);
    }
}
