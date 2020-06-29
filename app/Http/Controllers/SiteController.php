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
    public function home(RestClanService $clan, RestMembersService $members)
    {
        return view('home', [
            'current_war' =>$clan->currentWar()->clans,
            'players' => $members->all(),
            'clan' => $clan->data(),
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

    /**
     * Get the clan war data.
     *
     * @param \App\Http\Services\RestClanService $clan
     *
     * @return view
     */
    public function clanWar(RestClanService $clan)
    {
        return view('clan-war', [
            'war' => $clan->currentWar(),
            //'warLog' => $service->warLog(),
        ]);
    }

    /**
     * Get other relevant data.
     *
     * @param \App\Http\Services\RestLocationsService $rankings
     *
     * @return view
     */
    public function other(RestLocationsService $rankings)
    {
        return view('other', [
            'clan_international' => $rankings->clansInternational(),
            'clan_local' => $rankings->clansLocation(),
        ]);
    }

    /**
     * Get clan players stats.
     *
     * @param \App\Http\Services\RestMembersService $members
     *
     * @return view
     */
    public function stats(RestMembersService $members)
    {
        return view('stats', [
            'players' => $members->stats()
        ]);
    }
}
