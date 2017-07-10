<?php

namespace App\Listeners\Icecast;

use App\Events\Icecast\MountAdd;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MountAdd
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
     * @param  MountAdd  $event
     * @return void
     */
    public function handle(MountAdd $event)
    {
        //
    }
}
