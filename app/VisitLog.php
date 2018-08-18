<?php

namespace Sarfraznawaz2005\VisitLog\Models;

use Illuminate\Database\Eloquent\Model;

class VisitLog extends Model
{
    protected $table = 'visitlogs';

    protected $fillable = [
        'ip',
        'browser',
        'os',
        'user_id',
        'user_name',
        'country_code',
        'country_name',
        'region_name',
        'city',
        'zip_code',
        'time_zone',
        'latitude',
        'longitude',
    ];

    /**
     * Mutator that appends in query resultsets as though it is part of db table
     *
     * @var array
     */
    protected $appends = ['last_visit'];

    /**
     * Last Visit Accessor.
     *
     * @return string
     */

    public static function boot() {
        // When a new instance of this model is created...
        static::creating(function ($tracker) {
            $tracker->hits = 0;
        } );

        // Any time the instance is saved (create OR update)
        static::saving(function ($tracker) {           
            $tracker->hits++;
        } );
    }

    function getLastVisitAttribute()
    {
        return $this->updated_at->diffForHumans();
    }

    # global scope that will be applied to all queries
    public function newQuery()
    {
        return parent::newQuery()->orderBy('updated_at', 'DESC');
    }
}