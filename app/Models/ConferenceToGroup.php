<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConferenceToGroup
 */
class ConferenceToGroup extends Model
{
    protected $table = 'conference_to_group';

    public $timestamps = false;

    protected $fillable = [
        'conference_id',
        'user_group_id',
        'conference_access_level_id'
    ];

    protected $guarded = [];

        
}