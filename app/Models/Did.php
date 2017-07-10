<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

/**
 * Class Did
 */
class Did extends Model
{
    use CrudTrait;

    protected $table = 'dids';

    public $timestamps = false;

    protected $fillable = [
        'did',
        'geo_location',
        'vendor',
        'billing',
        'conference_id',
        'type',
        'uri',
        'notes',
        'advertise',
        'bypass_media',
        'audio_level_read',
        'audio_level_write',
    ];

    protected $guarded = [];


    function conference()
    {
        return $this->belongsTo('App\Models\Conference');
    }


}
