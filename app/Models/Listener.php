<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Listener
 */
class Listener extends Model
{
    protected $table = 'listeners';

    public $timestamps = false;

    protected $fillable = [
        'mount',
        'status',
        'connected',
        'ip',
        'useragent'
    ];

    protected $guarded = [];

        
}