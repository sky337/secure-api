<?php

namespace Sky337\SecureAPI\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Sky337\SecureAPI\Traits\ApiResponseTrait;

class RoleMiddleware
{
    use ApiResponseTrait;

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        if (!$user) {
            return $this->errorResponse('Unauthenticated', 401);
        }

        // The middleware parameter syntax 'role:admin,manager' passes them as an array
        if (!$user->hasAnyRole($roles)) {
            return $this->errorResponse('Unauthorized. Missing required role: ' . implode(', ', $roles), 403);
        }

        return $next($request);
    }
}
