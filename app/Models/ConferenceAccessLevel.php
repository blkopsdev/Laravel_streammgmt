<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConferenceAccessLevel
 */
class ConferenceAccessLevel extends Model
{
    protected $table = 'conference_access_level';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

        
}