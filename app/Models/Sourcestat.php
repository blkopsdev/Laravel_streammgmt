<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sourcestat
 */
class Sourcestat extends Model
{
    protected $table = 'sourcestats';

    public $timestamps = false;

    protected $fillable = [
        'mount',
        'audio_info',
        'genre',
        'listener_peak',
        'listeners',
        'listenurl',
        'max_listeners',
        'public',
        'server_description',
        'server_name',
        'server_type',
        'server_url',
        'slow_listeners',
        'source_ip',
        'stream_start',
        'total_bytes_read',
        'total_bytes_sent',
        'user_agent',
        'bitrate'
    ];

    protected $guarded = [];

        
}