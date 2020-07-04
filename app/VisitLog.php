<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitLog extends Model
{
    /**
     * Database table.
     *
     * @var string
     */
    protected $table = 'visits_log';

    /**
     * Mass assign attributes.
     *
     * @var array
     */
    protected $fillable = [
        'data',
    ];

    /**
     * Mutate the data when get. Transform from json to array.
     *
     * @return array
     */
    public function getDataAttribute()
    {
        return json_decode($this->attributes['data'], true);
    }

    /**
     * Mutate the data when set. Transform from array to json and remove some attributes.
     *
     * @param [type] $value
     *
     * @return void
     */
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
