<?php

namespace App\Http\Middleware;

use Closure;

class CacheHeader
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
        $response = $next($request);

        if (env('APP_ENV') !== 'local') {
            $response->header('Cache-Control', 'max-age=31536000, public');
        }

        return $response;
    }
}
