<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tick extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at'
    ];

    /**
     * Set the payload.
     *
     * @param  string  $value
     * @return void
     */
    public function setPayloadAttribute($value)
    {
        $this->attributes['payload'] = json_encode($value);
    }

    /**
     * Get the payload.
     *
     * @param  string  $value
     * @return string
     */
    public function getPayloadAttribute($value)
    {
        return json_decode($value);
    }
}
