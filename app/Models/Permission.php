<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 */
class Permission extends Model
{
    protected $table = 'permissions';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

        
}