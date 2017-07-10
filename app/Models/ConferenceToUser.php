<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConferenceToUser
 */
class ConferenceToUser extends Model
{
    protected $table = 'conference_to_user';

    public $timestamps = false;

    protected $fillable = [
        'conference_id',
        'user_id',
        'conference_access_level_id'
    ];

    protected $guarded = [];

        
}