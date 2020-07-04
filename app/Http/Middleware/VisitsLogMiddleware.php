<?php

namespace App\Http\Middleware;

use Str;
use Closure;
use App\Http\Services\VisitsLogService;

class VisitsLogMiddleware
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
        $server = $request->server();
        $header = $request->header();

        // if is not a curl agent and if is not from the inside request then log the visit
        if (!Str::contains($server['HTTP_USER_AGENT'], 'curl') && '127.0.0.1' !== $server['REMOTE_ADDR']) {
            VisitsLogService::newInstance()->save([
                'server' => $server,
                'headers' => $header,
            ]);
        }

        return $next($request);
    }
}
