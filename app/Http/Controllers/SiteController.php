<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\RestClanService;
use App\Http\Services\RestCardsService;
use App\Http\Services\RestMembersService;
use App\Http\Services\RestLocationsService;

class SiteController extends Controller
{
    /**
     * Home page.
     *
     * @return view
     */
    public function home(RestClanService $clan, RestLocationsService $rankings)
    {
        return view('home', [
            'clan' => $clan->data(),
            'current_war' =>$clan->currentWar()->clans,
            'clan_international' => $rankings->clansInternational(),
            'clan_local' => $rankings->clansLocation(),
        ]);
    }

    /**
     * Get the members ranking.
     *
     * @param \App\Http\Services\RestMembersService $service
     *
     * @return view
     */
    public function ranking(RestMembersService $members)
    {
        return view('ranking', [
            'players' => $members->all()['items']
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
    public function players(RestMembersService $members, RestCardsService $cards, string $tag)
    {
        return view('players', [
            'player' => $members->player($tag),
            'chests' => $members->chests($tag),
            'totalCards' => $cards->count(),
        ]);
    }

    public function clanWar(RestClanService $clan)
    {
        //dump($clan->warLog());
        return view('clan-war', [
            'war' => $clan->currentWar(),
            //'warLog' => $service->warLog(),
        ]);
    }
}
