<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Services\CrSessionsService;

class DefaultClanMiddleware
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
        $session = CrSessionsService::newInstance()->clanApi(env('CR_CLAN_TAG'));
        $request->session()->put('CR', $session);

        return $next($request);
    }
}
