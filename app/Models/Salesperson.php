<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

/**
 * Class Salesperson
 */
class Salesperson extends Model
{
    use CrudTrait;
    
    protected $table = 'salesperson';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email'
    ];

    protected $guarded = [];

        
}