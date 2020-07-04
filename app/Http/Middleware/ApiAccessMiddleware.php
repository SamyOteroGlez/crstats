<?php

namespace App\Http\Middleware;

use Closure;

class ApiAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->canAccess($request->secret)) {
            return response()->json([
                'status' => 401,
                'message' => 'Access denied.'
            ], 401);
        }

        return $next($request);
    }

    /**
     * Validate if can access the api.
     *
     * @param string $secret
     *
     * @return bool
     */
    protected function canAccess(string $secret)
    {
        return (env('API_SECRET') === $secret);
    }
}
