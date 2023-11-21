<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (backpack_auth()->check()) {
            $user = backpack_auth()->user();
            if (in_array($user->role, $roles)) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized action.');
    }
}
