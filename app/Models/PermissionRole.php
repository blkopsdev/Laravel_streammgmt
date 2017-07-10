<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionRole
 */
class PermissionRole extends Model
{
    protected $table = 'permission_roles';

    public $timestamps = false;

    protected $fillable = [
        'permission_id',
        'role_id'
    ];

    protected $guarded = [];

        
}