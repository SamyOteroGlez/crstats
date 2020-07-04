<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitLog extends Model
{
    protected $table = 'visits_log';

    protected $fillable = [
        'data',
    ];

    public function getDataAttribute()
    {
        return json_decode($this->attributes['data'], true);
    }

    public function setDataAttribute($value)
    {
        // Remove http cookies
        if (is_array($value['server']) && array_key_exists('HTTP_COOKIE', $value['server'])) {
            unset($value['server']['HTTP_COOKIE']);
        }

        // Remove cookies
        if (is_array($value['headers']) && array_key_exists('cookie', $value['headers'])) {
            unset($value['headers']['cookie']);
        }

        $this->attributes['data'] = json_encode($value);
    }
}
