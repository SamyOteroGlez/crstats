<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\VisitsLogService;

class RestController extends Controller
{
    /**
     * Get the amount of visit logs.
     *
     * @param \App\Http\Services\VisitsLogService $service
     *
     * @return json
     */
    public function visitsLog(VisitsLogService $service)
    {
        return response()->json([
            'magic_number' => $service->count(),
            'landing' => $service->countLanding(),
            'clan_tag' => $service->countClanTag(),
            'player_tag' => $service->countPlayerTag(),
        ]);
    }

    /**
     * Get the visits logs.
     *
     * @param \App\Http\Services\VisitsLogService $service
     *
     * @return json
     */
    public function visits(VisitsLogService $service)
    {
        return response()->json($service->get());
    }
}
