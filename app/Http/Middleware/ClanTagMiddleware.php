<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Http\Services\CrSessionsService;
use Illuminate\Support\Facades\Validator;

class ClanTagMiddleware
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
            'clan_tag' => 'required',
        ]);

        if ($validator->fails()) {
             return redirect()->route('landing')->withErrors($validator)->withInput();
        }

        if ($request->has('clan_tag')) {
            $session = CrSessionsService::newInstance()->clanApi($request->get('clan_tag'));

            if (!$session) {
                Session::flash('no_clan', trans('html.landing.clan_not_found'));

                return redirect()->route('landing');
            }
            $request->session()->put('CR', $session);
        }

        return $next($request);
    }
}
