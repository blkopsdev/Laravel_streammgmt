<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConferenceAuthorizationLevel
 */
class ConferenceAuthorizationLevel extends Model
{
    protected $table = 'conference_authorization_level';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

        
}