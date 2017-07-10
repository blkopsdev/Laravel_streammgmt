<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionUser
 */
class PermissionUser extends Model
{
    protected $table = 'permission_users';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'permission_id'
    ];

    protected $guarded = [];

        
}