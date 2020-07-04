<?php

namespace App\Http\Services;

use App\VisitLog;

class VisitsLogService
{
    /**
     * Get a new VisitsLogService instance.
     *
     * @return App\Http\Services\VisitsLogService
     */
    public static function newInstance($attributes = [], $exists = false)
    {
        return new VisitsLogService;
    }

    /**
     * Save a visit log.
     *
     * @param array $data
     *
     * @return void
     */
    public function save(array $data)
    {
        $log = new VisitLog();
        $log->fill(['data' => $data])->save();
    }

    /**
     * Count all the logs in the db.
     *
     * @return int
     */
    public function count()
    {
        return VisitLog::count();
    }

    /**
     * Count all the logs for the landing page.
     *
     * @return int
     */
    public function countLanding()
    {
        return VisitLog::where('data', 'like', '%"REQUEST_URI":"\/"%')->count();
    }

    /**
     * Count all the logs for the clan tag page.
     *
     * @return int
     */
    public function countClanTag()
    {
        return VisitLog::where('data', 'like', '%"REQUEST_URI":"\/clan\/tag"%')->count();
    }

    /**
     * Count all the logs for the player tag page.
     *
     * @return int
     */
    public function countPlayerTag()
    {
        return VisitLog::where('data', 'like', '%"REQUEST_URI":"\/player\/tag"%')->count();
    }

    public function get()
    {
        return VisitLog::paginate();
    }
}
