<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Icestat
 */
class Icestat extends Model
{
    protected $table = 'icestats';

    public $timestamps = false;

    protected $fillable = [
        'timestamp',
        'admin',
        'client_connections',
        'clients',
        'connections',
        'host',
        'listener_connections',
        'listeners',
        'location',
        'server_id',
        'server_start',
        'source_client_connections',
        'source_relay_connections',
        'source_total_connections',
        'sources',
        'stats',
        'stats_connections',
        'file_connections'
    ];

    protected $guarded = [];

        
}