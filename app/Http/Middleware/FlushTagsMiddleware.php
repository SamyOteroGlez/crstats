<?php

namespace App\Http\Middleware;

use Closure;

class FlushTagsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->session()->forget(['CR']);

        return $next($request);
    }
}
