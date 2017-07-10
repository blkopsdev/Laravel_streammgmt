<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleUser
 */
class RoleUser extends Model
{
    protected $table = 'role_users';

    public $timestamps = false;

    protected $fillable = [
        'role_id',
        'user_id'
    ];

    protected $guarded = [];

        
}