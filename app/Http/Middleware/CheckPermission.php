<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        if ($request->user()->isSuperAdmin()) {
            return $next($request); // Super admins have all permissions
        }

        if (!$request->user()->permissions->contains('name', $permission)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}