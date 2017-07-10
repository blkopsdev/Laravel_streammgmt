<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cdr
 */
class Cdr extends Model
{
    protected $table = 'cdr';

    public $timestamps = false;

    protected $fillable = [
        'caller_id_name',
        'caller_id_number',
        'destination_number',
        'context',
        'start_stamp',
        'answer_stamp',
        'end_stamp',
        'duration',
        'billsec',
        'hangup_cause',
        'uuid',
        'bleg_uuid',
        'accountcode',
        'domain_name'
    ];

    protected $guarded = [];

        
}