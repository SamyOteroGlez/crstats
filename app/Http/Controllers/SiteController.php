<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\RestClanService;
use App\Http\Services\RestMembersService;

class SiteController extends Controller
{
    /**
     * Home page.
     *
     * @return view
     */
    public function home(RestClanService $service)
    {
        //dump($service->clan());
        //dump($service->currentWar());
        //dump($service->warLog());
        return view('home', [
            'clan' => $service->clan(),
            'war' => $service->currentWar(),
            //'warLog' => $service->warLog(),
        ]);
    }

    /**
     * Get the members ranking.
     *
     * @param \App\Http\Services\RestMembersService $service
     *
     * @return view
     */
    public function ranking(RestMembersService $service)
    {
        return view('ranking', [
            'players' => $service->members()['items']
        ]);
    }

    /**
     * Get a member data.
     *
     * @param \App\Http\Services\RestMembersService $service
     * @param string $tag
     *
     * @return view
     */
    public function players(RestMembersService $service, string $tag)
    {
        return view('players', [
            'player' => $service->players($tag),
            'chests' => $service->chests($tag),
        ]);
    }
}
