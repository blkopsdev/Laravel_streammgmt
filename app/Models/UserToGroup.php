<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserToGroup
 */
class UserToGroup extends Model
{
    protected $table = 'user_to_group';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'user_group_id'
    ];

    protected $guarded = [];

        
}