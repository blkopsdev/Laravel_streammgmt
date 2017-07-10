<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

/**
 * Class Mount
 */
class Mount extends Model
{
    use CrudTrait;

    protected $table = 'mounts';

    protected $primaryKey = 'mount';

	  public $timestamps = false;

    protected $fillable = [
        'description',
        'pin',
        'conference_id',
        'uuid',
        'destination_number',
        'codec',
        'fs_connect_type',
        'mount_password',
        'mount_username',
        'max_listeners',
        'alias',
        'alias2',
        'bitrate',
        'audio_read',
        'audio_write',
        'streamer_ip',
        'streamer_type',
        'mount_authorization_level_id'
    ];

    protected $guarded = [];

    public function conference()
    {
      return $this->belongsTo('App\Models\Conference');
    }

    public function mountAuthorizationLevel()
    {
      return $this->belongsTo('App\Models\MountAuthorizationLevel');
    }

    public function scopeOfAlias($query, $alias)
    {
      return $query->where('alias', $alias)->orWhere('alias2',$alias);
    }

}
