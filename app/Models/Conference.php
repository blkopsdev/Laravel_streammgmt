<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

/**
 * Class Conference
 */
class Conference extends Model
{
    use CrudTrait;

    protected $table = 'conference';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'location',
        'conference_id',
        'host_pin',
        'salesperson',
        'stream',
        'stream_listeners',
        'billing',
        'notes',
        'current_status',
        'peak_participants',
        'current_participants',
        'conference_authorization_level_id'
    ];

    protected $guarded = [];

    public function mount()
    {
      return $this->hasMany('App\Models\Mount');
    }

    public function did()
    {
      return $this->hasMany('App\Models\Did');
    }

    public function conferenceAuthorizationLevel()
    {
        return $this->belongsTo('App\Models\ConferenceAuthorizationLevel');
    }

    public function groups()
    {
      return $this->belongsToMany('App\ModelsUserGroup', 'conference_to_group');
    }

    public function users()
    {
      return $this->belongsToMany('App\User', 'conference_to_user');
    }

    public function salesperson()
    {
        return $this->belongsTo('App\Models\Salesperson','salesperson','id');
    }

}
