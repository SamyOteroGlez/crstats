<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Services\CrSessionsService;
use Illuminate\Support\Facades\Validator;

class PlayerTagMiddleware
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
        $validator = Validator::make($request->all(), [
            'player_tag' => 'required',
        ]);

        if ($validator->fails()) {
             return redirect()->route('landing')->withInput();
        }

        if ($request->has('player_tag')) {
            $session = CrSessionsService::newInstance()->playerApi($request->get('player_tag'));
            $request->session()->put('CR', $session);
        }

        return $next($request);
    }
}
