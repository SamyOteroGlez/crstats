<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\RestMembersService;

class RestController extends Controller
{
    /**
     * Get all players in the clan.
     *
     * @param \App\Http\Services\RestMembersService $members
     *
     * @return json
     */
    public function allPlayers(RestMembersService $members)
    {
        return response()->json($members->all());
    }

    /**
     * Get a player based on the tag.
     *
     * @param \App\Http\Services\RestMembersService $members
     * @param string $name
     *
     * @return json
     */
    public function player(RestMembersService $members, string $player_name = null)
    {
        $result = null;

        if ($player_name) {
            $players = collect($members->all()['items']);
            $player = $players->firstWhere('name', $player_name);

            if ($player) {
                $player['tag'] = playerTagParser($player['tag']);
                $result = $player;
            }
        }

        return response()->json([
            'player' => $result
        ]);
    }
}
