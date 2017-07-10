<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MountAuthorizationLevel
 */
class MountAuthorizationLevel extends Model
{
    protected $table = 'mount_authorization_level';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

        
}