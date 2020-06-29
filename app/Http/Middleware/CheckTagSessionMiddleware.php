<?php

namespace App\Http\Middleware;

use Closure;

class CheckTagSessionMiddleware
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
        if ($request->session()->exists('CR') && $request->session()->has('CR')) {
            return $next($request);
        }

        return redirect()->route('landing');
    }
}
