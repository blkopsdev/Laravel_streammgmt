<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recording
 */
class Recording extends Model
{
    protected $table = 'recordings';

    protected $primaryKey = 'recording_id';

	public $timestamps = false;

    protected $fillable = [
        'recording_pin',
        'recording_expiration',
        'recording_listens',
        'recording_listens_used',
        'recording_conference_id',
        'recording_url'
    ];

    protected $guarded = [];

        
}