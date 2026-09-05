<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // Check if user has the required roles
        if (!$request->user()->hasRole(['Super Admin', 'Admin User'])) {
            return redirect()->back()->with('error', 'You Don`t Have Permissions');
        }

        return $next($request);
    }
}