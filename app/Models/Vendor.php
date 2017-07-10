<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

/**
 * Class Vendor
 */
class Vendor extends Model
{
    use CrudTrait;
    
    protected $table = 'vendor';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'currency'
    ];

    protected $guarded = [];

        
}