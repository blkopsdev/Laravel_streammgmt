<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LoginAttempt
 */
class LoginAttempt extends Model
{
    protected $table = 'login_attempts';

    public $timestamps = false;

    protected $fillable = [
        'ip_address',
        'login',
        'time'
    ];

    protected $guarded = [];

        
}