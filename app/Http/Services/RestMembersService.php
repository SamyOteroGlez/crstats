<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class RestMembersService
{
    /**
     * Guzzle client.
     *
     * @var GuzzleHttp\Client
     */
    protected $http;

    /**
     * Class constructor.
     *
     * @param \GuzzleHttp\Client $client
     */
    public function __construct(Client $client)
    {
        $this->http = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . env('CR_API_TOKEN')
            ]
        ]);
    }

    /**
     * Get all the members.
     *
     * @return array
     */
    public function all()
    {
        $response = $this->http->get(env('CR_API_MEMBERS'));

        return json_decode($response->getBody(), true);
    }

    /**
     * Get a member data.
     *
     * @param string $tag
     *
     * @return array
     */
    public function player(string $tag)
    {
        $tag = playerTagParser($tag);
        $response = $this->http->get(env('CR_API_PLAYERS') . '/' . $tag);
        $player = json_decode($response->getBody(), false);

        return $this->preparePlayer($player);
    }

    /**
     * Prepare player data.
     *
     * @param obj $player
     *
     * @return obj
     */
    protected function preparePlayer($player)
    {
        $meta = $this->arena($player->arena->name);
        $player->arena->img = $meta->img;
        $player->arena->label = $meta->label;
        $player->arena->league = $meta->league;
        $player->arena->tag = $meta->tag;

        return $player;
    }

    /**
     * Set the arena and league name and image.
     *
     * @param obj $arena
     *
     * @return obj
     */
    protected function arena($arena)
    {
        $obj = new \stdClass;

        switch ($arena) {
            case 'Training Camp':
                $obj->img = '/arenas/training-camp';
                $obj->label = 'Training Camp';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 1':
                $obj->img = '/arenas/goblin-stadium';
                $obj->label = 'Goblin Stadium';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 2':
                $obj->img = '/arenas/bone-pit';
                $obj->label = 'Bone Pit';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 3':
                $obj->img = '/arenas/barbarian-bowl';
                $obj->label = 'Barbarian Bowl';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 4':
                $obj->img = '/arenas/pekkas-playhouse';
                $obj->label = 'P.E.K.K.A\'s Playhouse';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 5':
                $obj->img = '/arenas/spell-valley';
                $obj->label = 'Spell Valley';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 6':
                $obj->img = '/arenas/builders-workshop';
                $obj->label = 'Builder\'s Workshop';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 7':
                $obj->img = '/arenas/royal-arena';
                $obj->label = 'Royal Arena';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 8':
                $obj->img = '/arenas/frozen-peak';
                $obj->label = 'Frozen Peak';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 9':
                $obj->img = '/arenas/jungle-arena';
                $obj->label = 'Jungle Arena';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 10':
                $obj->img = '/arenas/hog-mountain';
                $obj->label = 'Hog Mountain';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 11':
                $obj->img = '/arenas/electro-valley';
                $obj->label = 'Electro Valley';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 12':
                $obj->img = '/arenas/spooky-town';
                $obj->label = 'Spooky Town';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Arena 13':
                $obj->img = '/arenas/legendary-arena';
                $obj->label = 'Legendary Arena';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
                break;

            case 'Challenger I':
                $obj->img = '/arenas/legendary-arena';
                $obj->label = 'Legendary Arena';
                $obj->league = '/leagues/challenger-i';
                $obj->tag = 'Challenger I (League 1)';
                break;

            case 'Challenger II':
                $obj->img = '/arenas/legendary-arena';
                $obj->label = 'Legendary Arena';
                $obj->league = '/leagues/challenger-ii';
                $obj->tag = 'Challenger II (League 2)';
                break;

            case 'Challenger III':
                $obj->img = '/arenas/legendary-arena';
                $obj->label = 'Legendary Arena';
                $obj->league = '/leagues/challenger-iii';
                $obj->tag = 'Challenger III (League 3)';
                break;

            case 'Master I':
                $obj->img = '/arenas/legendary-arena';
                $obj->label = 'Legendary Arena';
                $obj->league = '/leagues/master-i';
                $obj->tag = 'Master I (League 4)';
                break;

            case 'Master II':
                $obj->img = '/arenas/legendary-arena';
                $obj->label = 'Legendary Arena';
                $obj->league = '/leagues/master-ii';
                $obj->tag = 'Master II (League 5)';
                break;

            case 'Master III':
                $obj->img = '/arenas/legendary-arena';
                $obj->label = 'Legendary Arena';
                $obj->league = '/leagues/master-iii';
                $obj->tag = 'Master III (League 6)';
                break;

            case 'Champion':
                $obj->img = '/arenas/legendary-arena';
                $obj->label = 'Legendary Arena';
                $obj->league = '/leagues/champion';
                $obj->tag = 'Champion (League 7)';
                break;

            case 'Grand Champion':
                $obj->img = '/arenas/legendary-arena';
                $obj->label = 'Legendary Arena';
                $obj->league = '/leagues/grand-champion';
                $obj->tag = 'Grand Champion (League 8)';
                break;

            case 'Royal Champion':
                $obj->img = '/arenas/legendary-arena';
                $obj->label = 'Legendary Arena';
                $obj->league = '/leagues/royal-champion';
                $obj->tag = 'Royal Champion (League 9)';
                break;

            case 'Ultimate Champion':
                $obj->img = '/arenas/legendary-arena';
                $obj->label = 'Legendary Arena';
                $obj->league = '/leagues/ultimate-champion';
                $obj->tag = 'Ultimate Champion';
                break;

            default:
                $obj->img = '/leagues/blank';
                $obj->label = 'None';
                $obj->league = '/leagues/blank';
                $obj->tag = 'None';
        }

        $obj->img = $obj->img . '.png';
        $obj->league = $obj->league . '.png';

        return $obj;
    }

    /**
     * Get a member chests succession.
     *
     * @param string $tag
     *
     * @return array
     */
    public function chests(string $tag)
    {
        $tag = playerTagParser($tag);
        $response = $this->http->get(env('CR_API_PLAYERS') . '/' . $tag . '/upcomingchests');
        $chests = json_decode($response->getBody(), false);

        return $this->prepareChests($chests);
    }

    /**
     * Add the chest image url.
     *
     * @param obj $chests
     *
     * @return array
     */
    protected function prepareChests($chests)
    {
        foreach ($chests->items as $key => $chest) {
            $chests->items[$key]->src = $this->chestImg($chest);
        }

        return $chests;
    }

    /**
     * Get the chest image based on teh chest type.
     *
     * @param obj $chest
     *
     * @return void
     */
    protected function chestImg($chest)
    {
        $src = '#';

        switch ($chest->name) {
            case 'Silver Chest':
                $src = 'https://i0.wp.com/decks-clash-royale.com/wp-content/uploads/2019/11/coffre-argent.png?w=1200&ssl=1';
                break;

            case 'Golden Chest':
                $src = 'https://i2.wp.com/decks-clash-royale.com/wp-content/uploads/2019/11/coffre-or.png?w=1200&ssl=1';
                break;

            case 'Giant Chest':
                $src = 'https://i1.wp.com/decks-clash-royale.com/wp-content/uploads/2019/11/coffre-geant.png?w=1200&ssl=1';
                break;

            case 'Magical Chest':
                $src = 'https://i1.wp.com/decks-clash-royale.com/wp-content/uploads/2019/11/coffre-magique.png?w=1200&ssl=1';
                break;

            case 'Epic Chest':
                $src = 'https://i0.wp.com/decks-clash-royale.com/wp-content/uploads/2019/11/coffre-epique.png?w=1200&ssl=1';
                break;

            case 'Legendary Chest':
                $src = 'https://i2.wp.com/decks-clash-royale.com/wp-content/uploads/2019/11/coffre-legendaire.png?w=1200&ssl=1';
                break;

            case 'Mega Lightning Chest':
                $src = 'https://i0.wp.com/decks-clash-royale.com/wp-content/uploads/2019/11/mega-coffre-foudre.png?w=1200&ssl=1';
                break;

            default:
                $src = 'https://i0.wp.com/decks-clash-royale.com/wp-content/uploads/2019/11/coffre-gratuit.png?w=1200&ssl=1';
        }

        return $src;
    }
}
