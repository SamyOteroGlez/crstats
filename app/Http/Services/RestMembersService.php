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
    public function members()
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
    public function players(string $tag)
    {
        $tag = playerTagParser($tag);
        $response = $this->http->get(env('CR_API_PLAYERS') . '/' . $tag);

        return json_decode($response->getBody(), false);
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
     * @param array $chests
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
