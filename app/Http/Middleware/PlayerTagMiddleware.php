<?php

namespace App\Http\Middleware;

use Closure;
use Session;
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
             return redirect()->route('landing')->withErrors($validator)->withInput();
        }

        if ($request->has('player_tag')) {
            $session = CrSessionsService::newInstance()->playerApi($request->get('player_tag'));

            if (!$session) {
                Session::flash('no_player', 'The player was not found!');

                return redirect()->route('landing');
            }
            $request->session()->put('CR', $session);
        }

        return $next($request);
    }
}
