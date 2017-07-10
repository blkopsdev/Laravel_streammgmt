<?php

namespace App\Listeners\Icecast;

use App\Events\Icecast\ListenerAdd;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListenerAdd
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
     * @param  ListenerAdd  $event
     * @return void
     */
    public function handle(ListenerAdd $event)
    {
        //
    }
}
