<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 */
class Notification extends Model
{
    protected $table = 'notifications';

    public $timestamps = true;

    protected $fillable = [
        'type',
        'notifiable_id',
        'notifiable_type',
        'data',
        'read_at'
    ];

    protected $guarded = [];

        
}