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

    public function save(array $data)
    {
        $log = new VisitLog();
        $log->fill(['data' => $data])->save();
    }
}
