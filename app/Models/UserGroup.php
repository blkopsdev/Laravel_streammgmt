<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

/**
 * Class UserGroup
 */
class UserGroup extends Model
{
    use CrudTrait;
    
    protected $table = 'user_group';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

        
}