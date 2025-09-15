<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (!$user) {
            abort(403);
        }
        // Prefer checking the role name to avoid relying on a specific role_id value
        $roleName = method_exists($user, 'role') && $user->role ? $user->role->name : null;
        if ($roleName !== 'admin') {
            abort(403);
        }
        return $next($request);
    }
}
