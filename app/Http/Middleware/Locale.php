<?php

namespace App\Http\Middleware;

use Closure;

class Locale
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
        if ($request->has('locale')) {
            $request->session()->put('locale', $request->get('locale'));
        }

        if (!$request->session()->has('locale')) {
            $request->session()->put('locale', 'en');
        }

        app()->setLocale(session('locale'));

        return $next($request);
    }
}
