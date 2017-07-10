<?php

namespace App\Listeners\Icecast;

use App\Events\Icecast\MountRemove;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MountRemove
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MountRemove  $event
     * @return void
     */
    public function handle(MountRemove $event)
    {
        //
    }
}
