<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Services\VisitsLogService;

class VisitsLogMiddleware
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
        VisitsLogService::newInstance()->save([
            'server' => $request->server(),
            'headers' => $request->header(),
        ]);

        return $next($request);
    }
}
